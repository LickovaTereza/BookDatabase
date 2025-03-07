<?php

include "map.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $book_name = $_POST["book_name"] ?? "";
  $first_name = $_POST["first_name"] ?? "";
  $second_name = $_POST["second_name"] ?? "";
  $description = $_POST["description"] ?? "";
  $ISBN = $_POST["ISBN"] ?? "";
  $book_picture = $_POST["book_picture"] ?? "";

  $repo = new BookRepository();
  $book = new Book($book_name, $first_name, $second_name, $description, $ISBN, $book_picture); // vkládámne, takže nemusíme dávat ID

  $repo->createBook($book);
  header("Location: bookList.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="add.css">

  <title>Přidat knihu</title>
</head>

<body>
  <!--navbar-->
  <nav class="navbar navbar-expand-lg" data-bs-theme="light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Knižní databáze</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="search.php">Vyhledat knihu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bookList.php">Seznam dostupných knih</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="add.php">Přidat knihu</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!--add form-->
  <div class="container container-form mt-5 mb-5">
    <h1 class="display-6 mb-4">Nová kniha do databáze</h1>
    <form action="add.php" method="post">
      <div class="mb-2">
        <label class="form-label" for="book_name">Název knihy</label>
        <input class="form-control" type="text" name="book_name" id="book_name" value="" required>
      </div>
      <div class="mb-2">
        <label class="form-label" for="first_name">Jméno autora</label>
        <input class="form-control" type="text" name="first_name" id="first_name" value="" required>
      </div>
      <div class="mb-2">
        <label class="form-label" for="second_name">Příjmení autora</label>
        <input class="form-control" type="text" name="second_name" id="second_name" value="" required>
      </div>
      <div class="mb-2">
        <label class="form-label" for="description">Popis knihy</label>
        <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
      </div>
      <div class="mb-2">
        <label class="form-label" for="ISBN">ISBN</label>
        <input class="form-control" type="text" name="ISBN" id="ISBN" value="" required>
      </div>
      <div class="mb-2">
        <label class="form-label" for="book_picture">Přebal knihy</label>
        <input class="form-control" type="text" name="book_picture" id="book_picture" value="" placeholder="přidejte url adresu obrázku přebalu vámi vytvoření knihy" required>
      </div>
      <div class="row mt-4">
        <button type="submit" class="btn">Přidat knihu</button>
      </div>


    </form>
  </div>
  <!--JavaScript Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>