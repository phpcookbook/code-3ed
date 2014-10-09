<?php
class guest_book {
  public $comments;
  public $last_visitor;

  public function __construct($user) {
    $dbh = mysqli_connect('localhost', 'username', 'password', 'sites');
    $user = mysqli_real_escape_string($dbh, $user);
    $sql = "SELECT comments, last_visitor FROM guest_books WHERE user='$user'";
    $r = mysqli_query($dbh, $sql);
   
    if ($obj = mysqli_fetch_object($dbh, $r)) {
      $this->comments = $obj->comments;
      $this->last_visitor = $obj->last_visitor;
    }
  }
}

$gb = new guest_book('stewart');
