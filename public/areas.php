<?php
/**
 * Dawn Baker
 * Inter PHP
 *Assignment 2
 */
require __DIR__ . '/../config.php';

$title = "Areas";

$neighborhood = new Capstone\NeighborhoodModel();

$result = $neighborhood->all();

// search functionality
if(!empty($_GET['s'])) {   
    $result = $neighborhood->searchNeighborhood($_GET['s']);
} else {
    // retrieve all neighborhoods if no search
    $result = $neighborhood->all();
}
require __DIR__ . '/../includes/header.inc.php';
?>
<section>
  
  <div id="container" class="clearfix">

        <div class="search">
            <form action="areas.php" method="get" autocomplete="off" novalidate>
                <input type="text" id="s" name="s" maxlength="255" placeholder="Search Areas" />&nbsp;
                <input type="submit" value="search" />
                <div>
                    <ul id="live_search"></ul>
                </div>
            </form>
        </div> <!-- end search -->
        <div class="clear"></div>

    
    <?php foreach($result as $row) : ?>
      <h2><?=esc($row['name'])?></h2>
      <p class="item_head"><strong>Location: </strong><?=esc(ucwords($row['location']))?></p>
      <div class="stjames box">
        <img src="images/<?=esc_attr($row['img'])?>" alt="<?=esc_attr($row['name'])?>"
        width="320" height="207" />
        <div class="show_me curved_borders boxshadow">
          <?=esc($row['description'])?> 
        </div>
        
      </div>

      <p class="areas_more"><a href="area_detail.php?hood_id=<?=$row['hood_id']?>">See More</a></p>
      
      
     

    <?php endforeach; ?>
  </div>
  <form action="#top">
    <button class="to_top" type="submit">Back to Top</button>
  </form>
</section>
<?php

require __DIR__ . '/../includes/footer.inc.php';

?>