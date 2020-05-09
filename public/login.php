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
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // dd($user);
        // die;
        // test if user credentials are valid 
        if($user === false){
            $errors['credentials'] = 'Sorry, input does not match our records.';
            $_SESSION['errors'] = $errors;
            $_SESSION['post'] = $post;
            header('Location: login.php');
            die;
        }

        // now that user info matches database info, testing password match to file: 
        if(password_verify($_POST['password'], $user['password'])){
            $_SESSION['user_id'] = $user['user_id'];
            session_regenerate_id();
            header('Location: profile.php');
            die;
        } 
       
        // if credentials dont match, send user back to login page with error : 

            $errors['credentials'] = "Information entered does not match our records.";
            $_SESSION['errors'] = $errors;
            $_SESSION['post'] = $_POST;
            header('Location: login.php');
            die;
    }
}
require __DIR__ . '/../includes/header.inc.php';
?>

    <section>
                
        <div id="form_container" class="clearfix">
            <form id="form" name="form" method="post" action="login.php" novalidate>
                    
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
                    <p><label class="required" for="email">Email:</label>
                          <input type="text" name="email" id="email" value="" />
                    <p><label class="required" for="password">Password:</label>
                          <input type="password" name="password" id="password" value=""  />
                </fieldset><!-- end fieldset -->
                
                <p><input type="submit" value="Login" /></p>

            </form>
            
        </div><!-- end login form -->
    
    </section>
<?php

require __DIR__ . '/../includes/footer.inc.php'

?>