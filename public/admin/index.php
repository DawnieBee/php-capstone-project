<?php
/**
 * Show a dashboard overview of activities for Admin site
 * includes main Overview  then breakdown of neighborhoods and users
 * June 1, 2020
 * by Dawn Baker
 */
namespace Capstone; 

require __DIR__ . '/../../config.php';

require CLASSES . '/NeighborhoodModel.php';
require CLASSES . '/UserModel.php';
require CLASSES . '/BasketModel.php';

// aggregate functions   using MIN, MAX, COUNT 
$model = new NeighborhoodModel();
$usermodel = new UserModel();
$basketmodel = new BasketModel();

// get the values for min house price 
$min = $model->minPrice();
// get the values for min house price 
$max = $model->maxPrice();

// get the toal count for all tables 
// total count neighborhoods
$n = $model->all();
// total count users
$u = $usermodel->all();
// total count baskets 
$b = $basketmodel->all();


$title = 'Dashboard | Admin';

$subtitle = 'Dashboard';


require __DIR__ . '/../../includes/admin_header.inc.php';

require __DIR__ . '/../../includes/admin_nav.inc.php';

?>
<body>

    <?php if(!empty($flash)) : ?>
        <div class="flash <?=esc_attr($flash['class'])?>">
            <span><?=esc($flash['message'])?></span>
        </div>
    <?php endif; ?>  
<!-- main content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?=$subtitle?></h1>

                <p>&nbsp;</p>

                <h2>Summary</h2>

                <table id="dashboard">
                    <tbody>
                        <tr>
                            <th class="one-half">Overview</th>
                            <th class="one-half">Neighborhoods</th>
                        </tr>
                        <tr>
                            <td class="one-half">
                                <p>
                                    <strong>Total Neighborhoods: </strong><?=count($n)?> <br />
                                    <strong>Total Users: </strong> <?=count($u)?><br />
                                    <strong>Total Baskets: </strong> <?=count($b)?> </p>
                            </td>
                            <td class="one-half">
                                <p>
                                    <strong>Minimum House Price: </strong> $<?=implode(" ",$min[0])?><br />
                                    <strong>Maximum House Price: </strong> $<?=implode(" ",$max[0])?><br />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> <!--end col-->
        </div> <!-- end row -->
    </div> <!-- end container -->
</body>

</html>