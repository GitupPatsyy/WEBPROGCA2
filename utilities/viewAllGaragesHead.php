
<?php require_once 'utilities/styles.php'; ?>
<div class="row header_style">
    <div class="jumbotron">
        <nav class="nav-bar navbar-default">
            <div class="navbar-header">Tour Bus Massacre</div>
            <?php require 'utilities/toolbar.php'; ?>
        </nav>
        <div class="row col-lg-12">
            <div class="row col-lg-3 nav-subtext">
                <p><strong>Killing</strong> tours since <i>1993&reg</i></p>
                <div class="jumbo-content"></div>
            </div>
            <hr class="nav-hr"/>
        </div>
    </div><!-- Closing jumbotron-->
</div>
            <div class="row col-lg-10 col-lg-offset-1"">
                <table class="table rpb-table">
                        <h4 class="center-content">View All Garages</h4>
                        <a href="addgarageform.php"> <img src="icons/add.png" width="40" height="40"  style="margin: 3px;" ></a>
                    <thead>
                        <tr>
                            <th>Address</th>
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
                            echo '<td>' . $row['managerName'] . '</td>';
                            echo '<td>' . $row['nameofGarage'] . '</td>';
                            echo '<td>' . $row['garageID'] . '</td>';
                            echo '<td>'
                            . '<a href="viewGarage.php?id=' . $row['garageID'] . '"><img src="icons/view.png"  height="30px" width="30px"  style="margin: 3px;"  /></a>'
                            . '<a href="editgarageform.php?id=' . $row['garageID'] . '"><img src="icons/edit.png" height="30px" width="30px"   style="margin: 3px;" /></a>'
                            . '<a class="deletebtn" href="deletegarage.php?id=' . $row['garageID'] . '"><img class="" src="icons/delete.png"  height="30px" width="30px" style="margin: 3px;" /></a>';
                            echo '</tr>';

                            $row = $statement->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>

                </table>
            </div>


