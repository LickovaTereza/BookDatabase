<?php

class BookRepository {
  private $pdo;

  public function __construct() {
    $this->pdo = Database::getInstance()->getConnection();
  }

  public function getAllBooks() {
    $stmt = $this->pdo->query("SELECT * FROM books");
    $books = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $books[] = new Book($row["book_name"], $row["first_name"], $row["second_name"], $row["description"], $row["ISBN"], $row["book_picture"], $row["id"]);
    }
    return $books;
  }

  public function createBook(Book $book) {
    $stmt = $this->pdo->prepare("INSERT INTO books (book_name, first_name, second_name, description, ISBN, book_picture) VALUES (?,?,?,?,?,?)");
    return $stmt->execute([$book->book_name, $book->first_name, $book->second_name, $book->description, $book->ISBN, $book->book_picture]);
  }

  public function getBookById($id) {
    $stmt = $this->pdo->prepare("SELECT * FROM books WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? new Book($row['book_name'], $row['first_name'], $row['second_name'], $row['description'], $row['ISBN'], $row['book_picture'], $row['id']) : null; // musí tu být i ID
  }
}
