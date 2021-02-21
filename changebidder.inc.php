<?php
    if (isset($_SESSION['login'])) {
        $bidderid = $_POST['bidderid'];
        $answer = $_POST['answer'];

        if ($answer == "Update Bidder") {
            $bidder = Bidder::findBidder($bidderid);
            $bidder->bidderid = $_POST['bidderid'];
            $bidder->lastname = $_POST['lastname'];
            $bidder->firstname = $_POST['firstname'];
            $bidder->address = $_POST['address'];
            $bidder->phone = $_POST['phone'];
            $result = $bidder->updateBidder();

            if ($result) {
                echo "<h2>Bidder $bidderid updated</h2>\n";
            } else {
                echo "<h2>Problem updating bidder $bidderid</h2>\n";
            }

        } else {
            echo "<h2>Update Canceled for bidder $bidderid</h2>\n";
        }
    } else {
        echo "<h2>Please login first</h2>\n";
    }
?>