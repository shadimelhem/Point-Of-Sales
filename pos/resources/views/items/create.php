<?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
<div class='alert alert-danger w-50 m-auto mb-2' role='alert'>
    <?= $_SESSION['error'] ?>
<?php endif;
unset($_SESSION['error']);
?>
</div>




<form action="/items/store" method="POST" class="mx-auto col-lg-6 col-md-10 col-sm-12 col-xs-12 ">
<div class="mb-2 w-100 d-flex flex-row-reverse">
<legend> <h1 class="text-center">Create New Item</h1></legend>    
</div>


    <div class="mb-3">
        <label for="item-title" class="form-label">item name</label>
        <input type="text" class="form-control" id="item-title" name="item_name" required>
    </div>
    <div class="mb-3">
        <label for="item-title" class="form-label">item cost</label>
        <input type="text" class="form-control" id="item-title" name="cost" required>
    </div>
    <div class="mb-3">
        <label for="item-title" class="form-label">item price</label>
        <input type="text" class="form-control" id="item-title" name="selling_price" required>
    </div>
    <div class="mb-3">
        <label for="item-title" class="form-label">item quantity</label>
        <input type="text" class="form-control" id="item-title" name="quantity" required>
    </div>
    
    
    <button type="submit" class="btn btn-success mt-4">Create</button>
</form>

