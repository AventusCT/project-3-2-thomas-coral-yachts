<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=yacht-db', 'root', '');
} catch (PDOException $e) {
    exit('Database error.');
}

?>