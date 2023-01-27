
  <div class="d-flex justify-content-center mb-4">
        <h1>selling </h1>
    </div>
    <hr class="pt-0 pb-2">
    <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>

<div class='alert alert-danger w-50 m-auto mb-2' role='alert'>
    <?= $_SESSION['error'] ?>
</div>
<?php endif;
unset($_SESSION['error']);
?>





 <form method="POST" action="/selling/create">
    <input type="hidden" value=<?=$data->user_id?> name="user_id">
<div class="container d-flex justify-content-center mb-5 gap-3 m-auto">
<div class="input-group flex-nowrap ">
    <span class="input-group-text text-primary" id="addon-wrapping">Items</span>
    <select id="items" class="form-select" aria-label="Default select example" title="ed" palceholder="" name="values">
    <?php foreach ($data->items as $item) :
        if($item->quantity >0):?>
    <option value="<?= $item->item_name.','.$item->selling_price.','.$item->id?>"><?= $item->item_name ?></option>
    <?php endif; endforeach; ?>
    </select>
</div>

<div class="input-group ">
<span class="input-group-text text-primary " id="addon-wrapping">Quantity</span>
<input id="quantity" type="number" class="form-control p-2" aria-describedby="addon-wrapping" min="1" name="quantity">
</div>

<input type="hidden" name="total" >
<button id="add-item" class="btn btn-success" >ADD</button>
</div>
</form>

    <br>
    <div id="dataTableContainer">
        <table class="table table-hover w-100 m-auto">
            <thead>
                <tr>
                    <th scope="col">Item</th>
                    
                    <th scope="col">quantity</th>
                    <th scope="col">total</th>
                   
                    <th scope="col">delete</th>
                   
                </tr>
            </thead>
            <tbody>
      
                <?php foreach($data->all_transactions as $item):?>
                <tr>
                <td ><?= $item->item_name ?></td >
               
                <td ><?= $item->quantity ?></td >
                <td ><?= $item->total ?></td >
                  
                <td ><a class="btn btn-danger" href="/selling/delete?id=<?= $item->id?>">delete</a></td >   
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>


