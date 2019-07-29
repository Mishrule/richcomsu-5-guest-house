<?php
    include_once('db.php');
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Starter Template - Materialize</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>

<body>
    <nav class="light-teal lighten-1" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">RICHCOMSU 5 <span>GUEST
                    HOUSE</span> </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Sign In</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="index.html">Home</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">


            <!-- <div class="row center">
                <h5 class="header col s12 light">Put time here</h5>
            </div> -->
            <!-- <div class="row center">
                <a href="#" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a>
            </div> -->
            <br><br>

        </div>
    </div>

    <section class="container">
        <div class="row">
            <div class="col l6 m6 s12 offset-l3 offset-m3">
                <div class="card-panel">
                    <span class="pink-text">
                        <h4>Provide Login details</h4>
                        <hr>
                        <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input id="icon_prefix" type="text" class="validate">
                                        <label for="icon_prefix">First Name</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">phone</i>
                                        <input id="icon_telephone" type="password" class="validate">
                                        <label for="icon_telephone">Password</label>
                                    </div>
                                </div>
                                <button type="button" class="btn waves-effect waves-teal right" id="loginBtn"
                                    name="loginBtn ">Login</button>
                            </form>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <h1 class="header center orange-text">
        <marquee>RichComsu 5 Guest House</marquee>
    </h1>
    <br><br><br><br>
    </div>

    <footer class="page-footer teal">
        <div class="container">
            <div class="row">

            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Made by <span>Mish Rule Trades</span> </a>
            </div>
        </div>
    </footer>


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

</body>

</html>