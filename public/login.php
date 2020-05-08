<?php
/**
 * Dawn Baker
 * Inter PHP
 *Assignment 2
 */
/*
* User log in form
 */

$title = "Login"; 
$title2 = "Login here";

require __DIR__ . '/../includes/header.inc.php';


?>
    <section>

                
        <div id="form_container" class="clearfix">
            <form id="form" name="form" method="post" action="login.php" novalidate>
                    
                <fieldset>
                    <legend><?=$title2?></legend>
                    <p>Required fields &lpar; <strong style="color:#900;">&ast;</strong> &rpar;</p>
                    <p><label class="required" for="email">Email:</label>
                          <input type="text" name="email" id="email" value="<?=old('email', $post)?>" maxlength="255" />
                    <p><label class="required" for="password">Password:</label>
                          <input type="password" name="password" id="password" value="<?=old('password', $post)?>" maxlength="255" />
                </fieldset><!-- end fieldset -->
                
                <p><input type="submit" value="Login" /></p>

            </form>
            
        </div><!-- end login form -->
    
    </section>
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>