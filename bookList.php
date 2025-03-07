<?php

include "map.php";

$repo = new BookRepository();
$books = $repo->getAllBooks();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="bookList.css">
  <title>Seznam knih</title>
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
            <a class="nav-link active" aria-current="page" href="bookList.php">Seznam dostupných knih</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add.php">Přidat knihu</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!--book list-->
  <div class="container mt-5 mb-5">
    <h1 class="display-6 mt-4 mb-3">Seznam knih</h1>
    <table class="table">
      <thead>
        <th>Název knihy</th>
        <th>Obálka knihy</th>
        <th>Autor</th>
        <th>Popis knihy</th>
        <th colspan="2">ISBN</th>
      </thead>
      <tbody>
        <?php foreach ($books as $book) : ?>
          <tr>
            <td class="col-2 lead"><?php echo htmlspecialchars($book->book_name); ?></td>
            <td class="col-2"> <img src="<?php echo htmlspecialchars($book->book_picture); ?>" alt="" height="150px"> </td>
            <!-- <td class="col-auto"><?php echo htmlspecialchars($book->first_name); ?></td>
            <td class="col-auto"><?php echo htmlspecialchars($book->second_name); ?></td> -->
            <td class="col-2"><?php echo htmlspecialchars($book->first_name); ?> <?php echo htmlspecialchars($book->second_name); ?></td>
            <td class="col-6"><?php echo htmlspecialchars($book->description); ?></td>
            <td class="col-auto"><?php echo htmlspecialchars($book->ISBN); ?></td>
            <td class="col-2">
              <a href="delete.php?id=<?php echo $book->id; ?>" onclick="return confirm('Opravdu chcete smazat?')" class="btn btn-sm">odstranit</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>


  <!--JavaScript Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>