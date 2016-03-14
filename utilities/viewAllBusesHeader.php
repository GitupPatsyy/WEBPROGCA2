
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

                <div class="row bus-table col-lg-push-2 col-lg-8 col-lg-pull-2">
                    <h4 class="center-content">View All Buses</h4>
                    <a href="addbusform.php"> <img src="icons/add.png" width="40" height="40"  style="margin: 3px;" ></a>
                </div>
                <thead>
                    <tr>
                        <th>Reg Number</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Engine Size</th>
                        <th>Date Bought</th>
                        <th>Actions</th>

                    </tr>
                    <?php
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                    while ($row) {

                        echo '<tr class="info">';
                        echo '<td>' . $row['regNum'] . '</td>';
                        echo '<td>' . $row['busMake'] . '</td>';
                        echo '<td>' . $row['busModel'] . '</td>';
                        echo '<td>' . $row['engineSize'] . '</td>';
                        echo '<td>' . $row['dateBought'] . '</td>';
                        echo '<td>'
                        . '<a href="viewBus.php?id=' . $row['busID'] . '"><img src="icons/view.png"  height="40px" width="40px"  style="margin: 3px;"  /></a>'
                        . '<a href="editbusform.php?id=' . $row['busID'] . '"><img src="icons/edit.png" height="40px" width="40px"   style="margin: 3px;" /></a>'
                        . '<a class="deletebtn" href="deletebus.php?id=' . $row['busID'] . '"><img class="" src="icons/delete.png"  height="40px" width="40px" style="margin: 3px;" /></a>';
                        echo '</tr>';

                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
            
            </table>


        </div>
</div><!-- Closing jumbotron-->
</div>

