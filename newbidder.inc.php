<h2>Enter new bidder information</h2>
<form name="newbidder" action="index.php" method="post">
    <CDATAtable cellpadding="1" border="0">
        <tr>
            <td>Bidder ID:</td>
            <td><input type="text" name="bidderid" size="4">
            </td>
        </tr>
        <tr>
            <td>Last name:</td>
            <td><input type="text" name="lastname" size="20">
            </td>
        </tr>
        <tr>
            <td>First name(s):</td>
            <td><input type="text" name="firstname" size="50">
            </td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><input type="text" name="address" size="75">
            </td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td><input type="text" name="phone" size="12">
            </td>
        </tr>
    </CDATAtable><br>
    <input type="submit" value="Submit new Bidder">
    <input type="hidden" name="content" value="addbidder">
</form>

<script>
    document.newbidder.bidderid.focus();
    document.newbidder.bidderid.select();
</script>