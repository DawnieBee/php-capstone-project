<!--
 * Dawn Baker
 * Inter PHP
 *Assignment 1
 -->

        <ul>
            <!-- breadcrumbs, active state based on title of the page -->
            <li class="curved_borders"><a <?=($title == "Honey...We're Home") ? 'class="current"' : ''?> href="index.php">Home</a></li>
            <li class="curved_borders"><a <?=($title == "About Us") ? 'class="current"' : ''?> href="about.php">About</a></li>
            <li class="curved_borders"><a <?=($title == "Areas") ? 'class="current"' : ''?> href="areas.php">Areas</a></li>
            <li class="curved_borders"><a <?=($title == "Community Services") ? 'class="current"' : ''?> href="more.php">More</a></li>
            
            <?php if(!isset($_SESSION['user'])) : ?>      
            <!--  if not logged in show these  -->
                <li class="curved_borders"><a <?=($title == "Profile") ? 'class="current"' : ''?> href="profile.php">Profile</a></li>
                <li class="curved_borders"><a <?=($title == "Profile") ?> href="login.php?logout">Logout</a></li>
            <?php endif; ?>
            <?php if(isset($_SESSION['user'])) : ?>
            <!-- if logged in show these -->
                <li class="curved_borders"><a <?=($title == "Register With Us") ? 'class="current"' : ''?> href="register.php">Sign Up</a></li>
                <li class="curved_borders"><a <?=($title == "Login") ? 'class="current"' : ''?> href="login.php">Login</a></li>
            <?php endif; ?>
            
        </ul>
