<?php $this->layout("layouts/main", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="page-section section">
    <div class="container">
        <h2>Search Result</h2>
        <div class="row">
        <?php foreach($shops as $shop):?>
            <div class="col-lg-4 col-md-6 col-12 mb-40">
                <div class="product-item">
                    <div class="product-inner">

                        <div class="image">
                            <img src="<?=$shop->image1?>" alt="Shop Image">

                            <div class="image-overlay">
                                <div class="action-buttons">
                                    <button> <a href="#"> More Details </a></button>
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
                                        <h3 class="title"><a href="#"><?=$this->e($shop->name)?></a></h3>
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
        </div>
    </div>
</div>

<?php $this->stop() ?>