
<?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
<div class='alert alert-danger w-50 m-auto mb-2' role='alert'>
    <?= $_SESSION['error'] ?>
<?php endif;
unset($_SESSION['error']);
?>
</div>
<form action="/users/store" method="POST" class="mx-auto col-lg-6 col-md-10 col-sm-12 col-xs-12 ">
<div class="mb-2 w-100 d-flex flex-row-reverse">
 <legend> <h1 class="text-center">Create User</h1></legend> 
</div>
<hr class="pt-0 pb-2">
    <div class="mb-3">
        <label for="display-name" class="form-label">Display Name</label>
        <input type="text" class="form-control" id="display-name" name="display_name" required>
    </div>
    <div class="mb-3">
        <label for="user-email" class="form-label">Email</label>
        <input type="email" class="form-control" id="user-email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="user-username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username-email" name="username" required>
    </div>
    <div class="mb-3">
        <label for="user-password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password-email" name="password" required>
    </div>
    <div class="mb-3">
        <label for="user-role" class="form-label">Role</label>
        <select class="form-select" aria-label="Role" name="role">
            <option value="admin">Admin</option>
            <option value="accountent">accountent</option>
            <option value="seller">seller</option>
            <option value="procurment">procurments</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success mt-4">Create</button>
    <a href="/users" class="btn btn-danger ms-3 mt-4">Cancel</a>
</form>