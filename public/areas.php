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
                <button class="areas_showmore">More</button>
              </div>

          <?php endforeach; ?>
         <!--  <h2>Elmwood</h2>
          <div id="elmwood" class="box curved_borders">
            <img src="images/elmwoodhex.png" alt="Welcome to Elmwood Sign" 
                 width="312" height="207" />
            <div class="show_me curved_borders boxshadow">
              Found in the northeast end of the city, over the Disraeli Bridge.  Elmwood
              runs along Henderson Hwy and the Red River. You will find plenty of churches
              and community centers in this neighborhood.              
            </div>
          </div>
          <h2>Downtown</h2>
          <div id="downtown" class="box curved_borders">
            <img src="images/downtownhex.png" alt="Downtown Skyline" 
                 width="320" height="207" />
            <div class="show_me curved_borders boxshadow">
              Nestled in the heart of Winnipeg, walking distance to The Forks Historical Site
              and St Boniface.  Walk through the Exchange District and marvel at the architecture
              from days gone by.  Downtown is a vibrant community with plenty of food, drink, and 
              entertainment.
            </div>
          </div>
          <h2>St Boniface</h2>
          <div id="stboniface" class="box curved_borders">
            <img src="images/stbonifacehex.png" alt="The St Boniface Basillica"
                 width="320" height="207" />
            <div class="show_me curved_borders boxshadow">
              Viva la Francais!  St Boniface is home to Winnipeg's francophone community, the St 
              Boniface Hospital, Louis Riel's home, and the French University. The beautiful basilica 
              on Tache is a prime spot for wedding photos.  Come find your &#39;joie de vivre&#39; 
              in historic St Boniface!
            </div>
          </div> 
          <h2>Transcona</h2>
          <div id="transcona" class="box curved_borders">
            <img src="images/transconahex.png" alt="Transcona Sam Statue"
                 width="320" height="207" />
            <div class="show_me curved_borders boxshadow">
              Transcona is located in the east end of Winnipeg, on Regent Ave.  It is considered a 
              great place to raise a family.  Every summer, Transcona hosts the Hi Neighbour Festival, 
              where residents gather at a family carnival set right on the main street!  Better love 
              flamingos if you want to live here!
            </div> 
          </div> -->
        </div>
        <p><a href="#">Back to Top</a></p>
      </section>
<?php

require __DIR__ . '/../includes/footer.inc.php';

?>