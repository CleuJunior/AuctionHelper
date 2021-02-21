<table width="100%" cellpadding="3">
    <tr>
        <?php
            if (!isset($_SESSION['login'])):
                echo "<td></td>\n";
            else: 
                echo "<td><h3>Welcome, {$_SESSION['login']}</h3></td>\n";
            
        ?>
    </tr>
    <tr>
        <td><a href="index.php"><strong>Home</strong></a></td>
    </tr>
    <tr>
        <td><strong>Bidders</strong></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listbidders">
                <strong>List Bidders</strong></a></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newbidder">
                <strong>Add New Bidder</strong></a></td>
    </tr>
    <tr>
        <td><strong>Items</strong></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listitems">
                <strong>List Items</strong></a></td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newitem">
                <strong>Add New Item</strong></a></td>
    </tr>
    <tr>
        <td>
            <hr />
        </td>
    </tr>
    <tr>
        <td><a href="index.php?content=logout">
                <strong>Logout</strong></a></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>
            <form action="index.php" method="post">
                <label>Search for item:</label><br>
                <input type="text" name="itemid" size="14" />
                <input type="submit" value="find" />
                <input type="hidden" name="content" value="updateitem">
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <form action="index.php" method="post">
                <label>Search for bidder:</label><br>
                <input type="text" name="bidderid" size="14" />
                <input type="submit" value="find" />
                <input type="hidden" name="content" value="displaybidder">
            </form>
        </td>
    </tr>
    <?php
endif;
?>
    <form action="index.php" method="post">
        <label>Search for bidder:</label><br>
        <input type="text" name="bidderid" size="14">
        <input type="submit" value="find">
        <input type="hidden" name="content" value="displaybidder">
    </form>
</table>