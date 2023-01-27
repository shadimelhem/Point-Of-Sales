<?php

use Core\Helpers\Helper;
?>
<div class="mb-2 w-100 d-flex flex-row-reverse">
    <a href="\items" class="btn btn-success">Back</a>
</div>
<form class="mx-auto col-lg-6 col-md-10 col-sm-12 col-xs-12  ">
  <fieldset >
  <legend> <h1 class="text-center">  Information</h1></legend> 
    
    <div class="mb-3">
      <label class="form-label">Item name :</label>
      <input type="text"  class="form-control" value=<?= $data->item->item_name ?>>
    </div>

    <div class="mb-3">
      <label class="form-label">Cost :</label>
      <input type="text"  class="form-control" value=<?= $data->item->cost ?>>
    </div>
    <div class="mb-3">
      <label class="form-label">Selling price :</label>
      <input type="text"  class="form-control" value=<?= $data->item->selling_price ?>>
    </div> 
    <div class="mb-3">
      <label class="form-label">Quantity :</label>
      <input type="text"  class="form-control" value=<?= $data->item->quantity ?>>
    </div>
     <div class="mb-3">
      <label class="form-label">Created at :</label>
      <input type="text"  class="form-control" value=<?= $data->item->created_at?>>
    </div> 
    <div class="mb-3">
      <label class="form-label">Updated at:</label>
      <input type="text"  class="form-control" value=<?= $data->item->updated_at ?>>
    </div>

     
    
    </fieldset>

    <a href="/items/edit?id=<?= $data->item->id ?>" class="btn btn-warning">Edit</a>
    <a href="/items/delete?id=<?= $data->item->id ?>" class="btn btn-danger">Delete</a>
 
</form>

