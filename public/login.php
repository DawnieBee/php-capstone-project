<?php
/**
 * Dawn Baker
 * Inter PHP
 *Assignment 2
 */

require __DIR__ . '/../config.php';

$title = "Login"; 
$title2 = "Login here";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // validation 
    
    $v = new Capstone\Validator();

    /*--- Email validation ---*/
    $v->isRequired($_POST['email'], 'email');
    $v->isEmail('email', $_POST['email']);
    /*--- Password validation ---*/
    $v->isRequired($_POST['password'], 'password');

    $errors = $v->errors();
    // saving errros into the $_SESSION array 
    if(!empty($errors)) {
        // add the $errors to the SESSION
        $_SESSION['errors'] = $errors;
        $_SESSION['post'] = $_POST;
        // redirect back to contact page registration form
        header("Location: login.php");
        die;
    }

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


        // test if user credentials are valid 
        if($user === false){
            $_SESSION['errors'] = $errors;
            $_SESSION['post'] = $_POST;
            $flash = array(
                'class' => 'flash_error',
                'message' => 'Sorry, input does not match our credentials.'
            );

            $_SESSION['flash'] = $flash;
        }

        // now that user info matches database info, testing password match to file: 
        if(password_verify($_POST['password'], $user['password'])){
            $_SESSION['user_id'] = $user['user_id'];
            session_regenerate_id();
            $flash = array(
                'class' => 'success',
                'message' => "Welcome back $user[first_name]! You have successfully logged in!"
            );

            $_SESSION['flash'] = $flash;

            header('Location: profile.php');
            die;
        } else {

        // if credentials dont match, send user back to login page with error : 

            $_SESSION['errors'] = $errors;
            $_SESSION['post'] = $_POST;
            $flash = array(
                'class' => 'flash_error',
                'message' => 'Sorry, input does not match our credentials.'
                );

            $_SESSION['flash'] = $flash;

            header('Location: login.php');
            die;
        }
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
                          <input type="text" name="email" id="email" value="<?=old('email', $post)?>" />
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