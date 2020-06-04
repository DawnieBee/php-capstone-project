<?php
/**
 * Registration form for new users
 * Dawn Baker 
 * June 3 2020 
 * Capstone project
 */
require __DIR__ . '/../config.php';

$title = "Register With Us";
$title2 = "Register With Us!";

require __DIR__ . '/../includes/header.inc.php';


?> 
    
<section>
  
    <p>To sign up, please fill in the form below:</p>
  
    <div id="form_container" class="clearfix">
  
        <form id="form" name="form" method="post" action="handle_form.php" novalidate>
            <input type="hidden" name="csrf" value="<?=csrfToken()?>" />  
            <fieldset> 
                <legend><?=$title2?></legend>  
                    <p>Required fields &lpar; <strong style="color:#900;">&ast;</strong> &rpar;</p>

                    <p><label class="required" for="first_name">First Name:</label>   
                        <input type="text" id="first_name" name="first_name" value="<?=old('first_name', $post)?>" maxlength="255" /><br /><?=error('first_name', $errors)?></p>
                    <p><label class="required" for="last_name">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" value="<?=old('last_name', $post)?>" maxlength="255" /><br /><?=error('last_name', $errors)?></p>
                    <p><label class="required" for="email">Email:</label>
                        <input type="text" name="email" id="email" value="<?=old('email', $post)?>" maxlength="255" />
                    <br /><?=error('email', $errors)?></p>
                    <p><label class="required" for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" value="<?=old('phone_number', $post)?>" maxlength="255" />
                    <br /><?=error('phone_number', $errors)?></p>
                    <p><label class="required" for="address">Address:</label>
                        <input type="text" name="address" id="address" value="<?=old('address', $post)?>" maxlength="255" />
                    <br /><?=error('address', $errors)?></p>
                    <p><label class="required" for="city">City:</label>
                        <input type="text" name="city" id="city" value="<?=old('city', $post)?>" maxlength="255" />
                    <br /><?=error('city', $errors)?></p>
                    <p><label class="required" for="province">Province:</label>
                        <input type="text" name="province" id="province" value="<?=old('province', $post)?>" maxlength="255" />
                    <br /><?=error('province', $errors)?></p>
                    <p><label class="required" for="postal_code">Postal Code:</label>
                        <input type="text" name="postal_code" id="postal_code" value="<?=old('postal_code', $post)?>" maxlength="6" />
                    <br /><?=error('postal_code', $errors)?></p>
                    <p><label class="required" for="country">Country:</label>
                        <input type="text" name="country" id="country" value="<?=old('country', $post)?>" maxlength="255" />
                    <br /><?=error('country', $errors)?></p>
                    <p><label class="required" for="password">Password:</label>
                        <input type="password" name="password" id="password" value="<?=old('password', $post)?>" maxlength="255" />
                    <br /><?=error('password', $errors)?></p>
                    <p><label class="required" for="confirm_password">Confirm Password:</label>
                        <input type="password" name="confirm_password" id="confirm_password" value="<?=old('confirm_password', $post)?>" /><br /><?=error('confirm_password', $errors)?></p>
                <p>Would you like more information on one of these areas? Please choose from the list below:<br/><br/>
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
            </fieldset><!-- end fieldset -->
            <p>
              <input type="submit" value="Submit Form" />&nbsp;
              <input type="reset" value="Clear Form" accesskey="c" title="Use accesskey c" />&nbsp;
            </p>
        </form>
        <form action="#top">
            <button class="to_top" type="submit">Back to Top</button>
        </form>
    </div>  <!-- end form container -->
</section>
      
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>