<br>
<legend> <h1 class="text-center">Dashboard</h1></legend>  
<hr class="pt-0 w-25 container pb-2">  
</div>



<div class="row container justify-content-center my-5">

    
        <div class="htu-card-wrapper  mb-5 col-12 col-md-6 col-lg-4 col-xl-3" >
            <div class="card w-100">
                <div class="card-body card text-bg-primary">
                    <p class="text-center">Total items</p>
                    <h5 class="card-title text-center">
                        <?= $data->items_count ?>
                    </h5>
                    
                </div>
            </div>
        </div>
        <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card w-100">
                <div class="card-body card text-bg-primary">
                <p class="text-center"> Total users</p>
                    <h5 class="card-title text-center">
                        <?= $data->users_count ?>
                    </h5>
                    
                </div>
            </div>
        </div>
        <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card w-100">
                <div class="card-body card text-bg-primary">
                <p class="text-center"> Total transaction</p>
                    <h5 class="card-title text-center">
                        <?= $data->total_transaction ?> 
                    </h5>
                    
                </div>
            </div>
        </div>
      
</div>
