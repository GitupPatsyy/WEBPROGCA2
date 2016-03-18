<?php require_once 'utilities/styles.php'; ?><!--Require all the style files-->
<div class="row header_style">
    <!--header row where jumbotron is held-->
    <div class="jumbotron">
        <!--jumbotron image with the nav bar within it-->
        <nav class="nav-bar navbar-default"><!--opening navbar-->
            <div class="navbar-header">Tour Bus Massacre</div>
            <!--navbar header-->
            <?php require 'utilities/toolbar.php'; ?> <!--require the toolbar which contains the navbar-->
        </nav><!--closing nav tag-->
        <div class="row col-lg-12">
            <!--row with a width of 12-->
            <div class="row col-lg-3 nav-subtext">
                <!--to constrain the subheading-->
                <p><strong>Killing</strong> tours since <i>1993&reg</i></p>
                <div class="jumbo-content"></div>
                <!--was going to be used to put content ontop of the jumbotron-->
            </div>
            <hr class="nav-hr"/>
            <!--style for the hr under the navbar-->

            <div class="row col-lg-12">
                <!--second row for second half of the content-->
                <div class="feature col-lg-4 icon-box">
                    <!--red boxes that have icons and text inside.-->
                    <img src="img/icons/bus (2).png" class="center-image" />
                    <!--img from the img directory with a class that centers the image-->
                    <h2 class="center-content">Bus</h2>
                    <!--heading for the description-->
                    <hr />
                    <!--paragraph for desciption-->
                    <p>
                        Users will be able to CRUD on some buses and explore our mystical system to see what we have in store.
                    </p>
                </div>
                <div class="feature col-lg-4 icon-box">
                    <!--red boxes that have icons and text inside.-->
                    <img src="img/icons/oil (1).png" class="center-image" />
                    <!--img from the img directory with a class that centers the image-->
                    <h2 class="center-content">Garage</h2> 
                    <!--heading for the description-->
                    <hr />
                    <!--paragraph for desciption-->
                    <p>
                        Users will be able to CRUD on some garages and explore our mystical system to see what we have in store.
                    </p>
                </div>
                <div class="feature col-lg-4 icon-box">
                    <!--red boxes that have icons and text inside.-->
                    <img src="img/icons/seat-recline-normal (1).png" class="center-image" />
                    <!--img from the img directory with a class that centers the image-->
                    <h2 class="center-content">Driver</h2>
                    <!--heading for the description-->
                    <hr />
                    <!--paragraph for desciption-->
                    <p>
                        Users will be able to CRUD on some drivers and explore our mystical system to see what we have in store.
                    </p>
                </div>
            </div>
        </div>
    </div><!-- Closing jumbotron-->
</div><!--closing header row-->

