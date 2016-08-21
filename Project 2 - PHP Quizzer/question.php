<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
// Set question number
$number = (int) $_GET['n'];

// Reset SESSION['score'] to 0
if ($number == 1) {
    $_SESSION['score'] = 0;
}

/*
 * Get total number of questions
 */
$query = "SELECT * FROM `questions`";
// Get result
$result = $mysqli->query($query) or die($mysqli->error." on line ".__LINE__);
$total = $result->num_rows;

/*
 * Get Question
 */
$query = "SELECT * FROM `questions` WHERE `question_number` = $number";

// Get result
$result = $mysqli->query($query) or die($mysqli->error." on line ".__LINE__);

$question = $result->fetch_assoc();

/*
 * Get Choices
*/
$choice_query = "SELECT * FROM `choices` WHERE `question_number` = $number";

// Get results
$choices = $mysqli->query($choice_query) or die($mysqli->error." on line ".__LINE__);

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Quizzer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <div class="container">
        <h1>PHP Quizer</h1>
    </div>
</header>
<main>
    <div class="container">
        <div class="current">Question  <?php echo $number.' of '.$total ?></div>
        <p class="quesiton">
            <?php
            echo $question['text'];
            ?>
        </p>
        <form method="post" action="process.php">
            <ul class="choices">
                <?php while ($row = $choices->fetch_assoc()): ?>
                    <li>
                        <input type="radio" name="choice" value="<?php echo $row["id"]; ?>"><?php echo $row["text"] ?>
                    </li>
                <?php endwhile; ?>
            </ul>
            <input type="submit" value="Submit" >
            <input type="hidden" name="number" value="<?php echo $number; ?>">
        </form>
    </div>
</main>
<footer>
    <div class="container">
        Copyright &copy; 2016
        <br> github.com/h4yfans
    </div>
</footer>
</body>
</html>