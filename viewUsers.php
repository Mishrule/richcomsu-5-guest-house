<?php
    include_once('db.php');
    require_once('session.php');
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Richcomsu 5 | User Account</title>

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
                <li><a href="dashboard.php">Home</a></li>
                <li>
                    <p><?php echo "Welcome: ".$login_session;?></p>
                </li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <!-- <li><a href="index.html">Home</a></li> -->
            </ul>
            <!-- <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->
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
            <div class="col l12 m12 s12">
                <div class="card-panel">
                    <span class="pink-text">
                        <div align="center">
                            <h4>Registered Users</h4>
                        </div>

                        <hr>
                        <div class="row">
                            <form class="col s12">
                                <table class="striped highlight responsive-table">
                                    <thead>
                                        <tr>
                                            <th>s/n</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Contact</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            $showUserAccount = '';
                                            $showUserAccountCount = 1;
                                            $showUserAccountSQL = "SELECT * FROM useraccount";
                                            $showUserAccountResult = mysqli_query($conn, $showUserAccountSQL);
                                            while($showUserAccountRow = mysqli_fetch_array($showUserAccountResult)){
                                                $showUserAccount .='
                                                    <tr>
                                                        <td>'.$showUserAccountCount++.'</td>
                                                        <td>'.$showUserAccountRow['username'].'</td>
                                                        <td>'.$showUserAccountRow['pass_word'].'</td>
                                                        <td>'.$showUserAccountRow['contact'].'</td>
                                                    </tr>
                                                ';
                                            }
                                            echo $showUserAccount;
                                        ?>

                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <!-- <div class="row">
                            <div align="center">
                                <button class="btn waves-effect waves-light" type="button" id="action"
                                    name="action">Show
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div> -->
                    </span>
                    <div class="row">
                        <div class="col l12 m12 s12">
                            <div id="showSales"></div>
                        </div>
                    </div>
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
    <!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
    <script src="js/jquery.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
<script>
$(document).ready(function() {
    $('.datepicker').datepicker();

    $('#action').click(display);



    function display() {
        var fromDate = $('#fromDate').val();
        var toDate = $('#toDate').val();
        var show = "show";

        $.ajax({
            url: 'server.php',
            method: 'POST',
            data: {
                fromDate,
                toDate,
                show
            },
            success: function(data) {
                $('#showSales').html(data);
            }
        })

    }
})
</script>