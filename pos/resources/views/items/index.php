

  
<a class="btn btn-primary" href="/items/create"> Create New item</a>
<div class="row my-5">

    <?php foreach ($data->items as $item) : ?>
        <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3" >
            <div class="card w-100 " >
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <?= $item->item_name ?>
                    </h5>
                    <div class="d-flex justify-content-center align-items-center card-footer bg-transparent ">
                        <a href="./item?id=<?= $item->id ?>" class="btn btn-primary">Check Item</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>





