<?php
include __DIR__ . "/utilities/functions.php";

$generatedPassword = '';
$allowRepeat = isset($_GET['allow_repeat']) ? $_GET['allow_repeat'] : 'no';

if (isset($_GET['length'])) {
  $passwordLength = intval($_GET['length']);
  $useNumbers = isset($_GET['use_numbers']);
  $useLetters = isset($_GET['use_letters']);
  $useSymbols = isset($_GET['use_symbols']);

  if ($useNumbers || $useLetters || $useSymbols) {
    
    $generatedPassword = generatePassword($passwordLength, $useNumbers, $useLetters, $useSymbols, $allowRepeat);

    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    $_SESSION['generatedPassword'] = $generatedPassword;

    header("Location: revealpw.php");
    exit();
  } else {
    $errorMessage = 'Seleziona almeno un tipo di carattere.';
  }
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
  <h2 class="text-center">Genera una password sicura</h2>

  <?php if (isset($errorMessage)) { ?>
    <div class="text-center text-danger">
      <p>
        <?php echo $errorMessage; ?>
      </p>
    </div>
  <?php } ?>

  <form action="index.php" method="get" class="text-center">
    <label for="length" class="py-3">Lunghezza della password (n° caratteri):</label>
    <input type="number" name="length" id="length" value="<?php echo $passwordLength; ?>" min="6" max="20">

    <br>

    <label class="py-3">Seleziona i tipi di carattere:</label>
    <div>
      <input type="checkbox" name="use_numbers" id="use_numbers">
      <label for="use_numbers">Numeri</label>
    </div>
    <div>
      <input type="checkbox" name="use_letters" id="use_letters">
      <label for="use_letters">Lettere</label>
    </div>
    <div>
      <input type="checkbox" name="use_symbols" id="use_symbols">
      <label for="use_symbols">Simboli</label>
    </div>

    <br>

    <label class="py-3">Consenti ripetizioni di uno o più caratteri:</label>
    <div>
      <input type="radio" name="allow_repeat" value="yes" <?php echo ($allowRepeat === 'yes') ? 'checked' : ''; ?>>
      <label for="allow_repeat">Sì</label>
    </div>
    <div>
      <input type="radio" name="allow_repeat" value="no" <?php echo ($allowRepeat === 'no') ? 'checked' : ''; ?>>
      <label for="allow_repeat">No</label>
    </div>

    <br>

    <button type="submit" class="btn btn-success">Genera</button>
  </form>

</body>

</html>