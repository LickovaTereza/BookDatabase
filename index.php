<?php
include "map.php";

$repo = new BookRepository();
$book = null;
$filteredBooks = [];

if ($_SERVER["REQUEST_METHOD"] === "GET" && !empty($_GET)) {
  $filters = [
    'book_name' => $_GET["book_name"] ?? null,
    'first_name' => $_GET["first_name"] ?? null,
    'second_name' => $_GET["second_name"] ?? null,
    'ISBN' => $_GET["ISBN"] ?? null,
  ];

  // Pokud je alespoň jedno pole vyplněné, provede se dotaz
  if (!empty($filters['book_name']) || !empty($filters['first_name']) || !empty($filters['second_name']) || !empty($filters['isbn'])) {
    $filteredBooks = $repo->filterBooks($filters);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="index.css">
  <title>Knižní databáze</title>
</head>

<body>
  <!--navbar-->
  <nav class="navbar navbar-expand-lg " data-bs-theme="light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Knižní databáze</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="search.php">Vyhledat knihu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bookList.php">Seznam dostupných knih</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add.php">Přidat knihu</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!--headlines-->
  <div class="container-fluid container-form pt-5">
    <h1 class="display-2 text-center mt-5 mb-2">Knihy pro všechny</h1>
    <h2 class="display-6 text-center">Vítejte na stránkách největší knižní databáze</h5>
  </div>

  <!--form-->
  <div class="container container-form mt-1 mb-5">
    <h1 class="display-6 mt-4 mb-3">Vyhledat knihu</h1>
    <form action="search.php" method="GET">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
          <label class="form-label lead" for="book_name">Název knihy</label>
          <input class="form-control" type="text" name="book_name" value="<?= htmlspecialchars($_GET['book_name'] ?? '') ?>">
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <label class="form-label lead" for="first_name">Jméno autor</label>
          <input class="form-control" type="text" name="first_name" value="<?= htmlspecialchars($_GET['first_name'] ?? '') ?>">
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <label class="form-label lead" for="second_name">Příjmení autor</label>
          <input class="form-control" type="text" name="second_name" value="<?= htmlspecialchars($_GET['second_name'] ?? '') ?>">
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <label class="form-label lead" for="ISBN">ISBN</label>
          <input class="form-control" type="text" name="ISBN" value="<?= htmlspecialchars($_GET['ISBN'] ?? '') ?>">
        </div>
      </div>
      <div class="row mt-4">
        <button class="btn" type="submit">Vyhledat</button>
      </div>
    </form>
  </div>

  <!--JavaScript Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>