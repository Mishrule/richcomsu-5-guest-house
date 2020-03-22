<?php
if (isset($_POST['roomBTN'])) {
    include_once('db.php');

    $room = mysqli_real_escape_string($conn, $_POST['room']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $roomSQL = "INSERT INTO room VALUES($room, $price)";
    $roomResult = mysqli_query($conn, $roomSQL);

    if ($roomResult) {
        echo "Room Created Successfully";
    } {
        echo "Sorry Room Failed Create";
    }

    mysqli_close($conn);
}

//================================ UPDATE PRICE FIELD ====================================
if (isset($_POST['roomChange'])) {
    include_once('db.php');
    $outArray = array();
    $roomChange = mysqli_real_escape_string($conn, $_POST['roomChange']);
    $updateRoomPriceSQL = "SELECT * FROM room WHERE roomNumber = '$roomChange'";
    $updateRoomPriceResult = mysqli_query($conn, $updateRoomPriceSQL);

    while ($updateRoomPriceRow = mysqli_fetch_array($updateRoomPriceResult)) {
        $outArray['price'] = $updateRoomPriceRow['amount'];
    }
    echo json_encode($outArray);
    mysqli_close($conn);
}

//============================= UPDATE ROOM PRICE ======================================
if (isset($_POST['roomUpdateRoomBTN'])) {
    include_once('db.php');
    $roomRoomNumberUpdate = mysqli_real_escape_string($conn, $_POST['roomRoomNumberUpdate']);
    $roomPriceNewUpdate = mysqli_real_escape_string($conn, $_POST['roomPriceNewUpdate']);
    $roomUpdateSQL = "UPDATE room SET amount='$roomPriceNewUpdate' WHERE roomNumber='$roomRoomNumberUpdate'";
    $roomUpdateResult = mysqli_query($conn, $roomUpdateSQL);
    if ($roomUpdateResult) {
        echo " Room  Price has been updated Successfully";
    } else {
        echo "Failed to Update";
    }
    mysqli_close($conn);
}

//================================ UPDATE GUEST PRICE FIELD ====================================
if (isset($_POST['guestRoomPick'])) {
    include_once('db.php');
    $guestOutputArray = array();
    $guestRoomPick = mysqli_real_escape_string($conn, $_POST['guestRoomPick']);
    //    $updatePrice = mysqli_real_escape_string($conn, $_POST['updatePrice']);

    $guestUpdateRoomPriceSQL = "SELECT * FROM room WHERE roomNumber = '$guestRoomPick'";
    $guestUpdateRoomPriceResult = mysqli_query($conn, $guestUpdateRoomPriceSQL);

    while ($guestUpdateRoomPriceRow = mysqli_fetch_array($guestUpdateRoomPriceResult)) {
        $guestOutputArray['guestPrice'] = $guestUpdateRoomPriceRow['amount'];
    }
    echo json_encode($guestOutputArray);
    mysqli_close($conn);
}

//=============================| GUEST REGISTRATION |==========================================

if (isset($_POST['guestRegistration'])) {
    include_once('db.php');
    $guestfullName = mysqli_real_escape_string($conn, $_POST['guestfullName']);
    $guestRoom = mysqli_real_escape_string($conn, $_POST['guestRoom']);
    $guestCompanyName = mysqli_real_escape_string($conn, $_POST['guestCompanyName']);
    $guestArrivalDate = mysqli_real_escape_string($conn, $_POST['guestArrivalDate']);
    $guestDepartureDate = mysqli_real_escape_string($conn, $_POST['guestDepartureDate']);
    $guestAddress = mysqli_real_escape_string($conn, $_POST['guestAddress']);
    $guestEmail = mysqli_real_escape_string($conn, $_POST['guestEmail']);
    $guestContact = mysqli_real_escape_string($conn, $_POST['guestContact']);
    $guestNationality = mysqli_real_escape_string($conn, $_POST['guestNationality']);
    $guestModeOfPayment = mysqli_real_escape_string($conn, $_POST['guestModeOfPayment']);
    $guestNumberOfGuest = mysqli_real_escape_string($conn, $_POST['guestNumberOfGuest']);
    $guestDailyRate = mysqli_real_escape_string($conn, $_POST['guestDailyRate']);
    $guestDaysSpend = mysqli_real_escape_string($conn, $_POST['guestDaysSpend']);
    $guestTotalPayment = mysqli_real_escape_string($conn, $_POST['guestTotalPayment']);
    $guestAdvanPayment = mysqli_real_escape_string($conn, $_POST['guestAdvanPayment']);
    $guestIdNum = mysqli_real_escape_string($conn, $_POST['guestIdNum']);
    $guestReceiptNum = mysqli_real_escape_string($conn, $_POST['guestReceiptNum']);
    $guestStaff = mysqli_real_escape_string($conn, $_POST['guestStaff']);
    $guestStatus = mysqli_real_escape_string($conn, $_POST['guestStatus']);

    $guestRegistrationSQL = "INSERT INTO guestregistration VALUES('','$guestfullName','$guestRoom','$guestCompanyName','$guestArrivalDate','$guestDepartureDate','$guestAddress','$guestEmail','$guestContact','$guestNationality','$guestModeOfPayment','$guestNumberOfGuest','$guestDailyRate','$guestDaysSpend','$guestTotalPayment','$guestIdNum','$guestReceiptNum','$guestStaff','$guestStatus')";

    $guestRegistrationResult = mysqli_query($conn, $guestRegistrationSQL);

    if ($guestRegistrationResult) {
        echo "Guest Registered Successfully";
    } else {
        echo "Fail to Register";
    }
}
//===================================== STATUS CHANGE ====================================
if (isset($_POST['statusRoomChanges'])) {
    include_once('db.php');
    $outStatusArray = array();
    $statusRoomChange = mysqli_real_escape_string($conn, $_POST['statusRoomChanges']);
    //    $updatePrice = mysqli_real_escape_string($conn, $_POST['updatePrice']);

    $checkStatusSQL = "SELECT * FROM guestregistration WHERE guestroom = '$statusRoomChange'";
    $checkStatusResult = mysqli_query($conn, $checkStatusSQL);

    while ($checkStatusRow = mysqli_fetch_array($checkStatusResult)) {
        $outStatusArray['statuss'] = $checkStatusRow['status'];
    }
    echo json_encode($outStatusArray);
    mysqli_close($conn);
}
//===============| CHECK OUT
if (isset($_POST['check_out'])) {
    include_once('db.php');
    $checked_outChange = mysqli_real_escape_string($conn, $_POST['roomChangeBTN']);
    $check_out = mysqli_real_escape_string($conn, $_POST['check_out']);

    $statusRoomUpdateSQL = "UPDATE guestregistration SET status='$check_out' WHERE guestroom='$checked_outChange'";
    $statusRoomUpdateResult = mysqli_query($conn, $statusRoomUpdateSQL);
    if ($statusRoomUpdateResult) {
        echo " checkout";
    } else {
        echo "Failed to checkout";
    }
    mysqli_close($conn);
}
//=============| CHECK IN
if (isset($_POST['check_in'])) {
    include_once('db.php');
    $checked_inChange = mysqli_real_escape_string($conn, $_POST['roomChangeBTN']);
    $check_in = mysqli_real_escape_string($conn, $_POST['check_in']);

    $statusInroomUpdateSQL = "UPDATE guestregistration SET status='$check_in' WHERE guestroom='$checked_inChange'";
    $statusInroomUpdateResult = mysqli_query($conn, $statusInroomUpdateSQL);
    if ($statusInroomUpdateResult) {
        echo " checkin";
    } else {
        echo "Failed to checkin";
    }
    mysqli_close($conn);
}
//=============| GONEOUT
if (isset($_POST['gone_out'])) {
    include_once('db.php');
    $goneOutChange = mysqli_real_escape_string($conn, $_POST['roomChangeBTN']);
    $gonee_out = mysqli_real_escape_string($conn, $_POST['gonee_out']);

    $goneOutroomUpdateSQL = "UPDATE guestregistration SET status='$gonee_out' WHERE guestroom='$goneOutChange'";
    $goneOutroomUpdateResult = mysqli_query($conn, $goneOutroomUpdateSQL);
    if ($goneOutroomUpdateResult) {
        echo "goneout";
    } else {
        echo "Failed to update entry";
    }
    mysqli_close($conn);
}
//===============================|CALCULATE ROOM SYNTAX |====================================================
if (isset($_POST['cal_Room_Sale_BTN'])) {
    include_once('db.php');
    $calRoomShowOutput = '';
    $calFromDate_ = mysqli_real_escape_string($conn, $_POST['calFromDate']);
    $calToDate_ = mysqli_real_escape_string($conn, $_POST['calToDate']);

    $calRoomSaleSQL_ = "SELECT SUM(saleamount) AS TotalRoom FROM roomsales WHERE saledate BETWEEN '$calFromDate_' AND '$calToDate_'";

    $calRoomSaleResult_ = mysqli_query($conn, $calRoomSaleSQL_);

    if (mysqli_num_rows($calRoomSaleResult_) > 0) {
        while ($cal_RoomSaleRow = mysqli_fetch_array($calRoomSaleResult_)) {
            $calRoomShowOutput = $cal_RoomSaleRow['TotalRoom'];
        }
    } else {
        $calRoomShowOutput = "Sorry Not in Range";
    }
    echo $calRoomShowOutput;
    mysqli_close($conn);
}

//=====================================| ROOM SALE |===========================================
if (isset($_POST['dailyBTNSale'])) {
    include_once('db.php');
    $roomSaleDate = mysqli_real_escape_string($conn, $_POST['roomSaleDate']);
    $dailyAmountSales = mysqli_real_escape_string($conn, $_POST['dailyAmountSales']);

    $dailySalesSQL = "INSERT INTO roomsales VALUES('','$roomSaleDate','$dailyAmountSales')";

    $dailySalesResult = mysqli_query($conn, $dailySalesSQL);

    if ($dailySalesResult) {
        echo "Amount Saved Successfully";
    } else {
        echo "Fail to Save";
    }
    mysqli_close($conn);
}

//============================================| STOCK ADD |==============================================
if (isset($_POST['stockBTN'])) {
    include_once('db.php');
    $stock_date = mysqli_real_escape_string($conn, $_POST['stock_date']);
    $stock_productname = mysqli_real_escape_string($conn, $_POST['stock_productname']);
    $stock_quantity = mysqli_real_escape_string($conn, $_POST['stock_quantity']);
    $stock_costPrice = mysqli_real_escape_string($conn, $_POST['stock_costPrice']);
    $stock_sellingprice = mysqli_real_escape_string($conn, $_POST['stock_sellingprice']);

    $addStockSQL = "INSERT INTO stock VALUES('','$stock_date','$stock_productname','$stock_quantity','$stock_costPrice','$stock_sellingprice')";

    $addSaleStockSQL = "INSERT INTO saleproduct VALUES('','$stock_productname','$stock_quantity','$stock_sellingprice','','','','$stock_quantity')";

    $addStockResult = mysqli_query($conn, $addStockSQL);
    $addSaleStockResult = mysqli_query($conn, $addSaleStockSQL);
    if ($addStockResult && $addSaleStockResult) {
        echo "Stock Added Successfully";
    } else {
        echo "Fail to Add Stock";
    }

    mysqli_close($conn);
}

//===================================== SHOW QUANTITY ====================================
if (isset($_POST['sell_ProductNameChange'])) {
    include_once('db.php');
    $showQuantityArray = array();
    $showQuantityChange = mysqli_real_escape_string($conn, $_POST['sell_ProductNameChange']);
    //    $updatePrice = mysqli_real_escape_string($conn, $_POST['updatePrice']);

    $showQuantitySQL = "SELECT * FROM saleproduct WHERE productname = '$showQuantityChange'";
    $showQuantityResult = mysqli_query($conn, $showQuantitySQL);

    while ($showQuantityRow = mysqli_fetch_array($showQuantityResult)) {
        $showQuantityArray['quantity'] = $showQuantityRow['quantityremain'];
        $showQuantityArray['cost'] = $showQuantityRow['itemcost'];
    }
    echo json_encode($showQuantityArray);
    mysqli_close($conn);
}

//==============================| ADD SALES =============================
if (isset($_POST['sellbutton'])) {
    include_once('db.php');
    $selldate = mysqli_real_escape_string($conn, $_POST['selldate_']);
    $sellproductName = mysqli_real_escape_string($conn, $_POST['sellproductName']);
    $sellquantity = mysqli_real_escape_string($conn, $_POST['sellquantity']);
    $sellitemcost = mysqli_real_escape_string($conn, $_POST['sellitemcost']);
    $sellamountpaid = mysqli_real_escape_string($conn, $_POST['sellamountpaid']);
    $sellbalance = mysqli_real_escape_string($conn, $_POST['sellbalance']);
    $sellquantityremains = mysqli_real_escape_string($conn, $_POST['quantRemains']);
    $sellPayment = mysqli_real_escape_string($conn, $_POST['sellPayment']);

    $addSalesSQL = "INSERT INTO dailyitemsales VALUES('$selldate','$sellproductName','$sellquantity','$sellitemcost','$sellPayment','$sellamountpaid','$sellbalance','$sellquantityremains')";

    $addUpdateSalesSQL = "UPDATE saleproduct SET quantityremain='$sellquantityremains' WHERE productname='$sellproductName'";

    $addSalesResult = mysqli_query($conn, $addSalesSQL);
    $addUpdateSalesResult = mysqli_query($conn, $addUpdateSalesSQL);

    if ($addSalesResult && $addUpdateSalesResult) {
        echo "Sales Saved successfully";
    } else {
        echo "Fail to insert";
    }
    mysqli_close($conn);
}

//===============================|CALCULATE PRODUCT SALES |====================================================
if (isset($_POST['calProdSaleBTN'])) {
    include_once('db.php');

    $calProdOutput = '';
    $calProdFromDate = mysqli_real_escape_string($conn, $_POST['calProdFromDate']);
    $calProdToDate = mysqli_real_escape_string($conn, $_POST['calProdToDate']);

    $calProdSaleSQL = "SELECT SUM(payment) AS Total FROM dailyitemsales WHERE saledate BETWEEN '$calProdFromDate' AND '$calProdToDate'";

    $calProdSaleResult = mysqli_query($conn, $calProdSaleSQL);

    if (mysqli_num_rows($calProdSaleResult) > 0) {
        while ($calProdSaleRow = mysqli_fetch_array($calProdSaleResult)) {
            $calProdOutput = $calProdSaleRow['Total'];
        }
    } else {
        $calProdOutput = "Sorry Not in Range";
    }
    echo $calProdOutput;
    mysqli_close($conn);
}

//================================ UPDATE GUEST PRICE FIELD ====================================
if (isset($_POST['updateStockproductchange'])) {
    include_once('db.php');
    $updatestockproductPickArray = array();
    $updatestockproductPick = mysqli_real_escape_string($conn, $_POST['updateStockproductchange']);
    //    $updatePrice = mysqli_real_escape_string($conn, $_POST['updatePrice']);

    $updatestockproductPickSQL = "SELECT * FROM saleproduct WHERE productname = '$updatestockproductPick'";
    $updatestockproductPickResult = mysqli_query($conn, $updatestockproductPickSQL);

    while ($updatestockproductPickRow = mysqli_fetch_array($updatestockproductPickResult)) {
        $updatestockproductPickArray['cost'] = $updatestockproductPickRow['itemcost'];
        $updatestockproductPickArray['quantity'] = $updatestockproductPickRow['quantityremain'];
    }
    echo json_encode($updatestockproductPickArray);
    mysqli_close($conn);
}

//=========================================| UPDATE DATE STOCK |================================
if (isset($_POST['update_stock_btn'])) {
    include_once('db.php');
    $update_stock_date = mysqli_real_escape_string($conn, $_POST['update_stock_date']);
    $update_stock_productname_Change = mysqli_real_escape_string($conn, $_POST['update_stock_productname_Change']);
    $update_stockquantity_remain = mysqli_real_escape_string($conn, $_POST['update_stockquantity_remain']);
    $update_stock_total_quantity = mysqli_real_escape_string($conn, $_POST['update_stock_total_quantity']);
    $update_stock_selling_price = mysqli_real_escape_string($conn, $_POST['update_stock_selling_price']);

    $update_Stock_SQL = "UPDATE saleproduct SET saledate='$update_stock_date', itemquantity='$update_stock_total_quantity', itemcost='$update_stock_selling_price', quantityremain='$update_stock_total_quantity' WHERE productname='$update_stock_productname_Change'";
    $update_stock_Result = mysqli_query($conn, $update_Stock_SQL);
    if ($update_stock_Result) {
        echo "STOCK updated Successfully";
    } else {
        echo "Failed to update STOCK";
    }
    mysqli_close($conn);
}

//=====================================================================================================
//                                      FETCH FROM DATABASES
//=====================================================================================================

//====================================== FETCH FROM ROOM REGISTRATION
if (isset($_POST['fetchRoom'])) {
    include_once('db.php');
    $fetchRoom = mysqli_real_escape_string($conn, $_POST['fetchRoom']);


    $fetchRoomSQL = "SELECT * room ";
    // echo $fetchRoomSQL;
    $fetchRoomResult = mysqli_query($conn, $fetchRoomSQL);
    // print_r($fetchRoomSQL);
    while ($fetchRoomRow = mysqli_fetch_array($fetchRoomResult)) {
        echo $fetchRoomRow['roomNumber'];
    }
    mysqli_close($conn);
}

//===============================|CALCULATE PRODUCT SALES |====================================================
if (isset($_POST['view_guestBTN'])) {
    include_once('db.php');

    $view_guestOutput = '';
    $view_guestgateFrom = mysqli_real_escape_string($conn, $_POST['view_guestgateFrom']);
    $view_guestgateTo = mysqli_real_escape_string($conn, $_POST['view_guestgateTo']);

    // $view_guestSaleSQL = "SELECT * FROM guestregistration WHERE arrivaldate BETWEEN '$view_guestgateFrom' AND '$view_guestgateTo'";
    $view_guestSaleSQL = "SELECT * FROM guestregistration ";

    $view_guestSaleResult = mysqli_query($conn, $view_guestSaleSQL);
    $view_guest_count = 1;
    $view_guestOutputArray = array();
    if (mysqli_num_rows($view_guestSaleResult) > 0) {
        while ($view_guestSaleRow = mysqli_fetch_array($view_guestSaleResult)) {

            $view_guestOutputArray['count_'] = $view_guest_count;
            $view_guestOutputArray['fullname_'] = $view_guestSaleRow['fullname'];
            $view_guestOutputArray[' guestroom_'] = $view_guestSaleRow['guestroom'];
            $view_guestOutputArray['contact_'] = $view_guestSaleRow['contact'];
            $view_guestOutputArray['arrivaldate_'] = $view_guestSaleRow['arrivaldate'];
            $view_guestOutputArray['departureDate_'] = $view_guestSaleRow['departureDate'];
            $view_guestOutputArray[' modeofpayment_'] = $view_guestSaleRow['modeofpayment'];
            $view_guestOutputArray['totalpayment_'] = $view_guestSaleRow['totalpayment'];
            $view_guestOutputArray['status_'] = $view_guestSaleRow['status'];

            $view_guest_count++;
        }
    }

    echo json_encode($view_guestOutputArray);
    mysqli_close($conn);
}

// ===========================================SHOW REGISTRATION =======================================================

if(isset($_POST['show'])){
    include_once('db.php');
    $showDisp='';
    $fromDate = mysqli_real_escape_string($conn, $_POST['fromDate']);
    $toDate = mysqli_real_escape_string($conn, $_POST['toDate']);
    $showCount = 1;
    $showDisp .= '
        <table>
        <thead>
          <tr>
              <th>SN</th>
              <th>Name</th>
              <th>Room Number</th>
              <th>Number of Guest</th>
              <th>Arrival Date</th>
              <th>Departure Date</th>
              <th>Days Spend</th>
              <th>Total Payment</th>
          </tr>
        </thead>

        <tbody>
         
    ';

    $showSalesSQL = "SELECT * FROM guestregistration WHERE arrivaldate BETWEEN '$fromDate' AND '$toDate' ";
    // print_r($showSalesSQL);
    $showSalesResult = mysqli_query($conn, $showSalesSQL);
    if(mysqli_num_rows($showSalesResult)>0){
        while($showSalesRow = mysqli_fetch_array($showSalesResult)){
            $showDisp .='
                <tr>
                    <td>'.$showCount++.'</td>
                    <td>'.$showSalesRow['fullname'].'</td>
                    <td>'.$showSalesRow['guestroom'].'</td>
                    <td>'.$showSalesRow['numberofguest'].'</td>
                    <td>'.$showSalesRow['arrivaldate'].'</td>
                    <td>'.$showSalesRow['departureDate'].'</td>
                    <td>'.$showSalesRow['daysspend'].'</td>
                    <td>'.$showSalesRow['totalpayment'].'</td>
                </tr>
            ';
        }
    }else{
        $showDisp .='
            <tr>
                <td colspan="8"><marquee>Sorry there is no guest yet</marquee></td>
            </tr>
        ';
    }
    $showDisp .='
        </tbody>
      </table>
    ';

    echo $showDisp;
}

// =================================================| USER ACCOUNT | ==============================================

     if(isset($_POST['logBTN'])){
         include_once('db.php');
          $accountUserName = mysqli_real_escape_string($conn, $_POST['username']);
          $accountPassword = mysqli_real_escape_string($conn, $_POST['password']);
          $accountContact = mysqli_real_escape_string($conn, $_POST['contact']);
          $accountSQL = "INSERT INTO useraccount VALUES('','$accountUserName','$accountPassword','$accountContact')";

        $accountResult = mysqli_query($conn, $accountSQL);

        if($accountResult){
           echo "USER CREATED SUCCESSFULLY";
        }else{
            echo  mysqli_error($conn);
        }

     }
                                                           
?>