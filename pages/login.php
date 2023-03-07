<?php

session_start();

include_once dirname(__FILE__) . '/../functions/login.php';
include_once dirname(__FILE__) . '/../functions/checkLogin.php';

if (count($_SESSION) > 0)
{
    header('Location: index.php?page=1');
    exit();
};

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['email']) && !empty($_POST['password'])) {

    var_dump($_POST['password']);
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