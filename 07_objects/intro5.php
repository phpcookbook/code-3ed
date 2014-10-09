<?php
class guest_book {
  public $last_visitor;

  public function update($comment, $visitor) {
    if (!empty($comment)) {
      array_unshift($this->comments, $comment);
      $this->last_visitor = $visitor;
    }
  }
}
