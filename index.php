<?php
include __DIR__ . "/utilities/functions.php";

$generatedPassword = '';

if (isset($_GET['length'])) {
  $passwordLength = intval($_GET['length']);
  $generatedPassword = generatePassword($passwordLength);

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $_SESSION['generatedPassword'] = $generatedPassword;

  header("Location: revealpw.php");
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
  <h1 class="text-center py-3 ">Strong Password Generator</h1>
  <h2 class="text-center">Genera una password sicura</h2>

  <form action="index.php" method="get" class="text-center">
    <label for="length">Lunghezza della password (n° caratteri):</label>
    <input type="number" name="length" id="length" value="<?php echo $passwordLength; ?>" min="6" max="20">
    <button type="submit" class="btn btn-success ">Genera</button>
  </form>

</body>

</html>