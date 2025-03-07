<?php

class Book {
  public $id;
  public $book_name;
  public $first_name;
  public $second_name;
  public $description;
  public $ISBN;
  public $book_picture;

  public function __construct($book_name, $first_name, $second_name, $description, $ISBN, $book_picture, $id = -1) {
    $this->id = $id;
    $this->book_name = $book_name;
    $this->first_name = $first_name;
    $this->second_name = $second_name;
    $this->description = $description;
    $this->ISBN = $ISBN;
    $this->book_picture = $book_picture;
  }
}
