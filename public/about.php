<?php

require __DIR__ . '/../includes/header.inc.php';

?>
    <style>
    
/*      main content  */
      
      section{
        min-height: 450px;
        width: 100%;
      }
      section h1, h2, h3, p{
        margin: 10px 20px 5px 20px;
        line-height: 1.4em;
      }
      .floated{
        float: right;
        margin: 30px 20px 15px 20px;
      }

    </style>

    
      <section class="clearfix">
        <h2>Winnipeg</h2>
        <p>
          
          <img src="images/walking_bridge_hex.png" alt="Man Walking Across a Footbridge" 
                width="400" height="353"
                class="floated" />
          Winnipeg is a vibrant city in the heart of the country. It is the capital city of Manitoba.
          The name Winnipeg comes from the Cree words for muddy water.  The city is divided by two main
          rivers, The Red and The Assiniboine.  These two rivers meet near downtown at The Forks.
          The Forks is a meeting place that Winnipeggers are proud of and is rich in history. 
        </p>
        
        <h2>Who We Are</h2>
        <p>
          There are always newcomers to the city and the main question they will ask any Winnipeg native 
          is <span style="font-style: italic">“where is a good place to live?”</span> We have collected information on a few Winnipeg neighborhoods,
          which was gathered by crowsourcing current and past residents in those neighborhoods.
        </p>
        
        <h2>What We Do</h2>
        <p>“Honey...We’re Home” is designed to provide information about the different 
          neighborhoods in the City of Winnipeg.  Information available on the following pages includes 
          safety, traffic, bus routes, convenience to grocery stores and schools.  
        </p>
        <p>
          There are many neighborhoods in Winnipeg, diverse in culture and growing and changing every day.
          This Web site will highlight a few of these neighborhoods that we have information on.    
        </p>
      </section>
      
<?php

require __DIR__ . '/../includes/footer.inc.php';

?>