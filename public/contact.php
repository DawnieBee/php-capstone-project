<?php

/* 
 * Dawn Baker            
 * Intro PHP             
 * Assignment 2         
 */

$title = "Contact Us";
$title2 = "Register With Us!";

require __DIR__ . '/../includes/header.inc.php';

?> 
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
        <form id="form" name="form" method="post" action="handle_form.php" novalidate>  
          <fieldset> 
            <legend><?=$title2?></legend>  
            <p><label for="first_name">First Name:</label>   
              <input type="text" id="first_name" name="first_name" required value="" /></p>
            <p><label for="last_name">Last Name:</label>
              <input type="text" id="last_name" name="last_name" required value="" /></p>
            <p><label for="email">Email:</label>
              <input type="text" name="email" id="email" required value="" /></p>
            <p><label for="phone_num">Phone Number</label>
              <input type="text" name="phone_num" id="phone_num" required value="" /></p>
            <p><label for="address">Address:</label>
              <input type="text" name="address" id="address" required value="" /></p>
            <p><label for="city">City:</label>
              <input type="text" name="city" id="city" required value="" /></p>
            <p><label for="prov">Province:</label>
              <input type="text" name="prov" id="prov" required value="" /></p>
            <p><label for="post_code">Postal Code:</label>
              <input type="text" name="post_code" id="post_code" required value="" /></p>
            <p><label for="country">Country:</label>
              <input type="text" name="country" id="country" required value="" /></p>
            <p><label for="password">Password:</label>
              <input type="text" name="password" id="password" required value="" /></p>
            <p><label for="password">Confirm Password:</label>
              <input type="text" name="password" id="password" required value="" /></p>
            <p>Would you like more information on one of these areas? Please choose from
              the list below:<br/><br/>
              <label>Area
                <input list="area" name="area" />
              </label>
              <datalist id="area">
                <option value="Old Kildonan">Old Kildonan</option>
                <option value="Point Douglas">Point Douglas</option>
                <option value="Mynarski">Mynarski</option>
                <option value="Downtown">Downtown</option>
                <option value="North Kildonan">North Kildonan</option>
                <option value="East Kildonan">East Kildonan</option>
                <option value="Elmwood">Elmwood</option>
                <option value="Transcona">Transcona</option>
                <option value="St Boniface">St Boniface</option>
                <option value="Ft Rouge">Ft Rouge</option>
                <option value="Ft Garry">Ft Garry</option>
                <option value="River Heights">River Heights</option>
                <option value="St Vital">St Vital</option>
                <option value="St Norbert">St Norbert</option>
                <option value="Whyteridge">Whyteridge</option>
                <option value="Tuxedo">Tuxedo</option>
                <option value="Charleswood">Charleswood</option>
                <option value="St Charles">St Charles</option>
                <option value="St James">St James</option>
                <option value="Brooklands/Weston">Brooklands/Weston</option>
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