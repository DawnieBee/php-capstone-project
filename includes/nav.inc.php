<!-- 
    Dawn Baker
    Intro PHP
    Assignment 2
--> 

<ul>
    <!-- breadcrumbs, active state based on title of the page -->
    <li class="curved_borders"><a <?=($title == "Honey...We're Home") ? 'class="current"' : ''?> href="index.php">Home</a></li>
    <li class="curved_borders"><a <?=($title == "About Us") ? 'class="current"' : ''?> href="about.php">About</a></li>
    <li class="curved_borders"><a <?=($title == "Areas") ? 'class="current"' : ''?> href="areas.php">Areas</a></li>
    <li class="curved_borders"><a <?=($title == "Community Services") ? 'class="current"' : ''?> href="more.php">More</a></li>
    <li class="curved_borders"><a <?=($title == "Register With Us") ? 'class="current"' : ''?> href="register.php">Sign Up</a></li>
    <li class="curved_borders"><a href="register.php">Log In</a></li>
</ul>
