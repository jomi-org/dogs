<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 2/5/15
 * Time: 1:12 AM
 *
 * @var \jf\View $this
 * @var string $login
 * @var string $password
 * @var string $email
 * @var string $name
 * @var string $city
 * @var string $about
 */

use jf\helpers\ActiveForm;
//$this->registerAsset(\app\assets\SignUp::class);
?>

<?php if(!empty($msg)):?>
    <div class="col-sm-6 pull-right">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Error</h3>
            </div>
            <div class="panel-body">
                <?php echo $msg; ?>
            </div>
        </div>
    </div>
<?php endif;?>
<div id="signup-form" class="col-sm-6 center-block">

    <?php echo ActiveForm::start('','post','login','form-horizontal');?>
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
    <div class="form-group">
        <div class="col-sm-10">
            <?php echo ActiveForm::button('submit','submit','Sign in','btn btn-default');?>
        </div>
    </div>
    <?php echo ActiveForm::end();?>
</div>