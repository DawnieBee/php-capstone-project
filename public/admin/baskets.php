<?php

require __DIR__ . '/../../config.php';

$title = 'Baskets | Admin';

$subtitle = 'Baskets';

require __DIR__ . '/../../includes/admin_header.inc.php';

require __DIR__ . '/../../includes/admin_nav.inc.php';

?>

<body>

<!-- main content -->
    <div class="container">
        <?php if(!empty($flash)) : ?>
            <div class="flash <?=esc_attr($flash['class'])?>">
                <span><?=esc($flash['message'])?></span>
            </div>
        <?php endif; ?>  
        <h1><?=$subtitle?></h1>
        

        <h2><span>This page is under construction</span></h2>
    </div>

</body>
</html>

