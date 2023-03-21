<?php

session_start();

include_once dirname(__FILE__) . '/functions/login.php';
include_once dirname(__FILE__) . '/functions/checkLogin.php';

if (count($_SESSION) > 0)
{
    header('Location: index.php?page=1');
    exit();
};

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $data = [
      "email" => $_POST['email'],
      "password" => hash("sha256", $_POST['password']),
    ];

    if (login($data) == -1)
    {
      echo "Email o password errata";
    }
  }
}
?>
<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<div class="mr-4 ml-4">
  <div class="login mt-5">
    <h1>Login</h1>
    <h5 id="error-message"></h5>
    <form class="mt-4" method="post">
      <label class="mt-4" for="email">
        Email
      </label>
      <input name="email" type="email" class="form-control w-100" autoComplete="Off" placeholder="Enter your Email"/>
      <label class="mt-4" for="password">
        Password
      </label>
      <input name="password" type="password" class="form-control w-100" placeholder="Enter your Password"/>
      <input type="Submit" class="sub-btn mt-4" value="Login" />
    </form>
  </div>
</div>