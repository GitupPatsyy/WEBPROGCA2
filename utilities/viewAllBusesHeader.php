<!--separate headings for displaying different tables-->
<?php require_once 'utilities/styles.php'; ?> <!-- require the styles-->
<div class="row header_style">
    <!--row for the jumbotron-->
    <div class="jumbotron">
        <nav class="nav-bar navbar-default">
            <!--opening nav-->
            <div class="navbar-header">Tour Bus Massacre</div>
            <!--nav header-->
            <?php require 'utilities/toolbar.php'; ?><!--require the navbar-->
        </nav>
        <div class="row col-lg-12">
            <!--row width of 12 cols-->
            <div class="row col-lg-3 nav-subtext">
                <!--constrain the subheading-->
                <p><strong>Killing</strong> tours since <i>1993&reg</i></p>
                <div class="jumbo-content"></div>
                <!--was going to be used for content on top of the jumbotron-->
            </div>
            <hr class="nav-hr"/>
        </div>
    </div><!-- Closing jumbotron-->
</div>

<div class="row col-lg-10 col-lg-offset-1">
    <!--offset it somewhat to the middel-->
    <table class="table rpb-table">
        <!--table class of rpb for styling-->

        <h4 class="center-content">View All Buses</h4>
        <a href="addbusform.php"> <img src="icons/add.png" width="40" height="40"  style="margin: 3px;" ></a>
        <!--table heading-->      
        <thead>
            <!--in the table row-->
            <tr>
                <th>Reg Number</th>
                <th>Make</th>
                <th>Model</th>
                <th>Engine Size</th>
                <th>Date Bought</th>
                <th>Actions</th>

            </tr>
            <?php
            $row = $statement->fetch(PDO::FETCH_ASSOC); //Fetch the ASSOC array and store it in row
            while ($row) { //while there is content in row output it
                echo '<tr class="info">';
                echo '<td>' . $row['regNum'] . '</td>';
                echo '<td>' . $row['busMake'] . '</td>';
                echo '<td>' . $row['busModel'] . '</td>';
                echo '<td>' . $row['engineSize'] . '</td>';
                echo '<td>' . $row['dateBought'] . '</td>';
                echo '<td>'
                . '<a href="viewBus.php?id=' . $row['busID'] . '"><img src="icons/view.png"  height="30px" width="30px"  style="margin: 3px;"  /></a>' //view icon which brings you to viewbus page
                . '<a href="#.php?id=' . $row['busID'] . '"><img src="icons/edit.png" height="30px" width="30px"   style="margin: 3px;" /></a>' //will bring the user to the edit bus page
                . '<a class="deletebtn" href="deletebus.php?id=' . $row['busID'] . '"><img class="" src="icons/delete.png"  height="30px" width="30px" style="margin: 3px;" /></a>'; //delete function 
                echo '</tr>';

                $row = $statement->fetch(PDO::FETCH_ASSOC);
            }
            ?>

    </table>
</div>


