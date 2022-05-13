<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /lab08');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM user WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /lab08");
    } else {
      $message = 'Error, las credenciales no son correctas';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Iniciar sesión</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Iniciar sesión</h1>
    <span>o <a href="signupB.php">Registrarse</a></span>

    <form action="loginB.php" method="POST">
      <input name="email" type="text" placeholder="Correo">
      <input name="password" type="password" placeholder="Contraseña">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>
