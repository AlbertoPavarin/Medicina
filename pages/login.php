<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    echo $_POST["username"] . $_POST["password"];
}
?>
<div class="mr-4 ml-4">
  <div class="login mt-5">
    <h1>Login</h1>
    <h5 id="error-message"></h5>
    <form class="mt-4" method="post">
      <label class="mt-4" for="username">
        Username
      </label>
      <input name="username" type="text" class="form-control w-100" autoComplete="Off" placeholder="Enter your Username"/>
      <label class="mt-4" for="password">
        Password
      </label>
      <input name="password" type="password" class="form-control w-100" placeholder="Enter your Password"/>
      <input type="Submit" class="sub-btn mt-4" value="Login" />
    </form>
  </div>
</div>