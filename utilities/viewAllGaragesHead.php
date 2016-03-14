
<?php require_once 'utilities/styles.php'; ?>
<div class="row header_style">
    <div class="jumbotron">
        <nav class="nav-bar navbar-default">
            <div class="navbar-header">Tour Bus Massacre</div>
            <?php require 'utilities/toolbar.php'; ?>
        </nav>
        <div class="row col-lg-12">
            <hr class="nav-hr"/>
<table class="table table-bordered table-hover">

                <div class="row garage-table col-lg-push-2 col-lg-8 col-lg-pull-2">
                    <h4 class="center-content">View All Garages</h4>
                    <a href="addgarageform.php"> <img src="icons/add.png" width="40" height="40"  style="margin: 3px;" ></a>
                </div>
                <thead>
                    <tr>
                        <th>Address</th>
                        <th>Phone No.</th>
                        <th>Manager Name</th>
                        <th>Garage Name</th>
                        <th>Garage ID</th>
                        <th>Actions</th>

                    </tr>
                    <?php
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                    while ($row) {

                        echo '<tr class="info">';
                        echo '<td>' . $row['garageAddress'] . '</td>';
                        echo '<td>' . $row['phoneNo'] . '</td>';
                        echo '<td>' . $row['managerName'] . '</td>';
                        echo '<td>' . $row['nameofGarage'] . '</td>';
                        echo '<td>' . $row['garageID'] . '</td>';
                        echo '<td>'
                        . '<a href="viewGarage.php?id=' . $row['garageID'] . '"><img src="icons/view.png"  height="40px" width="40px"  style="margin: 3px;"  /></a>'
                        . '<a href="editgarageform.php?id=' . $row['garageID'] . '"><img src="icons/edit.png" height="40px" width="40px"   style="margin: 3px;" /></a>'
                        . '<a class="deletebtn" href="deletegarage.php?id=' . $row['garageID'] . '"><img class="" src="icons/delete.png"  height="40px" width="40px" style="margin: 3px;" /></a>';
                        echo '</tr>';

                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>

            </table>
    </div>
</div><!-- Closing jumbotron-->
</div>

