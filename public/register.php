<?php

/* 
 * Dawn Baker            
 * Intro PHP             
 * Assignment 2         
 */

$title = "Register With Us";
$title2 = "Register With Us!";

require __DIR__ . '/../includes/header.inc.php';

?> 
    
      <section>
        
        <p>To sign up, please fill in the form below:</p>

        <div id="form_container" class="clearfix">
        
        <form id="form" name="form" method="post" action="handle_form.php" novalidate>  
          <fieldset> 
            <legend><?=$title2?></legend>  
            <?php if(count($errors) > 0) : ?>
                <div class="errors">
                    <ul>
                        <?php foreach($errors as $error) : ?>
                            <li><?=$error?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <p>Required fields &lpar; <strong style="color:#900;">&ast;</strong> &rpar;</p>
            <p><label class="required" for="first_name">First Name:</label>   
              <input type="text" id="first_name" name="first_name" value="<?=old('first_name', $post)?>" /></p>
            <p><label class="required" for="last_name">Last Name:</label>
              <input type="text" id="last_name" name="last_name" value="<?=old('last_name', $post)?>" /></p>
            <p><label class="required" for="email">Email:</label>
              <input type="text" name="email" id="email" value="<?=old('email', $post)?>" /></p>
            <p><label class="required" for="phone_num">Phone Number</label>
              <input type="text" name="phone_num" id="phone_num" value="<?=old('phone_num', $post)?>" /></p>
            <p><label class="required" for="address">Address:</label>
              <input type="text" name="address" id="address" value="<?=old('address', $post)?>" /></p>
            <p><label class="required" for="city">City:</label>
              <input type="text" name="city" id="city" value="<?=old('city', $post)?>" /></p>
            <p><label class="required" for="prov">Province:</label>
              <input type="text" name="prov" id="prov" value="<?=old('prov', $post)?>" /></p>
            <p><label class="required" for="post_code">Postal Code:</label>
              <input type="text" name="post_code" id="post_code" value="<?=old('post_code', $post)?>" /></p>
            <p><label class="required" for="country">Country:</label>
              <input type="text" name="country" id="country" value="<?=old('country', $post)?>" /></p>
            <p><label class="required" for="password">Password:</label>
              <input type="password" name="password" id="password" value="<?=old('password', $post)?>" /></p>
            <p><label class="required" for="confirm_password">Confirm Password:</label>
              <input type="password" name="confirm_password" id="confirm_password" value="<?=old('confirm_password', $post)?>" /></p>
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