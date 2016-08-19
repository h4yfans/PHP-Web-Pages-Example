<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
// Check to see if score is set
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

if ($_POST) {
    // Get question number
    $number = $_POST['number'];
    // Get selected choice id
    $selected_choice = $_POST['choice'];
    $next = $number + 1;

    /*
     * Get number of questions
     */
    $query = "SELECT * FROM `questions`";
    // Get result
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $result->num_rows;

    /*
     * Get correct choice
     */

    $query = "SELECT * FROM `choices` WHERE question_number = $number AND is_correct = 1";

    // Get result
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

    // Get row
    $row = $result->fetch_assoc();

    // Set correct choice id
    $correct_choice = $row['id'];

    // Compare
    if ($selected_choice == $correct_choice) {
        // Answer is correct
        $_SESSION['score']++;
    }


    // Check if this is the last question
    if ($number == $total) {
        header("Location: final.php");
        exit();
    } else {
        header("Location: question.php?n=".$next);
    }
}
