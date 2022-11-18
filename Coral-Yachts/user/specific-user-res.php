<?php
class Specific_user_reservation {
  public function fetch_all() {
      global $pdo;

      $query = $pdo->prepare('SELECT r.reservation_id AS res_id, 
      r.yacht_id AS res_yacht_id,
        y.yacht_id AS yacht_yacht_id, 
        y.yacht_name AS yacht_name, 
        r.user_id AS res_user_id,
        u.user_id AS us_user_id, 
        u.user_name AS user_name, 
        r.start_date AS start_date, 
        r.end_date AS end_date
        FROM reservations AS r
        INNER JOIN yachts AS y JOIN users AS u
        ON r.yacht_id = y.yacht_id AND r.user_id = u.user_id
        WHERE u.user_id = ?');
      $query->bindValue(1, $_SESSION['user_id']);

      $query->execute();

      return $query->fetchAll();
  }
}
?>