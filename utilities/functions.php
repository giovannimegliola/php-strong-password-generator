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