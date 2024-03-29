<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Effervescence</title>

    <!-- CSS  -->
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
    <link href="css/style.css" type="text/css" rel="stylesheet" >
    
</head>
<body id="top" class="scrollspy">

<!-- Pre Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>

<!--Navigation-->
 <div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
            <a href="#" id="logo-container" class="brand-logo">Effervescence</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href='admin.php'>Admin</a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                   
                    <li><a href='admin.php'>Admin</a></li>
                </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>

<!--Hero-->
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <h1 class="text_h center header cd-headline letters type">
            <span>Got a problem? Got a process that could fix it? Let's hear it!</span>
        </h1>
        <div class="row center">
                <button data-target="modal1" class="btn modal-trigger" id= "myButton">Click Here to Submit Your Problem!</button>
                <br></br>
                <br></br>
                <br></br>
        </div>
    </div>
</div>

<!--Intro and service-->
<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <div  class="col s12">
                <h2 class="center header text_h2"> Welcome to Marist's live community driven problem solver. Here at MLC we strive to make your voice heard. Here are they ways we do that! </h2>
            </div>

            <div  class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-image-flash-on"></i>
                    <h5 class="promo-caption">Community Driven</h5>
                    <p class="light center">At every step of the progress we have you be the center. You submit your problems and vote on the solutions.</p>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-social-group"></i>
                    <h5 class="promo-caption">Real Time Involvement</h5>
                    <p class="light center">You can activly montior our process on your problems. See what we have done and what we are doing, with real time ticket tracking!</p>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-hardware-desktop-windows"></i>
                    <h5 class="promo-caption">Social Impact</h5>
                    <p class="light center">Your voice does not go unheard, with our continus tweets at Marist, our problems won't stay problems for long!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="col l6 s12">
                <form class="col s12" method="post" role="form">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="mdi-action-account-circle prefix white-text"></i>
                            <input id="icon_prefix" name="icon_prefix" type="text" maxlength="30" class="materialize-select validate white-text">
                            <label for="icon_prefix" class="white-text">Subject</label>
                        </div>
                        <br>
                        <br>
                        <div class="input-field col s12">
                            <i class="mdi-editor-mode-edit prefix white-text"></i>
                            <textarea id="icon_prefix1" name="icon_prefix1" maxlength="50" class="materialize-textarea white-text"></textarea>
                            <label for="icon_prefix1" class="white-text">Got a Problem?</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="mdi-editor-mode-edit prefix white-text"></i>
                            <textarea id="icon_prefix2" name="icon_prefix2" maxlength="50" class="materialize-textarea white-text"></textarea>
                            <label for="icon_prefix2" class="white-text">Got a Solution?</label>
                        </div>
                        <div class="col offset-s7 s5">
                            <button class="btn waves-effect waves-light red darken-1" type="submit" name="submit">Submit
                                <i class="mdi-content-send right white-text"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>
<br><br>

<?php
#Process User input
if(isset($_POST['submit']))
{
    #Connecting to Local Server
    require( 'includes/connect_db.php');

    $create_date = time();

    $subject = trim($_POST['icon_prefix']);
    
    $problem = trim($_POST['icon_prefix1']);
   
    $solution = trim($_POST['icon_prefix2']);

    $cmd = "ruby sendTweet.rb";
    $test = $cmd . "' test mpfss'";
    echo system($test);
    //echo system($cmd . "Subject: {$subject} Problem: {$problem} Solution: {$solution}");
    
    $q = "INSERT INTO tickets(create_date, subject, problem, solution)VALUES('" . $create_date . "', '" . $subject . "', '" . $problem . "', '" . $solution .  "')";
    
    $r = mysqli_query($dbc, $q);

    echo "<script type='text/javascript'>alert('$q');</script>";
}
?>

<!--Parallax-->
<div class="parallax-container">
    <div class="parallax"><img src="img/parallax1.png"></div>
</div>

<!--Footer-->
<footer id="contact" class="page-footer default_color scrollspy">
    <div class="footer-copyright default_color">
        <div class="container">
            Made by <a class="white-text" href="">Jimmy Crowley, Scott Hansen, John Randis</a>. Thanks to <a class="white-text" href="">MJ</a>
        </div>
    </div>
</footer>


    <!--  Scripts-->
    <script src="min/plugin-min.js"></script>
    <script src="min/custom-min.js"></script>
    <script>
        $(document).ready(function() {
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
        });
    </script>

    </body>
</html>
