<?php
session_start();

$errors = [
  'login' =>$_SESSION['login_error'] ?? '',
  'register' =>$_SESSION['register_error'] ?? '',
];

session_unset();
function showError($error){
  return !empty($error) ? "<div class='error_message'><p>$error</p></div>" : '';

}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <title>Вхід у Віртуальний клас</title>
  <link href="public/css/main.css" rel="stylesheet">
  <nav class="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="Index.php">Віртуальний клас</a>
      <div class="d-flex">
        <button class="btn-light"><a href="login.php" class="btn-lighht">Увійти</a></button>
        <button class="btn-outline-light"><a href="registre.php" class="btn-outlinee">Реєстрація</a></button>
      </div>
    </div>
  </nav>
</head>
<body class="bg-light">
  <div class="container">
    <div class="card">
      <h3 class="text-center">Вхід</h3>
      <form action="login_register.php"  method="post">
        <?php echo showError($errors['login']); ?>
        <div class="mbt">
          <label for="email" class="form-label">Електронна пошта</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
        </div>
        <div class="mbt">
          <label for="password" class="form-label">Пароль</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
        </div>
        <button type="submit" name="login" class="btn-login">Увійти</button>
      </form>
      <div class="mbt text-center">
        <a class="bedd" href="registre.php">Ще не маєте акаунту? Зареєструйтеся</a>
      </div>
    </div>
  </div>
</body>
 <footer class="footer">
    &copy; 2025 Віртуальний клас | Фурманчук Владислав
  </footer>
</html>
