<?php
include_once dirname(__FILE__) . '/functions/getUser.php';

session_start();
error_reporting(0);
if (isset($_SESSION["user_id"]))
  $user = getUser($_SESSION["user_id"]);

?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?page=1">Medicina</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?page=1">Attivita Didattiche</a>
        </li>
        <?php 
        if ($user["ruolo"] == "Admin")
        {
        ?>
        <li class="nav-item">
          <a class="nav-link active" href="index.php?page=2">Aggiungi Attività</a>
        </li>
        <?php
        }
        ?>
        <li class="nav-item">
          <a class="nav-link active" href="index.php?page=3">Unità Didattiche</a>
        </li>
        <?php 
        if ($user["ruolo"] == "Admin")
        {
        ?>
        <li class="nav-item">
          <a class="nav-link active" href="index.php?page=4">Aggiungi Unità</a>
        </li>
        <?php
        }
        ?>
        <li class="nav-item">
          <a class="nav-link active" href='functions/logout.php' aria-current="page">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>