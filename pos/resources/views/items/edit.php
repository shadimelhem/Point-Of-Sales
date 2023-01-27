<div class="mt-5 d-flex gap-3">
    <a href="\items" class="btn btn-danger">Back</a>
</div>


<form action="/items/update" method="POST" class="mx-auto col-lg-6 col-md-10 col-sm-12 col-xs-12 ">
<div class="mb-2 w-100 d-flex flex-row-reverse">
<legend> <h1 class="text-center">Edit item</h1></legend>
</div>

    <input type="hidden" name="id" value="<?= $data->item->id ?>">
    <div class="mb-3">
        <label for="item-title" class="form-label">item name</label>
        <input type="text" class="form-control" id="item-title" name="item_name" value="<?= $data->item->item_name ?>" required>
    </div>
    <div class="mb-3">
        <label for="item-title" class="form-label">item cost</label>
        <input type="text" class="form-control" id="item-title" name="cost" value="<?= $data->item->cost ?>" required>
    </div>
    <div class="mb-3">
        <label for="item-title" class="form-label">item selling price</label>
        <input type="text" class="form-control" id="item-title" name="selling_price" value="<?= $data->item->selling_price?>" required>
    </div>
    <div class="mb-3">
        <label for="item-title" class="form-label">item quantity</label>
        <input type="text" class="form-control" id="item-title" name="quantity" value="<?= $data->item->quantity?>" required>
    </div>
    
    <button type="submit" class="btn btn-warning mt-4">Update</button>
</form>
