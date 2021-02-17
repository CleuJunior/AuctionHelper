<?php
session_start();
include("bidder.php");
include("item.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>AuctionHelper</title>
    <link rel="stylesheet" type="text/css" href="ah_styles.css">
</head>

<body>
    <header>
        <?php include("header.inc.php"); ?>
    </header>
    <section id="container">
        <nav>
            <?php include("nav.inc.php"); ?>
        </nav>
        <main>
            <?php
                if (isset($_REQUEST['content'])) {
                    include($_REQUEST['content'] . ".inc.php");

                } else {
                    include("main.inc.php");

                }       
            ?>
        </main>
        <aside>
            <?php include("aside.inc.php"); ?>
        </aside>
    </section>
    <footer>
        <?php include("footer.inc.php"); ?>
    </footer>
</body>

</html>