<div class="container text-center">
    <h1>LOGIN TO THE SYSTEM</h1>
   
</div>
   
</div> <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
            <div class='alert alert-danger w-25 text-center container mb-0 mt-3' role='alert'>
                <?= $_SESSION['error'] ?>
            </div>
        <?php
            $_SESSION['error'] = null;
        endif; ?>
<div class="container w-50">
<form  method="POST" action="/authenticate">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User name</label>
    <input type="text" class="form-control" placeholder="Enter Your Name" name="username">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter Your Password" name="password"id="exampleInputPassword1">
  </div>
  <div class="text-center container">
  <button class="btn btn-primary w-50 " type="submit">Login</button></div>
</form></div>