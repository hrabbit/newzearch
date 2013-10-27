<!DOCTYPE html>
<html>
<head>
    <title><?=!empty($newzearch['title']['value']) ? $newzearch['title']['value'] : ''?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?=\Asset::render('css_top')?>
    <?=\Asset::render('js_top')?>
</head>
<body>
    <div class="container-fluid">

        <div class="navbar-inverse navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="#"><?=!empty($newzearch['title']['value']) ? $newzearch['title']['value'] : ''?></a>
                    <?php if(isset($session['id'])): ?>
                    <form class="navbar-search pull-left">
                        <input type="text" class="search-query" placeholder="Search">
                    </form>
                    <ul class="nav pull-right">
                        <li><?=\Html::anchor('news', 'News')?></li>
                        <li><?=\Html::anchor('/', 'Recent')?></li>
                        <li><?=\Html::anchor('account/rss', 'RSS')?></li>
                        <li><?=\Html::anchor('account/settings', 'Settings')?></li>
                        <li><?=\Html::anchor('account/logout', 'Logout')?></li>
                    </ul>
                    <?php else: ?>
                    <ul class="nav pull-right">
                        <?=\Form::open(array('action' => 'account/login', 'method' => 'post', 'class' => 'navbar-form pull-left'))?>
                            <input type="text" name="email" placeholder="Email address" class="span2">
                            <input type="password" name="password" placeholder="Password" class="span2">
                            <button type="submit" class="btn-success btn">Login</button>
                        </form>
                    </ul>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <div style="margin-top: 50px" class="container">
            <?=!empty($content) ? $content : ''?>
        </div>

    </div>

    <?=\Asset::render('js_bottom')?>
</body>
</html>