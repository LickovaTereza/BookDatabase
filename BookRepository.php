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

  public function deleteBook($id) {
    $stmt = $this->pdo->prepare("DELETE FROM books WHERE id = ?");
    return $stmt->execute([$id]);
  }

  public function filterBooks($filters) {
    $sql = "SELECT * FROM books WHERE 1=1";
    $params = [];

    if (!empty($filters['book_name'])) {
      $sql .= " AND book_name LIKE :book_name";
      $params['book_name'] = "%" . $filters['book_name'] . "%";
    }
    if (!empty($filters['first_name'])) {
      $sql .= " AND first_name LIKE :first_name";
      $params['first_name'] = "%" . $filters['first_name'] . "%";
    }
    if (!empty($filters['second_name'])) {
      $sql .= " AND second_name LIKE :second_name";
      $params['second_name'] = "%" . $filters['second_name'] . "%";
    }
    if (!empty($filters['isbn'])) {
      $sql .= " AND isbn = :isbn";
      $params['isbn'] = $filters['isbn'];
    }

    $stmt = $this->pdo->prepare($sql);
    foreach ($params as $key => &$value) {
      $stmt->bindParam(":$key", $value);
    }
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
