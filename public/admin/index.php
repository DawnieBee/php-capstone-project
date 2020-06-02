<?php
/**
 * Show a dashboard overview of activities for Admin site
 * June 1, 2020
 * by Dawn Baker
 */
require __DIR__ . '/../../config.php';

$title = 'Dashboard | Admin';

$subtitle = 'Dashboard';


require __DIR__ . '/../../includes/admin_header.inc.php';

require __DIR__ . '/../../includes/admin_nav.inc.php';

?>
<body>

    <?php if(!empty($flash)) : ?>
        <div class="flash <?=esc_attr($flash['class'])?>">
            <span><?=esc($flash['message'])?></span>
        </div>
    <?php endif; ?>  
<!-- main content -->
    <div class="container">
        <h1><?=$subtitle?></h1>
        

        <h2><span>This page is under construction</span></h2>
        </div>

    </body>

</html>