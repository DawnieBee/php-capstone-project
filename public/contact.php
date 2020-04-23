<?php

/* 
 * Dawn Baker            
 * Intro PHP             
 * Assignment 1          
 */

$title = "Contact Us";

require __DIR__ . '/../includes/header.inc.php';

?> 
<!-- style content for contact page     -->
    <style>
      
      /*  main content  */
      
      h2, h3, address, p{
        padding: 20px;
        margin: 0 auto; 
      }
      #form_container{
        position: relative;
        padding: 20px;
      }
      form legend{
        background-color: #333;
        color: #ff0;
        width: 88px;
        text-align: left;
        padding: 6px;
        border: 1px solid #333;
        border-radius: 15px;
        box-shadow: 0 1px 1px rgba(0,0,0,.6);
      }
      form label{
        clear: both;
        width: 130px;
        display: block;
        float: left;
      }
      form fieldset{
        width: 500px;
        border: 1px solid #333;
        margin-bottom: 20px;
        font-size: 0.9em;
        border-radius: 15px;
      }
      form input[type="text"],
      form input[type="email"],
      form input[type="tel"]{
        border: 1px solid #000;
        width: 200px;
        background-color: #fff;
        font-size: 1.1em;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
        box-shadow: inset 1px 1px 2px rgba(0,0,0,.5);
      }
      datalist{
        float: left;
        display: none;
      }
      form input:hover{
        background-color: #ffb;
        box-shadow: 0 0 6px #ccc;
      }
      
    </style> 

    
      <section>
        
        <h2>Honey...We're Home</h2>
        <address>
          123 Any Street <br />
          Winnipeg, MB <br />
          R2A1A1 <br />
          204-555-5555
        </address>
        
        <p>Owner and Website Creator: Dawn Baker<br />
            Sources: Community Members, City of Winnipeg information page, Internet sources
        </p>
        
        <p>If you would like to know more, fill in the form below:</p>
        <div id="form_container" class="clearfix">
          <form id="form"
              name="form"
              method="post"
              action="http://www.scott-media.com/test/form_display.php"
              autocomplete="on"
              >  
          <fieldset> 
            <legend>Personal Info</legend>  
            <p>
              <label for="first_name">First Name:</label>   
              <input type="text" 
                     id="first_name"
                     name="first_name"
                     required placeholder="Type name here"
                     />
            </p>
            <p>
              <label for="last_name">Last Name:</label>
              <input type="text"
                     id="last_name"
                     name="last_name"
                     />
            </p>
            <p>
              <label for="email_address">Email: </label>
              <input type="email"
                     name="email_address"
                     id="email_address"
                     required placeholder="enter your email"
                     />
            </p>
            <p>
              <label for="phone">Phone Number</label>
              <input type="tel" name="phone" id="phone" />
            </p>
            <p>Would you like more information on one of these areas? Please choose from
              the list below:<br/><br/>
              <label>Area
                <input list="area" name="area" />
              </label>
              <datalist id="area">
                <option value="St James">St James</option>
                <option value="Elmwood">Elmwood</option>
                <option value="Downtown">Downtown</option>
                <option value="Transcona">Transcona</option>
                <option value="St Boniface">St Boniface</option>
              </datalist>
            </p> 
          </fieldset>
          <p>
            <input type="submit" value="Submit Form" />&nbsp;
            <input type="reset" value="Clear Form" accesskey="c" title="Use accesskey c" />&nbsp;
          </p>
          </form>
          <p><a href="#">Back to Top</a></p>
        </div>  
      </section>
      
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>