<?php
session_start();

if (isset($_SESSION['generatedPassword'])) {
  $generatedPassword = $_SESSION['generatedPassword'];
  unset($_SESSION['generatedPassword']);
} else {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>PHP Password Generator</title>
</head>

<body>
  <h1 class="text-center py-3">Strong Password Generator</h1>
  <div class="text-center">
    <h3>Ecco la tua nuova password:</h3>
    <p>
      <?php echo $generatedPassword; ?>
    </p>
  </div>
</body>

</html>