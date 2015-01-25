<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 2:43 PM
 * @var \framework\View $this
 * @var string $content
 */
$this->registerAsset(\app\assets\Bootstrap::class);
?>
<!DOCTYPE html>
<html>
<head>
    <?php $this->head();?>
</head>
<body>
    <div id="wrapper">
        <?php echo $content; ?>
    </div>
    <?php $this->endBody() ?>
</body>
</html>