<?php
$password = $argv[1];

// Hash the password using a strong algorithm like bcrypt
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Output the hashed password
echo $hashedPassword;