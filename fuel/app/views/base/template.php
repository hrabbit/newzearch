<!DOCTYPE html>
<html>
<head>
    <title><?=$newzearch['title']['value']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?=\Asset::render('css_top')?>
    <?=\Asset::render('js_top')?>
</head>
<body>
    <div class="container-fluid">

        <div class="navbar-inverse navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="#"><?=$newzearch['title']['value']?></a>
                    <?php if(isset($session['id'])): ?>
                    <form class="navbar-search pull-left">
                        <input type="text" class="search-query" placeholder="Search">
                    </form>
                    <ul class="nav pull-right">
                        <li><a href="/account/rss">RSS</a></li>
                        <li><a href="/account/settings">Settings</a></li>
                        <li><a href="/account/logout">Logout</a></li>
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

        <div style="margin-top: 40px" class="container">
            <?=!empty($content) ? $content : ''?>
        </div>

    </div>

    <?=\Asset::render('js_bottom')?>
</body>
</html>