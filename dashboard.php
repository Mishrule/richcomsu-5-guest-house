<?php
include_once('db.php');
$updateShow = '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>RichComsu 5 | Dashboard</title>

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
                <li><a href="#">Logout</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="index.html">Home</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>

    <section class="container" style="padding-top: 20px;">
        <div class="row">
            <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
                <li class="tab"><a class="active" href="#regGuest">Guest Registration</a></li>
                <li class="tab"><a href="#roomStatus">Room Status</a></li>
                <li class="tab"><a href="#stock">Stocks</a></li>
                <li class="tab"><a href="#sales">Sales</a></li>
                <li class="tab"><a href="#updateStock">Update Stock</a></li>
                <li class="tab"><a href="#checkStock">Check Stock</a></li>
                <li class="tab"><a href="#settings">Settings</a></li>
            </ul>
        </div>
        <!--======================================================================================================
                                                GUEST REGISTRATION 
        ======================================================================================================-->
        <div id="regGuest" class="col s12">

            <div class="row">
                <div class="col s12 m12">
                    <div class="card-panel  pink lighten-2">
                        <span class="white-text" style="text-align: center">
                            <h5><strong>GUEST REGISTRATION</strong></h5>
                        </span>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <form class="col s12 m12">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="fullName" name="fullName" type="text" class="validate">
                                <label for="fullName">Full Name</label>
                            </div>
                            <div class="input-field col s6 m6">
                                <select id="guestRoomSelect" name="guestRoomSelect">
                                    <option>Select a room</option>
                                    <?php

                                    $guestRoomRegShow = '';
                                    $guestRoomRegistrationSQL = "SELECT * FROM room";
                                    $guestRoomRegistrationResult = mysqli_query($conn, $guestRoomRegistrationSQL);
                                    if ($guestRoomRegNumRoll = mysqli_num_rows($guestRoomRegistrationResult) > 0) {
                                        while ($guestRoomRegRow = mysqli_fetch_array($guestRoomRegistrationResult)) {
                                            $guestRoomRegShow .= '<option value="' . $guestRoomRegRow['roomNumber'] . '">' . $guestRoomRegRow['roomNumber'] . '</option>';
                                        }
                                    } else { }
                                    ?>

                                    <?php echo $guestRoomRegShow; ?>
                                </select>
                                <label for="guestRoomSelect">Room</label>
                            </div>

                        </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input id="companyName" name="companyName" type="text" class="validate">
                        <label for="companyName">Company Name</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="arrivalDate" name="arrivalDate" type="text" class="datepicker">
                        <label for="arrivalDate">Arrival Date</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="departureDate" name="departureDate" type="text" class="datepicker">
                        <label for="departureDate">Departure Date</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="address" name="address" type="text" class="validate">
                        <label for="address">Address</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="contact" name="contact" type="tel" class="validate">
                        <label for="contact">Contact</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="nationality" name="nationality" type="text" class="validate">
                        <label for="nationality">Nationality</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6">
                        <select id="modeOfPayment" name="modeOfPayment">
                            <option>Mode of Payment</option>
                            <option value="cash">Cash</option>
                            <option value="momo">Mobile Money</option>

                        </select>
                        <label>Payment Type</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="numberOfGuest" name="numberOfGuest" type="text" class="validate">
                        <label for="numberOfGuest">Number of Guest</label>
                    </div>

                </div>
                <div class="row">
                    <div class="input-field col s4">
                        Daily Rate
                        <input id="dailyRate" name="dailyRate" type="text" class="validate" disabled>
                        <label for="dailyRate"></label>
                    </div>

                    <div class="input-field col s4">
                        <select id="daysSpend" name="daysSpend">
                            <option>Select a day</option>
                            <option value="1">1</option>
                            <option value="2">2 </option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                        </select>
                        <label for="daysSpend">No. of Days</label>

                    </div>
                    <div class="input-field col s4">
                        Total Payment
                        <input id="totalPayment" name="totalPayment" type="text" class="validate" disabled>
                        <label for="totalPayment"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="advancePayment" name="advancePayment" type="text" class="validate">
                        <label for="advancePayment">Advance Payment</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="idNumber" name="idNumber" type="text" class="validate">
                        <label for="idNumber">ID Number</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input id="receiptNumber" name="receiptNumber" type="text" class="validate">
                        <label for="receiptNumber">Reciept Number</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="staffID" name="staffID" type="text" class="validate">
                        <label for="staffID">Staff ID</label>
                    </div>
                    <div class="input-field col s4 m4">
                        <select id="gueststatus" name="gueststatus">
                            <option>Choose Status</option>
                            <option value="checkin">Check in</option>

                        </select>
                        <label for="status">Status</label>
                    </div>

                </div>
                <div class="row">
                    <p class="input-field col s6">
                        <label>
                            <input type="checkbox" id="agree" name="agree" value="yes" />
                            <span>I agree with Terms and conditions</span>
                        </label>
                    </p>
                    <div class="input-field col s6">
                        <button class="btn waves-effect waves-light s" id="registration" value="registration"
                            name="registration" type="button">Check In
                            <i class="material-icons right">send</i>
                        </button>
                    </div>

                </div>
                </form>
            </div>
        </div>
        <!--====================================================================================================== 
                                                 ROOM STATUS 
       ====================================================================================================== -->
        <div id="roomStatus" class="col s12">
            <div class="col s12 m12">
                <div class="card-panel  pink">
                    <span class="white-text" style="text-align: center">
                        <h5><strong>ROOM STATUS</strong></h5>
                    </span>
                </div>
            </div>
            <!-- ROOM STATUS -->
            <div class="row">
                <div class="col s6 m6">
                    <div class="input-field col s12 m12">
                        <select id="roomStatusSelect" name="roomStatusSelect">
                            <option>Select a room</option>
                            <?php

                            $roomStatusShow = '';
                            $roomStatusSQL = "SELECT * FROM guestregistration";
                            $roomStatusResult = mysqli_query($conn, $roomStatusSQL);
                            if ($roomStatusNumRoll = mysqli_num_rows($roomStatusResult) > 0) {
                                while ($roomStatusRow = mysqli_fetch_array($roomStatusResult)) {
                                    $roomStatusShow .= '<option value="' . $roomStatusRow['guestroom'] . '">' . $roomStatusRow['guestroom'] . '</option>';
                                }
                            } else { }
                            ?>

                            <?php echo $roomStatusShow; ?>


                        </select>
                        <label for="roomStatusSelect">Room Status</label>
                    </div>
                    <div class="input-field col s12 m12">
                        <div>ROOM STATUS:<h1><span id="statusCheck"> </span></h1>
                        </div>
                    </div>

                    <button type="button" class="btn waves-effect waves-teal right col s12 m4" id="checkout"
                        name="checkout " value="checkout">Checked out</button>
                    <button type="button" class="btn waves-effect waves-teal right pink accent-3 col s12 m4"
                        id="checkin" name="checkin" value="checkin">Checked In</button>
                    <button type="button" class="btn waves-effect waves-teal right col s12 m4" id="goneout"
                        name="goneout " value="goneout">Gone out</button>
                </div>


                <div class="col s6 m6">
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>s/n</th>
                                <th>Room Number</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $statusRoomCheckShow = '';
                            $statusCount = 1;
                            $statusRoomCheckSQL = "SELECT DISTINCT(guestroom) AS guest, status FROM guestregistration";
                            $statusRoomCheckResult = mysqli_query($conn, $statusRoomCheckSQL);
                            while ($statusRoomCheckRow = mysqli_fetch_array($statusRoomCheckResult)) {
                                $statusRoomCheckShow .= '
                                    <tr>
                                        <td>' . $statusCount++ . '</td>
                                        <td>' . $statusRoomCheckRow['guest'] . '</td>
                                        <td>' . $statusRoomCheckRow['status'] . '</td>
                                    </tr>
                                ';
                            }
                            ?>
                            <?php echo $statusRoomCheckShow; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--======================================================================================================
                                                 STOCK 
        ======================================================================================================-->
        <div id="stock" class="col s12">
            <div class="col s12 m12">
                <div class="card-panel  pink">
                    <span class="white-text" style="text-align: center">
                        <h5><strong>STOCKS</strong></h5>
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12">
                    <div class="card-panel">
                        <span style="text-align: center">
                            <h6><strong>ADD STOCK</strong></h6>
                            <div class="divider"></div>
                        </span>
                        <div class="row">
                            <div class="input-field col m6 offset-m3">
                                <input type="text" id="stockDate" name="stockDate" class="datepicker">
                                <label for="stockDate">Date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="stockProductName" name="stockProductName" type="text" class="validate">
                                <label for="stockProductName">Product Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="stockQuantity" name="stockQuantity" type="text" class="validate">
                                <label for="stockQuantity">Quantity</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="stockCostPrice" name="stockCostPrice" type="number" class="validate">
                                <label for="stockCostPrice">Cost Price</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="stockSellingPrice" name="stockSellingPrice" type="number" class="validate">
                                <label for="stockSellingPrice">Selling Price</label>
                            </div>
                        </div>
                        <div align="center">
                            <button class="btn waves-effect waves-light" type="button" id="stockBt" value="stockBt"
                                name="stockBt">Take Stock
                                <i class="material-icons right">send</i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!--====================================================================================================== 
                                                 SALES 
        ======================================================================================================-->
        <div id="sales" class="col s12">
            <div class="col s12 m12">
                <div class="card-panel  pink">
                    <span class="white-text" style="text-align: center">
                        <h5><strong>SALES</strong></h5>
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col s6 m6">
                    <div class="card-panel">
                        <div class="row">
                            <div class="input-field col s12">
                                <h6>TOTAL ROOM SALES</h6>
                                <hr>

                            </div>
                            <div class="input-field col s12">
                                <div align="center">
                                    <h5>Total Sales</h5>
                                    <div class="divider"></div>
                                    <div id="calToRoomSale" style="font-size:20px; color: red; font-weight:bold;"></div>
                                </div>
                            </div>
                            <div class="input-field col s6">
                                <input id="calFrom" name="calFrom" type="text" class="datepicker">
                                <label for="calFrom">Calculate From</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="calTo" name="calTo" type="text" class="datepicker">
                                <label for="calTo">Calculate To</label>
                            </div>
                            <div class="input-field col s12">
                                <button type="button" class="btn waves-effect waves-teal col s12 m12" id="calRoomSale"
                                    name="calRoomSale " value="calRoomSale" style="width: 100%;">Calculate</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col s6 m6">
                    <div class="card-panel">
                        <div class="row">
                            <div class="input-field col s12">
                                <h6>RECORD DAILY SALES</h6>
                                <hr>
                                <div class="input-field col s6 m6">
                                    <input id="recordDailySalesDate" name="recordDailySalesDate" type="text"
                                        class="datepicker">
                                    <label for="recordDailySalesDate">Select A Date</label>
                                </div>
                                <div class="input-field col s6 m6">
                                    <input id="recordDailySalesAmount" name="recordDailySalesAmount" type="text"
                                        class="validate">
                                    <label for="recordDailySalesAmount">Daily Amount</label>
                                </div>
                                <div class="input-field col s4 m12">
                                    <button type="button" class="btn waves-effect waves-teal col s12 m12"
                                        id="dailySalesBTN" name="dailySalesBTN " value="dailySalesBTN"
                                        style="width: 100%;">Save Sales</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6">
                    <div class="card-panel">
                        <span style="text-align: center">
                            <h6><strong>SELL A PRODUCT</strong></h6>
                            <div class="divider"></div>
                        </span>
                        <div class="row">
                            <div class="input-field col m6 offset-m3">
                                <input type="text" id="sellDate" name="sellDate" class="datepicker">
                                <label for="sellDate">Date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">

                                <select id="sellProductName" name="sellProductName">
                                    <option>Select a Product</option>
                                    <?php

                                    $sellProductShow = '';
                                    $sellProductSQL = "SELECT * FROM saleproduct";
                                    $sellProductResult = mysqli_query($conn, $sellProductSQL);
                                    if ($sellProductNumRoll = mysqli_num_rows($sellProductResult) > 0) {
                                        while ($sellProductRow = mysqli_fetch_array($sellProductResult)) {
                                            $sellProductShow .= '<option value="' . $sellProductRow['productname'] . '">' . $sellProductRow['productname'] . '</option>';
                                        }
                                    } else { }
                                    ?>

                                    <?php echo $sellProductShow; ?>


                                </select>
                                <label for="sellProductName">Product</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select id="sellQuantity" name="sellQuantity">
                                    <option>Item Quantity</option>
                                    <option value="1">1</option>
                                    <option value="2">2 </option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                </select>
                                <label for="sellQuantity">Item Quantity</label>

                            </div>
                            <div class="row">
                                <div class="input-field col s4 m4">
                                    Item Cost
                                    <input id="sellItemCost" name="sellItemCost" type="number" class="validate"
                                        disabled>
                                    <label for="sellItemCost"> </label>
                                </div>
                                <div class="input-field col s4 m4">
                                    Payment
                                    <input id="sellAmountPayment" name="sellAmountPayment" type="number"
                                        class="validate" disabled>
                                    <label for="sellAmountPayment"></label>
                                </div>

                                <div class="input-field col s4 m4">
                                    <input id="sellAmountPaid" name="sellAmountPaid" type="number" class="validate">
                                    <label for="sellAmountPaid">Amount Paid</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    Balance
                                    <input id="sellBalance" name="sellBalance" type="number" class="validate" disabled>
                                    <label for="sellBalance"></label>
                                </div>
                                <div class="input-field col s6">
                                    Quantity Remains
                                    <input id="sellQuantityRemains" name="sellQuantityRemains" type="number"
                                        class="validate" disabled>
                                    <label for="sellQuantityRemains"></label>
                                </div>
                            </div>
                            <div align="center">
                                <button class="btn waves-effect waves-light" type="button" id="sellButton"
                                    name="sellButton" value="sellButton">Sell
                                    <!-- <i class="material-icons right">send</i> -->
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col m6 s6">
                    <div class="card-panel">
                        <div class="row">
                            <div class="col s12 m12">
                                <table class="responsive-table">
                                    <thead>
                                        <tr>
                                            <th>s/n</th>
                                            <th>PRODUCT NAME</th>
                                            <th>QUANTITY</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $productSalesCheckShow = '';
                                        $productSalesCount = 1;
                                        $productSalesCheckSQL = "SELECT productname, quantityremain FROM saleproduct";
                                        $productSalesCheckResult = mysqli_query($conn, $productSalesCheckSQL);
                                        while ($productSalesCheckRow = mysqli_fetch_array($productSalesCheckResult)) {
                                            $productSalesCheckShow .= '
                                    <tr>
                                        <td>' . $productSalesCount++ . '</td>
                                        <td>' . $productSalesCheckRow['productname'] . '</td>
                                        <td>' . $productSalesCheckRow['quantityremain'] . '</td>
                                    </tr>
                                ';
                                        }
                                        ?>
                                        <?php echo $productSalesCheckShow; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="card-panel">
                            <div class="row">
                                <div class="col s12 m12">

                                    <span style="text-align: center">
                                        <h6><strong>CHECK PRODUCT SALES</strong></h6>
                                        <div class="divider"></div>
                                    </span>
                                    <div class="input-field col s12">
                                        <div align="center">
                                            <h5>Total Product Sales</h5>
                                            <div class="divider"></div>
                                            <div id="calProductSaleOutput"
                                                style="font-size:20px; color: red; font-weight:bold;"></div>
                                        </div>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="calProductFrom" name="calProductFrom" type="text" class="datepicker">
                                        <label for="calProductFrom">Calculate Product From</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="calProductTo" name="calProductTo" type="text" class="datepicker">
                                        <label for="calProductTo">Calculate Product To</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <button type="button" class="btn waves-effect waves-teal col s12 m12"
                                            id="calProductSaleBTN" name="calProductSaleBTN " value="calProductSaleBTN"
                                            style="width: 100%;">Calculate Sale</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!--====================================================================================================== 
                                                 UPDATE STOCK 
        ======================================================================================================-->
        <div id="updateStock" class="col s12">
            <div class="col s12 m12">
                <div class="card-panel  pink">
                    <span class="white-text" style="text-align: center">
                        <h5><strong>UPDATE STOCK</strong></h5>
                    </span>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m12">
                    <div class="card-panel">
                        <span style="text-align: center">
                            <h6><strong>UPDATE STOCK QUANTITY & SELLING PRICE & COST PRICE</strong></h6>
                            <div class="divider"></div>
                        </span>
                        <div class="row">
                            <div class="input-field col m6 offset-m3">
                                <input type="text" id="updateStockDate" name="updateStockDate" class="datepicker">
                                <label for="updateStockDate">Date</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <select id="updateStockProductName" name="updateStockProductName">
                                    <option>Select a Product</option>
                                    <?php

                                    $updateProductShow = '';
                                    $updateProductSQL = "SELECT * FROM saleproduct";
                                    $updateProductResult = mysqli_query($conn, $updateProductSQL);
                                    if ($updateProductNumRoll = mysqli_num_rows($updateProductResult) > 0) {
                                        while ($updateProductRow = mysqli_fetch_array($updateProductResult)) {
                                            $updateProductShow .= '<option value="' . $updateProductRow['productname'] . '">' . $updateProductRow['productname'] . '</option>';
                                        }
                                    } else { }
                                    ?>

                                    <?php echo $updateProductShow; ?>


                                </select>
                                <label for="updateStockProductName">Stock Product Name</label>
                            </div>
                            <div class="input-field col s6">
                                Quantity Remain
                                <input id="updateStockQuantityRemain" name="updateStockQuantityRemain" type="text"
                                    class="validate">
                                <label for="updateStockQuantityRemain"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="updateStockNewQuantity" name="updateStockNewQuantity" type="number"
                                    class="validate">
                                <label for="updateStockNewQuantity">Add New Quantity</label>
                            </div>
                            <div class="input-field col s6">
                                Updated Quantity
                                <input id="updateStockTotalQuantity" name="updateStockTotalQuantity" type="number"
                                    class="validate">
                                <label for="updateStockTotalQuantity"></label>
                            </div>
                            <div class="input-field col s6">
                                Selling Price
                                <input id="updateStockSellingPrice" name="updateStockSellingPrice" type="number"
                                    class="validate">
                                <label for="updateStockSellingPrice"></label>
                            </div>
                        </div>
                        <div align="center">
                            <button class="btn waves-effect waves-light" type="button" id="updateStockBTN"
                                value="updateStockBTN" name="updateStockBTN">Update Stock
                                <i class="material-icons right">send</i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>


        <!-- =======================================================================
                            ORIGINAL SETTINGS
        =========================================================================== -->
        <div id="settings" class="col s12">
            <div class="col s12 m12">
                <div class="card-panel  pink">
                    <span class="white-text" style="text-align: center">
                        <h5><strong>ORIGINAL SETTINGS</strong></h5>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12">
                    <div class="card-panel">
                        <!-- <span style="text-align: center">
                            <h6><strong></strong></h6>
                            <div class="divider"></div>
                        </span> -->
                        <div class="row">
                            <div class="col m6">
                                <div class="row">
                                    <div class="col s12 m12">
                                        <div class="card-panel">
                                            <div align="center">Create A room</div>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input id="setRoomNumber" name="setRoomNumber" type="text"
                                                        class="validate">
                                                    <label for="setRoomNumber">Room Number</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="setRoomPrice" name="setRoomPrice" type="number"
                                                        class="validate">
                                                    <label for="setRoomPrice">Price</label>
                                                </div>
                                                <div align="center">
                                                    <button class="btn waves-effect waves-light" type="button"
                                                        id="createRoomBtn" name="createRoomBtn"
                                                        value="createRoomBtn">Create room
                                                        <i class="material-icons right">send</i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col m6">
                                <div class="row">
                                    <div class="col s12 m12">
                                        <div class="card-panel">
                                            <div align="center">Update Room Price</div>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <select id="updateRoomNumber" name="updateRoomNumber">

                                                        <option>Select a room</option>
                                                        <?php
                                                        $updateRoomSQL = "SELECT * FROM room";
                                                        $updateRoomResult = mysqli_query($conn, $updateRoomSQL);
                                                        $numRoll = mysqli_num_rows($updateRoomResult) > 0;
                                                        if ($numRoll) {
                                                            while ($updatePriceRow = mysqli_fetch_array($updateRoomResult)) {
                                                                $updateShow .= '
                                                                <option value="' . $updatePriceRow['roomNumber'] . '">' . $updatePriceRow['roomNumber'] . '</option> ';
                                                            }
                                                        } else {
                                                            $updateShow .= 'No room Created Yet';
                                                        }
                                                        ?>

                                                        <?php echo $updateShow; ?>

                                                    </select>
                                                    <label for="updateRoomNumber">Room Number</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="updateRoomPrice" name="updateRoomPrice" type="number"
                                                        class="validate">
                                                    <!-- <label for="updateRoomPrice">Price</label> -->
                                                </div>
                                                <div align="center">
                                                    <button class="btn waves-effect waves-light" type="button"
                                                        id="updateRoomPriceBTN" name="updateRoomPriceBTN"
                                                        value="updateRoomPriceBTN">Update Room Price
                                                        <i class="material-icons right">send</i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!--=================================================================================== 
                                         CHECK STOCK
         =====================================================================================-->
        <div id="checkStock" class="col s12">
            <div class="col s12 m12">
                <div class="card-panel  pink">
                    <span class="white-text" style="text-align: center">
                        <h5><strong>CHECK STOCK</strong></h5>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12">
                    <div class="card-panel">
                        <span style="text-align: center">
                            <h6><strong>ALL STOCK</strong></h6>
                            <div class="divider"></div>
                        </span>
                        <div class="row">
                            <div class="input-field col m6 offset-m3">
                                <!-- <input type="text" class="datepicker">
                                <label for="updateDate">Check by Date</label> -->
                            </div>
                        </div>
                        <div class="row">
                            <table class="responsive-table">
                                <thead>
                                    <tr>
                                        <th>s/n</th>
                                        <th>Product Name</th>
                                        <th>STOCK QUANTITY</th>
                                        <th>PRODUCT COST</th>
                                        <th>QUANTITY REMAINS</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $stockCheckShow = '';
                                    $stockCount = 1;
                                    $stockCheckSQL = "SELECT productname, itemquantity, itemcost , quantityremain FROM saleproduct";
                                    $stockCheckResult = mysqli_query($conn, $stockCheckSQL);
                                    while ($stockCheckRow = mysqli_fetch_array($stockCheckResult)) {
                                        $stockCheckShow .= '
                                    <tr>
                                        <td>' . $stockCount++ . '</td>
                                        <td>' . $stockCheckRow['productname'] . '</td>
                                        <td>' . $stockCheckRow['itemquantity'] . '</td>
                                        <td>' . $stockCheckRow['itemcost'] . '</td>
                                        <td>' . $stockCheckRow['quantityremain'] . '</td>
                                    </tr>
                                ';
                                    }
                                    ?>
                                    <?php echo $stockCheckShow; ?>

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- ====================================================================================================== -->
    </section>


    <footer class="page-footer pink lighten-2">

        <div class="footer-copyright">
            <div class="container">
                Made by <span>Mish Rule Trades</span> </a>
            </div>
        </div>
    </footer>


    <!--  Scripts-->
    <script src="js/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="js/custom.js"></script>
    <script>
    $(document).ready(function() {
        $('.tabs').tabs();
        $('select').formSelect();
        $('.datepicker').datepicker();
    });
    </script>
</body>

</html>