<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 2:43 PM
 * @var \jf\View $this
 * @var string $content
 */
use jf\Core;
use jf\widgets\Nav;

$this->registerAsset(\app\assets\Bootstrap::class);
?>
<!DOCTYPE html>
<html>
<head>
    <?php $this->head();?>
</head>
<body>
    <?php
    $items = [
        '<ul class="nav navbar-nav">
                    <li class=""><a href="/breeds">Breeds</a></li>
                    <li class=""><a href="/contact">Contacts</a></li>
                    <li class=""><a href="/about">About Us</a></li>
                </ul>',
        '<form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>',];
    if(Core::$app->user->isGuest())
        $items[] = '<ul class="nav navbar-nav navbar-right">
                    <li><a href="/user/login">Login</a></li>
                    <li><a href="/user/sign-up">Sign Up</a></li>
                </ul>';
    else
        $items[] = '<ul class="nav navbar-nav navbar-right">
                        <li><a href="">' . Core::$app->user->getLogin() . '</a></li>
                        <li><a href="/user/logout">Logout</a></li>
                    </ul>';
    ?>

    <?= Nav::widget([
        'isBootstrap' => true,
        'brand' => [
            'title' => 'Jomi',
            'href' => Core::$app->router->getDefaultRoute()
        ],
        'items' => $items
    ]); ?>
    <div id="wrapper">
        <?php echo $content; ?>
    </div>
    <?php $this->endBody() ?>
</body>
</html>