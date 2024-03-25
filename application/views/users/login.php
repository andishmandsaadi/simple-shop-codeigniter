<h2>Login</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('users/login'); ?>
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
<?php echo form_close(); ?>
