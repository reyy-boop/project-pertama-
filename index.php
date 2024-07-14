<?php
  include "konneksi.php";

  session_start();


if (!isset($_SESSION['session_username'])) {
    header("Location: login.php");
    exit();
}
include 'menu.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
  <nav class="navbar bg-dark border-bottom border-body sticky-top" data-bs-theme="dark">
<nav class="navbar navbar-expand-lg  ">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="hospital/hospital.php">Hospital</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="departemen/departemen.php">Departemen</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="relasi/relasi.php">Relation</a>
        </li>
      </ul>
      </div>
      <a class="btn btn-danger" href="logout.php" role="button">Logout</a>
      </form>
    </div>
  </div>
</nav>
</nav>

</head>
<body>
    <div class="bg-cover">
        <div class="container">
            <h1>Welcome to My Website</h1>
            <p>Saya Muhammad Raehan Nur NPM 23.0504.0001</p>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
