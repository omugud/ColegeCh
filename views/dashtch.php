<?php

session_start();
if(!isset($_SESSION['email'])){
  header('Location: login.php');
  exit();
}

require_once 'config.php';
$result = $conn->query("SELECT * FROM lessons WHERE teacher = '{$_SESSION['name']}' ORDER BY date, time");

?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <title>Панель вчителя</title>
  <link href="public/css/main.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/2d8b6b518f.js" crossorigin="anonymous"></script>
  
</head>
<body>

<nav class="teachnav">
  <div class="container-fluidteach">
    <a class="navbar-brand" href="dashtch.php">Віртуальний клас — Вчитель (<?= $_SESSION['name'] ?>)</a>
    <button class="btn-light"><a href="logout.php" class="btn-lighht">Вийти</a></button>
  </div>
</nav>

<div class="containerleson active">
  <h2 class="mbtups">Мої уроки</h2>

  <div class="mbtuppps">
    <button type="button" class="btn-newleson"><i class="fa-solid fa-plus"></i> Створити новий урок</button>
  </div>

  <table class="table ">
    <thead>
      <tr>
        <th>Дата</th>
        <th>Час</th>
        <th>Предмет</th>
        <th>Група</th>
        <th>Посилання</th>
        <th>Дії</th>
      </tr>
    </thead>
    <tbody class="tabled">
      <?php 
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['date'] . "</td>";
          echo "<td>" . $row['time'] . "</td>";
          echo "<td>" . $row['object'] . "</td>";
          echo "<td>2-КН</td>";
          echo "<td><a href='https://meet.google.com/abc-defg-hij' target='_blank'>Перейти</a></td>";
          echo "<td>
            <button class='btn-outline-light-red' onclick='confirmDelete(" . $row['id'] . ")'><a href='delete_lesson.php?id=" . $row['id'] . "' class='btn-outline-red'>Видалити</a></button>
          </td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='6' style='text-align: center;'>Немає уроків</td></tr>";
      }
      ?>
    </tbody>
  </table>
  
</div>
<div class="containernewleson">
  <h2 class="mbtups">Створення уроку</h2>

  <div class="mbtuppps">
    <button type="button" class="btn-newlist"><i class="fa-solid fa-person-chalkboard"></i> Список уроків</button>
  </div>

  <form action="create_lesson.php" method="post">
    <div class="form-group">
      <label for="date">Дата</label>
      <input type="date" class="form-control" id="date" name="date" required>
    </div>
    <div class="form-group">
      <label for="time">Час</label>
      <input type="time" class="form-control" id="time" name="time" required>
    </div>
    <div class="form-group">
      <label for="object">Предмет</label>
      <input type="text" class="form-control" id="object" name="object" required>
    </div>
    <button type="submit" class="btn-login" name="create_lesson">Створити</button>
  </form>
</div>

<script src="public/js/main.js"></script>
</body>
<div class="footer">
  <footer class="footer">
    &copy; 2025 Віртуальний клас | Фурманчук Владислав
  </footer>
</div>
</html>
