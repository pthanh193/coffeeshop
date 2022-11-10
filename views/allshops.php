<?php $this->layout("layouts/main", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="page-section section">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>All Shops</h2>
            </div>
            <div class="col-6">
                <div class="dropdown float-end">
                   
                    <button class="btn btn-primary dropbtn">Filter by district</button>
                    <div class="dropdown-content">
                        <?php foreach($districts as $dt) :?>
                        <a href="/shops/district/<?=$dt->id?>"><?=$dt->name?></a>
                        <?php endforeach ?> 
                    </div>
                
                </div>
            </div> 
        </div>
        
        <div class="row mt-3">
        <?php foreach($shops as $shop):?>
            <div class="col-lg-4 col-md-6 col-12 mb-40">
                <div class="product-item">
                    <div class="product-inner">

                        <div class="image">
                            <img src="<?=$shop->image1?>" alt="Shop Image">

                            <div class="image-overlay">
                                <div class="action-buttons">
                                    <button> <a href="/detail_shop/<?=$shop->id?>"> More Details </a></button>
                                    <?php if (\App\SessionGuard::isUserLoggedIn() && \App\SessionGuard::user()->role == "admin") :?>
                                    <button><a href="/edit_shop/<?=$shop->id?>"> Edit </a></button>                                                                 
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                        <div class="content">
                            <div class="row">
                                <div class="col-12">
                                    <div class="content-left">
                                        <h3 class="title"><a href="/detail_shop/<?=$shop->id?>"><?=$this->e($shop->name)?></a></h3>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="color"> <b>Opening time: </b> <?=$this->e($shop->openingtime)?></h5>
                                </div>
                                <div class="col-12">
                                    <h5 class="color"> <b>Price: </b> <?=$this->e($shop->price)?> </h5>
                                </div>
                                <div class="col-12">
                                    <h5 class="color"> <b>Address: </b> <?=$this->e($shop->address)?> </h5>
                                </div>
                            </div>                
                        </div>
                    </div>
                </div>

            </div>
            <?php endforeach ?>
            
           

              

            <!-- <div class="col-12">
                <ul class="page-pagination">
                    <li><a href="#"><i class="fa fa-angle-left"></i></a></li>                  
                        <li><a href="#">1</a></li>                            
                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div> -->
        </div>

    </div>
</div>

<?php $this->stop() ?>

