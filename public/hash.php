<?php 

$pass_encrypted = password_hash($_GET["pass"], PASSWORD_BCRYPT, ['cost' => 10]);

die($pass_encrypted); 