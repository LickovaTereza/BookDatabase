<?php

include "map.php";

if (isset($_GET["id"])) {
  $repo = new BookRepository();
  $repo->deleteBook($_GET["id"]);
}

header("Location: bookList.php");
exit();
