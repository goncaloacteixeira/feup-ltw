<?php

function userExists($username, $password) {
  global $db;
  $shaPassword = sha1($password);
  $stmt = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $shaPassword);

  $stmt->execute();
  $users = $stmt->fetch();
  return (count($users) >= 0);
}
