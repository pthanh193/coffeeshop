<?php $this->layout("layouts/main", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
    <!-- Page Section Start -->
    <div class="page-section section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12 mb-40"></div>
                <div class="col-lg-4 col-12 mb-40">
                    <div class="login-register-form-wrap">
                        <h3>Login</h3>
                        <form method="POST" action="/login">
                            <div class="row">
                                <div class="col-12 mb-15">
                                    <input type="text" placeholder="Username" name="username"
                                    value="<?=isset($old['username']) ? $this->e($old['username']) : '' ?>">
                                    <?php if (isset($errors['username'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['username'])?></strong>
                                    </span>
                                    <?php endif ?>
                                </div>
                                <div class="col-12 mb-15">
                                    <input type="password" placeholder="Password" name="password"
                                    value="<?=isset($old['password']) ? $this->e($old['password']) : '' ?>">
                                    <?php if (isset($errors['password'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['password'])?></strong>
                                    </span>
                                <?php endif ?>
                                </div>
                                <div class="col-12 float-end">
                                    <div class="header-top-right">
                                        <p><a href="/register">You are a new user?</a></p>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <input type="submit" value="Login">  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-40"></div>
            </div>
        </div>
    </div><!-- Page Section End -->

<?php $this->stop() ?>
