<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
<form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>users/register">
    <div class="form-group">
        <label>First Name*</label><input type="text" class="form-control" name="first_name" placeholder="Enter Your First Name">
    </div>
    <div class="form-group">
        <label>Last Name*</label><input type="text" class="form-control" name="last_name" placeholder="Enter Your Last Name">
    </div>
    <div class="form-group">
        <label>Choose Username*</label><input type="text" class="form-control" name="username" placeholder="Username">
    </div>
    <div class="form-group">
        <label>Email Address*</label><input type="email" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="form-group">
        <label>Password*</label><input type="password" class="form-control" name="password" placeholder="Enter Password">
    </div>
    <div class="form-group">
        <label>Confirm Password*</label><input type="password" class="form-control" name="password2" placeholder="Enter Password">
    </div>
    <input name="submit" type="submit" class="btn btn-default" value="Register">
</form>