<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="/admin">Neighborhood Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" <?=($title == 'Dashboard | Admin')?> href="/admin/index.php">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" <?=($title == 'Neighborhoods | Admin')?> href="/admin/neighborhoods.php">Neighborhoods</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" <?=($title == 'Users | Admin')?> href="/admin/users.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" <?=($title == 'Baskets | Admin')?> href="/admin/baskets.php">Baskets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" <?=($title == 'Orders | Admin')?> href="/admin/orders.php">Orders</a>
                </li>

                <li>
                    <a class="nav-link red" href="/logout.php?logout=1">Logout</a>
                </li>


            </ul>
        </div>
    </div>
</nav><!-- end nav -->