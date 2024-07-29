<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Trix Editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Forum</title>
</head>
<body>
    <!-- start header section -->
    <header class="px-2 shadow-sm mb-1">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid d-flex justify-content-between">
                <a class="navbar-brand text-uppercase text-light" href="index.php">
                    <img src="images/tz-logo.png" alt="" width="45" height="44" class="me-2">
                    Forum
                </a>
                <button class="navbar-toggler bg-white shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">
                    <!-- <a class="nav-link dropdown-toggle text-capitalize text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item text-capitalize" href="#">Action</a></li>
                      <li><a class="dropdown-item text-capitalize" href="#">Another action</a></li>
                      <li><a class="dropdown-item text-capitalize" href="#">Something else here</a></li>
                    </ul>
                  </li> -->
                  <li class="nav-item">
                    <a href="channels.php" class="nav-link text-white text-uppercase">Categories</a>
                  </li>
                </ul>
                <div class="d-flex">
                  <a href="" class="btn btn-outline-secondary text-white me-3 border-0" data-bs-toggle="modal" data-bs-target="#loginModal">Sign in</a>
                  <?php include 'login-modal.php'; ?>
                  <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a>
                </div>
              </div>
            </div>
        </nav>
    </header>
    <!-- end header section -->