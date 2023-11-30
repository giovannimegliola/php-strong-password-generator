<?php
function generatePassword($length, $useNumbers = true, $useLetters = true, $useSymbols = true, $allowRepeat = 'no')
{
  $chars = '';

  if ($useNumbers) {
    $chars .= '0123456789';
  }

  if ($useLetters) {
    $chars .= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  }

  if ($useSymbols) {
    $chars .= '?!/@#$%^&*-_';
  }

  $password = '';
  $charsLength = strlen($chars);

  for ($i = 0; $i < $length; $i++) {
    $index = rand(0, $charsLength - 1);
    $char = $chars[$index];

    if ($allowRepeat === 'no') {
      while (strpos($password, $char) !== false) {
        $index = rand(0, $charsLength - 1);
        $char = $chars[$index];
      }
    }

    $password .= $char;
  }

  return $password;
}
?>