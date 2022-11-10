<?php $this->layout("layouts/main", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="container py-2">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/banner1.jpg" class="d-block w-100" height="600px" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/images/banner2.jpg" class="d-block w-100" height="600px"  alt="...">
            </div>
            <div class="carousel-item">
                <img src="/images/banner3.jpg" class="d-block w-100" height="600px"  alt="...">
            </div>
            <div class="carousel-item">
                <img src="/images/banner4.jpg" class="d-block w-100" height="600px"  alt="...">
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

    <hr>
    <div class="row mt-15 text-center">
        <h3> <i>"Three hundred years ago, during the Age of Enlightenment, the coffee house became the center of innovation."</i> </h3>
        <br>
        <h4> <i>-Peter Diamonde-</i> </h4>
    </div>
    <hr>

    <div class="row mt-2 mb-15">
        <h2><b>New Updated</b></h2>
        <div class="owl-carousel featured-carousel owl-theme">
            <?php foreach($shops as $shop) :?>
            <div class="item">
                <div class="card">
                    <a href="/detail_shop/<?=$shop->id?>">
                        <img src="<?=$shop->image1?>" alt="product-img" width="250px" height="250px">
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
