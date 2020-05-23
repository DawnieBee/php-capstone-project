<?php

require __DIR__ . '/../../config.php';

$title = 'Dashboard | Admin';

$navbarbrand = 'Dashboard';


require __DIR__ . '/../../includes/admin_header.inc.php';

require __DIR__ . '/../../includes/admin_nav.inc.php';

?>
<body>


<!-- main content -->
<?php if(!empty($flash)) : ?>
        <div class="flash <?=esc_attr($flash['class'])?>">
            <span><?=esc($flash['message'])?></span>
        </div>
    <?php endif; ?>  
    <h1><?=$title?></h1>
    <div class="search">
        <form action="/" method="get" autocomplete="off" novalidate>
            <input type="text" id="s" name="s" maxlength="255" />&nbsp;
            <input type="submit" value="search" />
            <div>
                <ul id="live_search"></ul>
            </div>
        </form>
    </div> <!-- end search -->

<h2><span>This page is under construction</span></h2>