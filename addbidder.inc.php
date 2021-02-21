<?php
    if (isset($_SESSION['login'])) {
        $bidderid = $_POST['bidderid'];
        if ((trim($bidderid) == '') OR (!is_numeric($bidderid)))
        {
            echo "<h2>Sorry, you must enter a valid bidder ID number</h2>\n";
        } else{
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $bidder = new Bidder($bidderid,$lastname,$firstname,$address,$phone);
            $result = $bidder->saveBidder();
            if ($result){
                echo "<h2>New Bidder #$bidderid successfully added</h2>\n";
            } else{
                echo "<h2>Sorry, there was a problem adding that bidder</h2>\n";
            }

        }
    } else {
        echo "<h2>Please log in first</h2>\n";
    }
?>