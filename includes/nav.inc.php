<ul>
    <!-- breadcrumbs, active state based on title of the page -->
    <li class="curved_borders"><a <?=($title == "Honey...We're Home") ? 'class="current"' : ''?> href="index.php">Home</a></li>
    <li class="curved_borders"><a <?=($title == "About Us") ? 'class="current"' : ''?> href="about.php">About</a></li>
    <li class="curved_borders"><a <?=($title == "Areas") ? 'class="current"' : ''?> href="areas.php">Areas</a></li>
    <li class="curved_borders"><a <?=($title == "Community Services") ? 'class="current"' : ''?> href="more.php">More</a></li>
    <li class="curved_borders"><a <?=($title == "Contact Us") ? 'class="current"' : ''?> href="contact.php">Contact</a></li>
    <li class="curved_borders"><a href="contact.php">Sign Up!</a></li>
</ul>