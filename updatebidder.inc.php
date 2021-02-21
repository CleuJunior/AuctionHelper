<?php
    $bidderid = $_POST['bidderid'];
    $bidder = Bidder::findBidder($bidderid);
    if ($bidder) {
        echo "<h2>Update Bidder $bidderid</h2><br>\n";
        echo "<form name=\"bidder\" action=\"index.php\" method=\"post\">\n";
        echo "<table>\n";
        echo "<tr><td>BidderID</td><td>$bidder->bidderid</td></tr>\n";
        echo "<tr><td>Last Name</td><td><input type=\"text\" name=\"lastname\" " . "value=\"$bidder->lastname\"></td></tr>\n";
        echo "<tr><td>First Name</td><td><input type=\"text\" " .
        "name=\"firstname\" value=\"$bidder->firstname\"></td></tr>\n";
        echo "<tr><td>Address</td><td><input type=\"text\" " .
        "name=\"address\" value=\"$bidder->address\"></td></tr>\n";
        echo "<tr><td>Phone</td><td><input type=\"text\" " .
        "name=\"phone\" value=\"$bidder->phone\"></td></tr>\n";
        echo "</CDATAtable><br><br>\n";
        echo "<input type=\"submit\" name=\"answer\" value=\"Update
        Bidder\">\n";
        echo "<input type=\"submit\" name=\"answer\" value=\"Cancel\">\n";
        echo "<input type=\"hidden\" name=\"bidderid\"
        value=\"$bidderid\">\n";
        echo "<input type=\"hidden\" name=\"content\"
        value=\"changebidder\">\n";
        echo "</form>\n";
    } else {
        echo "<h2>Sorry, bidder $bidderid not found</h2>\n";
    }
?>
<script>
    document.bidder.lastname.focus();
    document.bidder.lastname.select();
</script>