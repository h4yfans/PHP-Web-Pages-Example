<?php include 'includes/header.php'; ?>

<?php

//Create DB Object
$db = new Database();

if (isset($_POST["submit"]) && !empty($_POST["submit"])) {
    //Assign Vars
    $title = mysqli_real_escape_string($db->link, $_POST["title"]);
    $body = mysqli_real_escape_string($db->link, $_POST["body"]);
    $category = mysqli_real_escape_string($db->link, $_POST["category"]);
    $author = mysqli_real_escape_string($db->link, $_POST["author"]);
    $tags = mysqli_real_escape_string($db->link, $_POST["tags"]);

    //Simple Validation
    if ($title == '' || $body == '' || $category == '' || $author == '') {
        //Set Error
        $error = 'Please fill out all required fields';
    } else {
        $query = "INSERT INTO posts
                      (title,body,category,author,tag)
                          VALUES('$title', '$body', '$category', '$author', '$tags')";
        $insert_row = $db->insert($query);
    }
}


//Create Query Categories
$query = "SELECT * FROM categories";

//Run Query Categories
$categories = $db->select($query);


?>


    <form role="form" method="post" action="add_post.php">
        <div class="form-group">
            <label>Post Title</label>
            <input name="title" type="text" class="form-control" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label>Post Body</label>
            <textarea name="body" class="form-control" placeholder="Enter Body"></textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category">
                <?php while ($row = $categories->fetch_assoc()) : ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row["name"] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Author</label>
            <input name="author" type="text" class="form-control" placeholder="Enter Author Name">
        </div>
        <div class="form-group">
            <label>Tags</label>
            <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
        </div>
        <div>
            <input type="submit" name="submit" class="btn btn-success" value="Submit">
            <input type="submit" name="del" class="btn btn-warning" value="Submit">

        </div>
        <br>
    </form>

<?php include 'includes/footer.php'; ?>
