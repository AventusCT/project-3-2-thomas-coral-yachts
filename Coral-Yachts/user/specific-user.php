<?php
class Specific_user {
  public function fetch_all() {
      global $pdo;

      $query = $pdo->prepare('SELECT user_name, name, lastname, email, telephone FROM users WHERE user_id = ?');
      $query->bindValue(1, $_SESSION['user_id']);

      $query->execute();

      return $query->fetchAll();
  }
}
?>