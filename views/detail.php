<?php $this->layout("layouts/main", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="page-section section">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/<?=$this->e($shopdt->image1)?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/<?=$shopdt['image2']?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <h2 style="color:#ff708a"> <b><?=$shopdt->name?></b> </h2>
                    </div>
                    <div class="col-12">
                        <h4> <b style="color:#ff708a">Opening time: </b> <?=$shopdt->openingtime?></h4>
                    </div>
                    <div class="col-12">
                        <h4> <b style="color:#ff708a">Price: </b> <?=$shopdt->price?></h4>
                    </div>
                    <div class="col-12">
                        <h4> <b style="color:#ff708a">Address: </b> <?=$shopdt->address?></h4>
                    </div>
                    <div class="col-12">
                        <h4><?=$shopdt->description?></h4>
                    </div>
                </div>

            </div>
        </div>

        <hr>

        <div class="row mt-5 mb-15">
            <h2> <b>Recommended Shops</b> </h2>
            <div class="owl-carousel featured-carousel owl-theme">
                <?php foreach($shops as $shop) :?>
                <div class="item">
                    <div class="card">
                        <a href="/detail_shop/<?=$shop->id?>">
                            <img src="/<?=$shop->image1?>" alt="product-img" width="250px" height="250px">
                            <div class="card-body">
                                <h3><?=$shop->name?></h3>
                                <span class="float-start prices"> <b> </b></span>
                                <span class="float-end" > <s></s> </span>  
                            </div> 
                        </a>
                    </div>
                </div>

                <?php endforeach?>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>


<?php $this->start("page_specific_js") ?>
<script>
    $(document).ready(function(){
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots: true,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    })
</script>
<?php $this->stop() ?>
