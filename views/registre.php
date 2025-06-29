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
  <title>Реєстрація у Віртуальному класі</title>
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
      <h3 class="text-center">Реєстрація</h3>
      <form action="login_register.php" method="post">
        <?php echo showError($errors['register']); ?>
        <div class="mbt">
          <label for="name" class="form-label">ПІБ</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Фурманчук Владислав" required>
        </div>
        <div class="mbt">
          <label for="email" class="form-label">Електронна пошта</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
        </div>
        <div class="mbt">
          <label for="role" class="form-label">Роль</label>
          <select class="form-select" id="role" name="role" required>
            <option value="" disabled selected>Оберіть роль</option>
            <option value="student">Учень</option>
            <option value="teacher">Вчитель</option>
          </select>
        </div>
        <div class="mbt">
          <label for="password" class="form-label">Пароль</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
          <button type="submit" name="register" class="btn-registre">Зареєструватися</button>
      </form>
      <div class="mbt text-center">
        <a class="bedd"href="login.php">Уже маєте акаунт? Увійдіть</a>
      </div>
    </div>
  </div>
   <footer class="footer">
    &copy; 2025 Віртуальний клас | Фурманчук Владислав
  </footer>
</body>
</html>
