<?php
    if(isset($_POST['addReservationbtn'])) {

        if (isset($_POST['yacht_id'], $_POST['user_id'], $_POST['start_date'], $_POST['end_date'])) {
            $yacht_id = $_POST['yacht_id'];
            $user_id = $_POST['user_id'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];


            if (empty ($yacht_id) or empty ($user_id) or empty ($start_date) or empty ($end_date)) {
                $error = "All fields required!";
            } else {
                         
                $query = $pdo->prepare('INSERT INTO reservations (yacht_id, user_id, start_date, end_date) VALUES (? ,? , ?, ?)');
                $query->bindValue(1, $yacht_id);
                $query->bindValue(2, $user_id);
                $query->bindValue(3, $start_date);
                $query->bindValue(4, $end_date);
    
                $query->execute();

                $query = $pdo->prepare('SELECT user_name FROM users WHERE user_id = ?');
                $query->bindValue(1, $user_id);

                $query->execute();
                $num = $query->rowCount();
                $row = $query->fetch(PDO::FETCH_ASSOC);
                $user_name = $row['user_name'];
                $antierror = "Reservation of $user_name added!";
            }
        }
      }
?>