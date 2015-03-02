<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 2/22/15
 * Time: 12:30 AM
 * @var \jf\View $this
 *
'name' => 'varchar(100) not null',
'img' => 'varchar(255) not null default ""',
'price' => 'decimal not null default ""',
'size' => 'varchar(10) not null default ""',
'living_place' => 'varchar(10) not null default""',
'description' => 'varchar(5000) not null default""',
 */
use jf\helpers\ActiveForm;
$this->registerAsset(\app\assets\Breed::class);
?>

<?php if(!empty($msg)):?>
    <div class="center-block message bg-danger text-danger">
        <?php echo $msg; ?>
    </div>
<?php endif;?>
<div id="signup-form" class="center-block">

    <?php echo ActiveForm::start('','post','signup','form-horizontal');?>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            <?php  echo ActiveForm::input('text','name',(!empty($name)?$name:''),'form-control','name');?>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <?php echo ActiveForm::input('text','password',(!empty($password)?$password:''),'form-control','password'); ?>
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

            <?php echo ActiveForm::textArea('about',(!empty($about)?$about:''),'form-control', 'about');?>

        </div>
    </div>
    <div class="form-group text-left">
        <label for="interests-ul" class="col-lg-3 control-label">
            Interests</label>
        <div class="btn btn-default col-sm-2" id="interests-add-button" onclick="
            var ul = document.getElementById('interests-ul');
            ul.innerHTML = ul.innerHTML + '<li class=\'list-group-item\'><input type=\'text\' class=\'form-control\' name=\'interest[]\' /></li>';
            ">+</div>
    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <ul class="list-group" id="interests-ul">
                <li class="list-group-item"><input type="text" name="interest[]" class='form-control' /></li>
            </ul>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10">
            <?php echo ActiveForm::button('submit','submit','Submit','btn btn-default');?>
        </div>
    </div>
    <?php echo ActiveForm::end();?>
</div>