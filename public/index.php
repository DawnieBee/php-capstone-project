<?php

/* 
 * Dawn Baker            
 * Intro PHP             
 * Assignment 1          
 */

$title = "Honey...We're Home";

if($title == "Honey...We're Home") {
    
}

require __DIR__ . '/../includes/header.inc.php';

?>
    
  <section class="clearfix">
    <div id="hero_container">
      <div class="hero">
        <img src="images/forks_wpg_hero.jpg" alt="CMHR and Winnipeg Sign at The Forks"
             width="960"
             height="603" /> 
  </div>
      <div class="hero_text1 curved_borders">
        <h2>Honey...We're Home</h2>
        <p>
          A Web site for people who are looking to move to Winnipeg and want to 
          know the neighbourhoods to decide where they want to live.
        </p>
      </div>
      <div class="hero_text2 curved_borders">
        <h3>Neighbourhood Rating System</h3> 
        <p>
          Info collected by crowdsourcing for reviews of what people think
          about their own neighborhoods, rating them based on safety, traffic, 
          public services, bus routes, etc.
        </p>
      </div>
    </div>
  </section>
      
<?php

require __DIR__ . '/../includes/footer.inc.php';

?>