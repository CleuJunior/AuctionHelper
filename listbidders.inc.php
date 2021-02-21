<?php
    echo "<script>\n";
    echo "function listbox_dblclick() {\n";
    echo "document.bidders.displaybidder.click() }\n";
    echo "</script>\n";
    
    echo "<script>\n";
    echo "function button_click(target) {\n";
    echo "if(target==0) bidders.action=\"index.php?content=displaybidder\"\n";
    echo "if(target==1) bidders.action=\"index.php?content=removebidder\"\n";
    echo "if(target==2) bidders.action=\"index.php?content=updatebidder\"\n";
    echo "}\n";

    echo "</script>\n";
    echo "<h2>Select Bidder</h2>\n";
    echo "<form name=\"bidders\" method=\"post\">\n";
    echo "<select ondblclick=\"listbox_dblclick()\" name=\"bidderid\"
    size=\"20\">\n";

    $bidders = Bidder::getBidders();
    foreach($bidders as $bidder) {
        $bidderid = $bidder->bidderid;
        $name = $bidderid . " - " . $bidder->lastname . ", " . $bidder->firstname;
        echo "<option value=\"$bidderid\">$name</option>\n";

    }

    echo "</select><br><br>\n";
    echo "<input type=\"submit\" onClick=\"button_click(0)\" " .
    "name=\"displaybidder\" value=\"View Bidder\">\n";
    echo "<input type=\"submit\" onClick=\"button_click(1)\" " .
    "name=\"deletebidder\" value=\"Delete Bidder\">\n";
    echo "<input type=\"submit\" onClick=\"button_click(2)\" " .
    "name=\"updatebidder\" value=\"Update Bidder\">\n";
    echo "</form>\n";
?>