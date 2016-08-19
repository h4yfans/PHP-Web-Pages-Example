<?php include 'database.php'; ?>
<?php 
//Create select Query
$query = "SELECT * FROM shouts ORDER BY id DESC";
$shouts = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>SHOUT IT!</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
    <div class="container">
        <header>
            <h1>SHOUT IT! Shout Box</h1>
        </header>
        <div class="shouts">
            <ul>
                <?php while($row = mysqli_fetch_assoc($shouts)) :?>
                <li class="shout">
                    <span><?php echo $row["date"] ?> - </span> <span><strong><?php echo $row["user"] ?>: </strong></span> <?php echo $row["message"] ?></li>
                    <?php endwhile; ?>

            </ul>
        </div>
        <div id="input">
           <?php if(isset($_GET['error'])): ?>
           <div class="error">
               <?php echo $_GET['error']; ?>
           </div>
           
           <?php endif; ?>
            <form action="process.php" method="post">
                <input type="text" name="user" placeholder="Enter your name">
                <input type="text" name="message" placeholder="Enter a message">
                <br>
                <input class="shout-btn" type="submit" name="submit" value="Shout It Out">
            </form>
        </div>
    </div>
</body>

</html>