<?php $this->layout("layouts/main", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="page-section section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 mb-40"></div>
            <div class="col-lg-4 col-12 mb-40">
                <div class="login-register-form-wrap">
                    <h3>Register</h3>
                    <form method="POST" action="/register">
                        <div class="row">
                            <div class="col-12 mb-15">
                                <input id="username" type="text" placeholder="Username" name="username"
                                value="<?=isset($old['username']) ? $this->e($old['username']) : '' ?>">
                                <?php if (isset($errors['username'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['username'])?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                            <div class="col-12 mb-15 <?=isset($errors['password']) ? ' has-error' : '' ?>">
                                <input id="password" type="password" placeholder="Password" name="password">
                                <?php if (isset($errors['password'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['password'])?></strong>
                                    </span>
                                <?php endif ?>  
                            </div>
                            <div class="col-12 mb-15 <?=isset($errors['password_confirmation']) ? ' has-error' : '' ?>">
                                <input id="password_confirmation" type="password" placeholder="Confirm Password" name="password_confirmation">
                                <?php if (isset($errors['password_confirmation'])): ?>
                                    <span class="help-block">
                                        <strong><?=$this->e($errors['password_confirmation'])?></strong>
                                    </span>
                                <?php endif ?>     
                            </div>
                            <div class="col-12 float-end">
                                    <div class="header-top-right">
                                        <p><a href="/login">Have an accout already?</a></p>
                                    </div>
                                </div>
                            <div class="col-12">
                                <input type="submit" value="Register">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-12 mb-40"></div>
        </div>
        </div>
</div>
<?php $this->stop() ?>
