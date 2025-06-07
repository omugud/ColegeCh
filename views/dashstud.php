<?php
session_start();
if(!isset($_SESSION['email'])){
  header('Location: login.php');
  exit();
}

require_once 'config.php';

$result = $conn->query("SELECT * FROM lessons ORDER BY date, time");
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <title>Панель учня</title>
  <link href="public/css/main.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/2d8b6b518f.js" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashstud.php">Віртуальний клас — Учень (<?= $_SESSION['name'] ?>)</a>
    <button class="btn-light"><a href="logout.php" class="btn-lighht">Вийти</a></button>
  </div>
</nav>

<div class="containerleson active">
  <h2 class="mbtups">Мій розклад</h2>

  <table class="table">
    <thead>
      <tr>
        <th>Дата</th>
        <th>Час</th>
        <th>Предмет</th>
        <th>Вчитель</th>
        <th>Посилання</th>
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
          echo "<td>" . $row['teacher'] . "</td>";
          echo "<td><a href='https://meet.google.com/abc-defg-hij' target='_blank'>Приєднатися</a></td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5' style='text-align: center;'>Немає уроків</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
 <footer class="footer">
    &copy; 2025 Віртуальний клас | Фурманчук Владислав
  </footer>
</body>
</html>
