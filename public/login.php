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

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //after validation 
    if(empty($errors)){
        //query database for saved user info: 
        $query = 'SELECT *
                FROM 
                users
                WHERE
                email = :email';
        $stmt = $dbh->prepare($query);
        $params = array(
            ':email' => $_POST['email']
        );
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // test if user credentials are valid 
        if($result === false){
            $errors['credentials'] = 'Sorry, input does not match our records.';
            $_SESSION['errors'] = $errors;
            $_SESSION['post'] = $post;
            header('Location: login.php');
            die;
        }
        // dd($result);
        // die;
        // testing password match to file: 
        if(is_password($_POST['password']))

  }
}

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