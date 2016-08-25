<?php include "includes/header.php" ?>



<form role="form" method="post" action="add_category.php">
    <div>
        <div class="form-group">
            <label>Category Name</label>
            <input name="name" type="text" class="form-control" placeholder="Enter Category" value="">
        </div>
    </div>

    <div>
        <input name="submit" type="submit" class="btn btn-default" value="Submit">
    </div>
    <br>
</form>

<?php include "includes/footer.php" ?>
