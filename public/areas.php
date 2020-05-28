<?php
/**
 * Dawn Baker
 * Inter PHP
 *Assignment 2
 */
require __DIR__ . '/../config.php';

$title = "Areas";

require __DIR__ . '/../includes/header.inc.php';

$neighborhood1 = new Capstone\NeighborhoodModel("St James");

$result = $neighborhood1->all();

?>
      <section>
       
        <div id="container" class="clearfix">
          

          
          <?php foreach($result as $row) : ?>
            <h2><?=esc($row['name'])?></h2>
              <div id="stjames" class="box">
                <img src="images/<?=esc_attr($row['img'])?>" alt="<?=esc_attr($row['name'])?>"
                     width="320" height="207" />
                <div class="show_me curved_borders boxshadow">
                  <?=esc($row['description'])?> 
                </div>
                <button class="areas_showmore"><a href="area_detail.php?hood_id=<?=$row['hood_id']?>">More</a></button>
              </div>

          <?php endforeach; ?>
        </div>
        <p><a href="#">Back to Top</a></p>
      </section>
<?php

require __DIR__ . '/../includes/footer.inc.php';

?>