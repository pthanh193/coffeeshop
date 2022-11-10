<?php $this->layout("layouts/main", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="page-section section section-padding">
        <div class="container">
			<div class="row">
                <div class="col-lg-2 col-12 mb-40"></div>

                <div class="col-lg-8 col-12 mb-40">
                    <div class="login-register-form-wrap">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Update Shop Information</h3>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger float-end delete" data-id="<?=$id_shop?>">Delete</button>
                            </div>
                        </div>
                        <form method="POST" action="/edit_shop/<?=$this->e($shop['id'])?>"  enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4 col-12 mb-5">
								   <label>Name</label>
								   <input type="text" placeholder="Name" name="name"
								   value="<?=$this->e($shop['name'])?>">
								   <?php if (isset($errors['name'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['name'])?></strong>
                                    </span>
                               		<?php endif ?>
							   </div>

							   <div class="col-md-4 col-12 mb-5">
								   <label>Opening time</label>
								   <input type="text" placeholder="Opening time" name="openingtime"
								   value="<?=$this->e($shop['openingtime'])?>">
								   <?php if (isset($errors['openingtime'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['openingtime'])?></strong>
                                    </span>
                                	<?php endif ?>
							   </div>

                               <div class="col-md-4 col-12 mb-5">
								   <label>Price</label>
								   <input type="text" placeholder="Price" name="price"
								   value="<?=$this->e($shop['price'])?>">
								   <?php if (isset($errors['price'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['price'])?></strong>
                                    </span>
                                	<?php endif ?>
							   </div>

                               <div class="col-md-4 col-12 mb-5">
								   <label>District</label>
								   <select class="form-select" type="text" name="id_district">
										<option selected value="<?=$id_dt?>"><?=$this->e($name_dt)?></option>
								   <?php foreach($districts as $dt) {?>
                                        <option name="id_district" value="<?=$dt->id?>"><?=$this->e($dt->name)?></option>
									<?php } ?>
                                   </select>
								   <?php if (isset($errors['id_district'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['id_district'])?></strong>
                                    </span>
                                	<?php endif ?>
							   </div>

                               <div class="col-md-8 mb-5">
								   <label>Address</label>
								   <input type="text" placeholder="Address" name="address" 
								   value="<?=$this->e($shop['address'])?>">
								   <?php if (isset($errors['address'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['address'])?></strong>
                                    </span>
                                	<?php endif ?>
							   </div>

                               <div class="col-12 mb-5">
								   <label>Description</label>
								   <textarea name="description" style="width: 100%; height: 100px;" ><?=$this->e($shop['description'])?>
                                    </textarea>
								   <?php if (isset($errors['description'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['description'])?></strong>
                                    </span>
                                	<?php endif ?>
							   </div>

                               <div class="col-12 mb-5">
								   <label>Images</label>
								   <input type="file" name="image1"  onchange="previewImg1()">
                                  
                                   <img id="img1" class="mt-3" 
                                   src="/<?=(!isset($img1)) ? $this->e($shop['image1']) : $this->e($img1)?>?>" width="150px"/>
                                   

								   <?php if (isset($errors['image1'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['image1'])?></strong>
                                    </span>
                                	<?php endif ?>

                                   <input class="mt-3" type="file" name="image2" onchange="previewImg2()">
                                   <img id="img2" class="mt-3" 
                                   src="/<?=(!isset($img2)) ? $this->e($shop['image2']) : $this->e($img2)?>" width="150px"/>
                                   

								   <?php if (isset($errors['image2'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['image2'])?></strong>
                                    </span>
                                	<?php endif ?>
							   </div>

                               <div class="col-12 mb-5">
                                    <input class="float-end" type="submit" value="Update" style="width:auto;">
							   </div>
                               
							   
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-2 col-12 mb-40"></div>
			</div>
        </div>
    </div>

<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
<script>
    function previewImg1(){
        document.getElementById('img1').src=URL.createObjectURL(event.target.files[0]);
    }

    function previewImg2(){
        document.getElementById('img2').src=URL.createObjectURL(event.target.files[0]);
    }

    $(document).ready(function() {
        $('.delete').click(function(){
        var del = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/delete_shop/" + del
                    Swal.fire(
                    'Deleted!',
                    'Your data has been successfully deleted.',
                    'success'
                    )
                }
            })
        })
    })

</script>

<?php $this->stop() ?>
