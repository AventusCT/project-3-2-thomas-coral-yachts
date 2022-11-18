<?php
include_once('connection.php');
class Yacht {
    public function fetch_all() {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM yachts");
        $query->execute();

        return $query->fetchAll();
    }
    public function fetch_data($yacht_id) {
        global $pdo;

        $query  = $pdo->prepare("SELECT * FROM yachts WHERE yacht_id = ?");
        $query->bindValue(1, $yacht_id);
        $query->execute();
        
        return $query->fetch();
    }
}

?>
