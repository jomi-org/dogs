<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 2:14 PM
 * @var \framework\View $this
 * @var string $login
 * @var string $password
 * @var string $email
 * @var string $name
 * @var string $city
 * @var string $about
 */

use framework\helpers\ActiveForm;
$this->registerAsset(\app\assets\SignUp::class);
?>
<div id="signup-form" class="center-block">
    <?php echo ActiveForm::start('','post','signup','form-horizontal');?>
        <div class="form-group">
            <label for="login" class="col-sm-2 control-label">Login</label>
            <div class="col-sm-10">
                <?php echo ActiveForm::input('text','login',$login,'form-control','login');?>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <?php echo ActiveForm::input('password','password',$password,'form-control','password'); ?>
            </div>
        </div>
        <div class="form-group ">
            <label for="email" class="col-sm-2 control-label">E-mail</label>
            <div class="col-sm-10">
                <?php echo ActiveForm::input('text','email',$email,'form-control','email');?>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <?php echo ActiveForm::input('text','name',$name,'form-control','name');?>
            </div>
        </div>
        <div class="form-group">
            <label for="city" class="col-sm-2 control-label">City</label>
            <div class="col-sm-10">
                <?php echo ActiveForm::input('text','city',$city,'form-control','city');?>
            </div>
        </div>
        <div class="form-group">
            <label for="about" class="col-sm-2 control-label">About</label>
            <div class="col-sm-10">
                <?php echo ActiveForm::textArea('about',$about,'form-control', 'about');?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <?php echo ActiveForm::button('submit','submit','Submit','btn btn-default');?>
            </div>
        </div>
    <?php echo ActiveForm::end();?>
</div>