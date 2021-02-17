<?php
if (!isset($_SESSION['login'])) {
?>
    <h2>Please log in</h2><br>
    <form name="login" action="index.php" method="post">
        <label>UserID</label>
        <input type="text" name="userid" size="10">
        <br>
        <br>
        <label>Password</label>
        <input type="password" name="password" size="10">
        <br>
        <br>
        <input type="submit" value="Login">
        <input type="hidden" name="content" value="validate">
    </form>
<?php
} else {
    echo "<h2>Welcome to AuctionHelper</h2>\n";
    echo "<br><br>\n";
    echo "<p>This program tracks bidder and auction item information</p>\n";
    echo "<p>Please use the links in the navigation window</p>\n";
    echo "<p>Please DO NOT use the browser navigation buttons!</p>\n";
}
?>

<script>
    document.login.userid.focus();
    document.login.userid.select();
</script>