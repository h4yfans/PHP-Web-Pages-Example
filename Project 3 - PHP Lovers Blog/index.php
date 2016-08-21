<?php include 'config/config.php' ?>
<?php include 'libraries/Database.php' ?>
<?php include 'includes/header.php' ?>
<?php include 'helpers/format_helper.php' ?>
<?php
//Create DB Object
$db = new Database();

//Create Query
$query = "SELECT * FROM posts";

//Run Query
$posts = $db->select($query);
?>
<?php if ($posts): ?>
    <?php while($row = $posts->fetch_assoc()): ?>

    <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
        <p class="blog-post-meta"> <?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a> </p>
        <?php echo shorterText($row['body']) ;?>
        <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>

    </div>

<?php endwhile; ?>
<?php else : ?>
    <p>There are no post yet</p>
<?php endif; ?>


<?php include 'includes/footer.php' ?>