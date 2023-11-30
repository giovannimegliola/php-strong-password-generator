<?php
function generatePassword($length){
  $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789?!@#$%^&*-_';
  $password = '';

  for ($i = 0; $i < $length; $i++) {
    $password .= $chars[rand(0, strlen($chars) - 1)];
  }
  return $password;
};

if (isset($_GET['length'])) {
  $passwordLength = intval($_GET['length']);
  $generatedPassword = generatePassword($passwordLength);
};
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
    <input type="number" name="length" id="length" value="<?php echo $passwordLength; ?>"min="6" max="20">
    <button type="submit" class="btn btn-success ">Genera</button>
  </form>

  <?php if (isset($generatedPassword)) { ?>
    <div class="text-center">
      <h3>Ecco la tua nuova password:</h3>
      <p>
        <?php echo $generatedPassword; ?>
      </p>
    <?php }; ?>
  </div>
</body>

</html>