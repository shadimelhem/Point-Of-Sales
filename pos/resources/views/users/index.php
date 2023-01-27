

<a class="btn btn-primary" href="/users/create"> Create New User</a>
<div class="row my-5">

<?php foreach ($data->users as $user) : ?>
        <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3" >
            <div class="card w-100 " >
                <div class="card-body">
                    <h5 class="card-title text-center">
                    <?= $user->display_name ?>
                    </h5>
                    <div class="d-flex justify-content-center align-items-center card-footer bg-transparent ">
                    <a href="./user?id=<?= $user->id ?>" class="btn btn-primary">Check User</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>

