<?php

$board = new MessageBoard();
$board->go();

class MessageBoard {
    protected $db;
    protected $form_errors = array();
    protected $inTransaction = false;

    public function __construct() {
        set_exception_handler(array($this,'logAndDie'));
        $this->db = new PDO('sqlite:/tmp/message.db');
        $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function go() {
        // The value of $_REQUEST['cmd'] tells us what to do
        $cmd = isset($_REQUEST['cmd']) ? $_REQUEST['cmd'] : 'show';
        switch ($cmd) {
            case 'read':          // read an individual message
              $this->read();
              break;
            case 'post':          // display the form to post a message
              $this->post();
              break;
            case 'save':          // save a posted message
              if ($this->valid()) { // if the message is valid,
                  $this->save();    // then save it
                  $this->show();    // and display the message list
              } else {
                  $this->post();    // otherwise, redisplay the posting form
              }
              break;
            case 'show':          // show a message list by default
            default:
              $this->show();
              break;
        }
    }

    // save() saves the message to the database
    protected function save() {

        $parent_id = isset($_REQUEST['parent_id']) ?
                     intval($_REQUEST['parent_id']) : 0;

        // Make sure message doesn't change while we're working with it.
        $this->db->beginTransaction();
        $this->inTransaction = true;

        // is this message a reply?
        if ($parent_id) {
            // get the thread, level, and thread_pos of the parent message
            $st = $this->db->prepare("SELECT thread_id,level,thread_pos
                                FROM message WHERE id = ?");
            $st->execute(array($parent_id));
            $parent = $st->fetch();

            // a reply's level is one greater than its parent's
            $level = $parent['level'] + 1;

            /* what's the biggest thread_pos in this thread among messages
            with the same parent? */
            $st = $this->db->prepare('SELECT MAX(thread_pos) FROM message
                    WHERE thread_id = ? AND parent_id = ?');
            $st->execute(array($parent['thread_id'], $parent_id));
            $thread_pos = $st->fetchColumn(0);

            // are there existing replies to this parent?
            if ($thread_pos) {
                // this thread_pos goes after the biggest existing one
                $thread_pos++;
            } else {
                // this is the first reply, so put it right after the parent
                $thread_pos = $parent['thread_pos'] + 1;
            }

            /* increment the thread_pos of all messages in the thread that
            come after this one */
            $st = $this->db->prepare('UPDATE message SET thread_pos = thread_pos + 1
                          WHERE thread_id = ? AND thread_pos >= ?');
            $st->execute(array($parent['thread_id'], $thread_pos));

            // the new message should be saved with the parent's thread_id
            $thread_id = $parent['thread_id'];
        } else {
            // the message is not a reply, so it's the start of a new thread
            $thread_id = $this->db->query('SELECT MAX(thread_id) + 1 FROM message')
                           ->fetchColumn(0);
            // If there are no rows yet, make sure we start at 1 for thread_id
            if (! $thread_id) {
                $thread_id = 1;
            }
            $level = 0;
            $thread_pos = 0;
        }

        /* insert the message into the database. Using prepare() and execute()
        makes sure that all fields are properly quoted */
        $st = $this->db->prepare("INSERT INTO message (id,thread_id,parent_id,
                       thread_pos,posted_on,level,author,subject,body)
                       VALUES (?,?,?,?,?,?,?,?,?)");

        $st->execute(array(null,$thread_id,$parent_id,$thread_pos,
                           date('c'),$level,$_REQUEST['author'],
                           $_REQUEST['subject'],$_REQUEST['body']));

        // Commit all the operations
        $this->db->commit();
        $this->inTransaction = false;
    }

    // show() displays a list of all messages
    protected function show() {
        print '<h2>Message List</h2><p>';

        /* order the messages by their thread (thread_id) and their position
        within the thread (thread_pos) */
        $st = $this->db->query("SELECT id,author,subject,LENGTH(body) AS body_length,
                       posted_on,level FROM message
                       ORDER BY thread_id,thread_pos");
        while ($row = $st->fetch()) {
            // indent messages with level > 0
            print str_repeat('&nbsp;',4 * $row['level']);
            // print out information about the message with a link to read it
            $when = date('Y-m-d H:i', strtotime($row['posted_on']));
            print "<a href='" . htmlentities($_SERVER['PHP_SELF']) .
            "?cmd=read&amp;id={$row['id']}'>" .
            htmlentities($row['subject']) . '</a> by ' .
            htmlentities($row['author']) . ' @ ' .
            htmlentities($when) .
            " ({$row['body_length']} bytes) <br/>";
        }

        // provide a way to post a non-reply message
        print "<hr/><a href='" .
              htmlentities($_SERVER['PHP_SELF']) .
              "?cmd=post'>Start a New Thread</a>";
    }

    // read() displays an individual message
    public function read() {

        /* make sure the message id we're passed is an integer and really
        represents a message */
        if (! isset($_REQUEST['id'])) {
            throw new Exception('No message ID supplied');
        }
        $id = intval($_REQUEST['id']);
        $st = $this->db->prepare("SELECT author,subject,body,posted_on
                                 FROM message WHERE id = ?");
        $st->execute(array($id));
        $msg = $st->fetch();
        if (! $msg) {
            throw new Exception('Bad message ID');
        }

        /* don't display user-entered HTML, but display newlines as
        HTML line breaks */
        $body = nl2br(htmlentities($msg['body']));

        // display the message with links to reply and return to the message list
        $self = htmlentities($_SERVER['PHP_SELF']);
        $subject = htmlentities($msg['subject']);
        $author = htmlentities($msg['author']);
        print<<<_HTML_
<h2>$subject</h2>
<h3>by $author</h3>
<p>$body</p>
<hr/>
<a href="$self?cmd=post&parent_id=$id">Reply</a>
<br/>
<a href="$self?cmd=list">List Messages</a>
_HTML_;
    }

    // post() displays the form for posting a message
    public function post() {
        $safe =  array();
        foreach (array('author','subject','body') as $field) {
            // escape characters in default field values
            if (isset($_POST[$field])) {
                $safe[$field] = htmlentities($_POST[$field]);
            } else {
                $safe[$field] = '';
            }
            // make the error messages display in red
            if (isset($this->form_errors[$field])) {
                $this->form_errors[$field] = '<span style="color: red">' .
                   $this->form_errors[$field] . '</span><br/>';
            } else {
                $this->form_errors[$field] = '';
            }
        }

        // is this message a reply
        if (isset($_REQUEST['parent_id']) &&
        $parent_id = intval($_REQUEST['parent_id'])) {

        // send the parent_id along when the form is submitted
        $parent_field =
            sprintf('<input type="hidden" name="parent_id" value="%d" />',
                    $parent_id);

        // if no subject's been passed in, use the subject of the parent
        if (! strlen($safe['subject'])) {
             $st = $this->db->prepare('SELECT subject FROM message WHERE id = ?');
             $st->execute(array($parent_id));
             $parent_subject = $st->fetchColumn(0);

            /* prefix 'Re: ' to the parent subject if it exists and
               doesn't already have a 'Re:' */
            $safe['subject'] = htmlentities($parent_subject);
            if ($parent_subject && (! preg_match('/^re:/i',$parent_subject))) {
                $safe['subject'] = "Re: {$safe['subject']}";
            }
          }
        } else {
            $parent_field = '';
        }


    // display the posting form, with errors and default values
    $self = htmlentities($_SERVER['PHP_SELF']);
    print<<<_HTML_
<form method="post" action="$self">
<table>
<tr>
 <td>Your Name:</td>
 <td>{$this->form_errors['author']}
     <input type="text" name="author" value="{$safe['author']}" />
</td>
<tr>
 <td>Subject:</td>
 <td>{$this->form_errors['subject']}
     <input type="text" name="subject" value="{$safe['subject']}" />
</td>
<tr>
 <td>Message:</td>
 <td>{$this->form_errors['body']}
     <textarea rows="4" cols="30" wrap="physical"
               name="body">{$safe['body']}</textarea>
</td>
<tr><td colspan="2"><input type="submit" value="Post Message" /></td></tr>
</table>
$parent_field
<input type="hidden" name="cmd" value="save" />
</form>
_HTML_;
    }

    // validate() makes sure something is entered in each field
    public function valid() {
        $this->form_errors = array();
        if (! (isset($_POST['author']) && strlen(trim($_POST['author'])))) {
            $this->form_errors['author'] = 'Please enter your name.';
        }
        if (! (isset($_POST['subject']) && strlen(trim($_POST['subject'])))) {
            $this->form_errors['subject'] = 'Please enter a message subject.';
        }
        if (! (isset($_POST['body']) && strlen(trim($_POST['body'])))) {
            $this->form_errors['body'] = 'Please enter a message body.';
        }

        return (count($this->form_errors) == 0);
    }

    public function logAndDie(Exception $e) {
        print 'ERROR: ' . htmlentities($e->getMessage());
        if ($this->db && $this->db->inTransaction()) {
            $this->db->rollback();
        }
        exit();
    }
}