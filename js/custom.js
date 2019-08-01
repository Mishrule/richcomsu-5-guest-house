//=============================| CREATE ROOM CODES | ==========================

const setRoomNumber = document.getElementById('setRoomNumber');
const setRoomPrice = document.getElementById('setRoomPrice');
const createRoomBtn = document.getElementById('createRoomBtn');

createRoomBtn.addEventListener('click', createRoom);

function createRoom() {
    if (setRoomNumber.value !== '' && setRoomPrice.value !== '') {

        let room = setRoomNumber.value;
        let price = setRoomPrice.value;
        let roomBTN = createRoomBtn.value;
        // console.log(room, 'Price is', price, roomBTN);

        $.ajax({
            url: 'server.php',
            method: 'POST',
            data: { room: room, price: price, roomBTN: roomBTN },
            success: function (data) {
                M.toast({ html: data });
                fetchFromRoomCreation();
                // alert(data);
            }
        });

    } else {
        alert("Fields can be empty");
    }

}

//====================================== FETCH FROM ROOM REGISTRATION
function fetchFromRoomCreation() {
    var fetchRoom = "fetch";
    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { fetchRoom: fetchRoom },
        success: function (data) {
            console.log(data);

        }
    });
}
//====================================================================

//=============================== UPDATE ROOM ============================
const updateRoomNumber = document.getElementById('updateRoomNumber');
var updateRoomPrice = document.getElementById('updateRoomPrice');
const updateRoomPriceBTN = document.getElementById('updateRoomPriceBTN');
updateRoomPriceBTN.setAttribute('disabled', true);
updateRoomNumber.addEventListener('change', setPriceUpdate); //EVENT HANDLER

function setPriceUpdate() {
    let roomChange = updateRoomNumber.value;

    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { roomChange: roomChange },
        dataType: 'json',
        success: function (data) {

            if (updateRoomNumber.value !== 'Select a room') {
                updateRoomPrice.value = data.price;
                updateRoomPriceBTN.removeAttribute('disabled');
                fetchFromRoomCreation();
            } else {
                updateRoomPriceBTN.setAttribute('disabled', true);
            }

        }
    });
}


//=================================| ROOM PRICE UPDATE |===========================================

updateRoomPriceBTN.addEventListener('click', roomPriceUpdate);

function roomPriceUpdate() {
    let roomRoomNumberUpdate = updateRoomNumber.value;
    let roomPriceNewUpdate = updateRoomPrice.value;
    let roomUpdateRoomBTN = updateRoomPriceBTN.value;
    console.log(roomRoomNumberUpdate, " ", roomPriceNewUpdate, " ", roomUpdateRoomBTN);
    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { roomRoomNumberUpdate: roomRoomNumberUpdate, roomPriceNewUpdate: roomPriceNewUpdate, roomUpdateRoomBTN: roomUpdateRoomBTN },
        success: function (data) {
            alert(data);
            // console.log(data);
        }
    });
}

//===================================| GUEST REGISTRATION |=============================================
const guestRoomChangeSelect = document.getElementById('guestRoomSelect');
const dailyRate = document.getElementById('dailyRate');

guestRoomChangeSelect.addEventListener('change', guestRoomChange);

function guestRoomChange() {
    var guestRoomPick = guestRoomChangeSelect.value;
    // console.log(guestRoomPick);
    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { guestRoomPick: guestRoomPick },
        dataType: 'json',
        success: function (data) {
            // console.log(data);
            dailyRate.value = data.guestPrice;
        }
    });
}

//==================================| CALCULATE PAYMENT |==============================================
// dailyRate   = document.getElementById('dailyRate');
daysSpend = document.getElementById('daysSpend');
totalPayment = document.getElementById('totalPayment');
// console.log(daysSpend);
// console.log(totalPayment);

daysSpend.addEventListener('change', calculateDays);

function calculateDays() {
    let days = parseInt(daysSpend.value);
    let rate = parseInt(dailyRate.value);

    let compute = days * rate;

    totalPayment.value = compute;
}

//================================| GUEST REGISTRATION |============================================
var fullName = document.getElementById('fullName');
var guestRoomSelect = document.getElementById('guestRoomSelect');
var companyName = document.getElementById('companyName');
var arrivalDate = document.getElementById('arrivalDate');
var departureDate = document.getElementById('departureDate');
var address = document.getElementById('address');
var email = document.getElementById('email');
var contact = document.getElementById('contact');
var nationality = document.getElementById('nationality');
var modeOfPayment = document.getElementById('modeOfPayment');
var numberOfGuest = document.getElementById('numberOfGuest');
// dailyRate = document.getElementById('dailyRate');
var daysSpend = document.getElementById('daysSpend');
var totalPayment = document.getElementById('totalPayment');
var advancePayment = document.getElementById('advancePayment');
var idNumber = document.getElementById('idNumber');
var receiptNumber = document.getElementById('receiptNumber');
var staffID = document.getElementById('staffID');
var gueststatus = document.getElementById('gueststatus');
var registration = document.getElementById('registration');

registration.addEventListener('click', guestRegistration);

function guestRegistration() {
    var guestfullName = fullName.value;
    var guestRoom = guestRoomSelect.value;
    var guestCompanyName = companyName.value;
    var guestArrivalDate = arrivalDate.value;
    var guestDepartureDate = departureDate.value;
    var guestAddress = address.value;
    var guestEmail = email.value;
    var guestContact = contact.value;
    var guestNationality = nationality.value;
    var guestModeOfPayment = modeOfPayment.value;
    var guestNumberOfGuest = numberOfGuest.value;
    var guestDailyRate = dailyRate.value;
    var guestDaysSpend = daysSpend.value;
    var guestTotalPayment = totalPayment.value;
    var guestAdvanPayment = advancePayment.value;
    var guestIdNum = idNumber.value;
    var guestReceiptNum = receiptNumber.value;
    var guestStaff = staffID.value;
    var guestStatus = gueststatus.value;
    var guestRegistration = registration.value;

    if (guestfullName !== '' && guestRoom !== '' && guestCompanyName !== '' && guestArrivalDate !== '' && guestDepartureDate !== '' && guestAddress !== '' && guestEmail !== '' && guestContact !== '' && guestNationality !== '' && guestModeOfPayment !== '' && guestNumberOfGuest !== '' && guestDailyRate !== '' && guestDaysSpend !== '' && guestTotalPayment !== '' && guestAdvanPayment !== '' && guestIdNum !== '' && guestReceiptNum !== '' && guestStaff !== '' && guestStatus !== '') {

        $.ajax({
            url: 'server.php',
            method: 'POST',
            data: {
                guestfullName: guestfullName, guestRoom: guestRoom, guestCompanyName: guestCompanyName, guestArrivalDate: guestArrivalDate, guestDepartureDate: guestDepartureDate, guestAddress: guestAddress, guestEmail: guestEmail, guestContact: guestContact, guestNationality: guestNationality, guestModeOfPayment: guestModeOfPayment, guestNumberOfGuest: guestNumberOfGuest, guestDailyRate: guestDailyRate, guestDaysSpend: guestDaysSpend, guestTotalPayment: guestTotalPayment, guestAdvanPayment: guestAdvanPayment, guestIdNum: guestIdNum, guestReceiptNum: guestReceiptNum, guestStaff: guestStaff, guestStatus: guestStatus, guestRegistration: guestRegistration
            },
            success: function (data) {
                alert(data);
            }
        });

    } else {
        alert("PLEASE FILL ALL THE FORMS");

    }


}

//==========================================| STATUS |=================================================
var roomStatusChange = document.getElementById('roomStatusSelect');
var statusCheck = document.getElementById('statusCheck');


roomStatusChange.addEventListener('change', changeRoomStatuses);

function changeRoomStatuses() {

    var statusRoomChanges = roomStatusChange.value;
    // console.log(statusRoomChanges);
    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { statusRoomChanges: statusRoomChanges },
        dataType: 'json',
        success: function (data) {
            // console.log(data);
            statusCheck.innerText = (data.statuss);

            if (roomStatusChange.value !== 'Select a room') {
                checkout.removeAttribute('disabled');
                checkin.removeAttribute('disabled');
                goneout.removeAttribute('disabled');
            } else {
                checkout.setAttribute('disabled', true);
                checkin.setAttribute('disabled', true);
                goneout.setAttribute('disabled', true);
            }

        }
    });
}
//==================| CHECK OUT

const checkout = document.getElementById('checkout');
checkout.setAttribute('disabled', true);
checkout.addEventListener('click', addCheckout);

function addCheckout() {
    var check_out = checkout.value;
    var roomChangeBTN = roomStatusChange.value;
    var checked_out = "checkout";
    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { checked_out: checked_out, roomChangeBTN: roomChangeBTN, check_out: check_out },

        success: function (data) {
            // console.log(data);
            statusCheck.innerText = data;

        }
    });
}

//==================| CHECK IN

checkin = document.getElementById('checkin');
checkin.addEventListener('click', addCheckin);
checkin.setAttribute('disabled', true);
function addCheckin() {
    var check_in = checkin.value;
    var roomChangeBTN = roomStatusChange.value;
    var checked_in = "checkin";
    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { checked_in: checked_in, roomChangeBTN: roomChangeBTN, check_in: check_in },

        success: function (data) {

            statusCheck.innerText = data;

        }
    });
}



//==================| GONEOUT

goneout = document.getElementById('goneout');
goneout.addEventListener('click', addGoneOut);
goneout.setAttribute('disabled', true);
function addGoneOut() {
    var gone_out = goneout.value;
    var roomChangeBTN = roomStatusChange.value;
    var gonee_out = "goneout";
    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { gonee_out: gonee_out, roomChangeBTN: roomChangeBTN, gone_out: gone_out },

        success: function (data) {

            statusCheck.innerText = data;

        }
    });
}

//===============================|CALCULATE ROOM SYNTAX |====================================================
const calFrom = document.getElementById('calFrom');
const calTo = document.getElementById('calTo');
const calToRoomSaleOutput = document.getElementById('calToRoomSale');
const calRoomSale = document.getElementById('calRoomSale');

calRoomSale.addEventListener('click', calCulateRoomSales);
function calCulateRoomSales() {
    var calFromDate = calFrom.value;
    var calToDate = calTo.value;
    var calRoomSaleBTN = calRoomSale.value;

    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { calFromDate: calFromDate, calToDate: calToDate, calRoomSaleBTN: calRoomSaleBTN },
        success: function (data) {
            calToRoomSaleOutput.innerText = data;
        }
    });

}


//=====================================| ROOM SALE |===========================================
const recordSalesDate = document.getElementById('recordDailySalesDate');
const dailySalesAmount = document.getElementById('recordDailySalesAmount');
const dailySales_BTN = document.getElementById('dailySalesBTN');

dailySalesBTN.addEventListener('click', logSale);
function logSale() {
    var roomSaleDate = recordSalesDate.value;
    var dailyAmountSales = dailySalesAmount.value;
    var dailyBTNSale = dailySales_BTN.value;
    // console.log(roomSaleDate, dailyAmountSales, dailyBTNSale);

    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { roomSaleDate: roomSaleDate, dailyAmountSales: dailyAmountSales, dailyBTNSale: dailyBTNSale },
        success: function (data) {
            alert(data);
        }
    });
}

//=============================================| STOCK |============================================
const stock_Date = document.getElementById('stockDate');
const stock_ProductName = document.getElementById('stockProductName');
const stock_Quantity = document.getElementById('stockQuantity');
const stock_CostPrice = document.getElementById('stockCostPrice');
const stock_SellingPrice = document.getElementById('stockSellingPrice');
const stock_Bt = document.getElementById('stockBt');

stock_Bt.addEventListener('click', addStock);
function addStock() {
    var stock_date = stock_Date.value;
    var stock_productname = stock_ProductName.value;
    var stock_quantity = stock_Quantity.value;
    var stock_sellingprice = stock_SellingPrice.value;
    var stock_costPrice = stock_CostPrice.value;
    var stockBTN = stock_Bt.value;
    if (stock_date !== '' && stock_productname !== '' && stock_quantity !== '' && stock_sellingprice !== '' && stock_costPrice !== '') {
        $.ajax({
            url: 'server.php',
            method: 'POST',
            data: { stock_date: stock_date, stock_productname: stock_productname, stock_quantity: stock_quantity, stock_sellingprice: stock_sellingprice, stockBTN: stockBTN, stock_costPrice: stock_costPrice },
            success: function (data) {
                alert(data);
            }
        });
    } else {
        alert("PLEASE FIELDS CAN'T BE EMPTY");
    }


}

//=================================| SELL A PRODUCT |================================================
var sell_Date = document.getElementById('sellDate');
var sell_ProductName = document.getElementById('sellProductName');
var sell_QuantityCombo = document.getElementById('sellQuantity');
var sell_ItemCost = document.getElementById('sellItemCost');

var sell_AmountPaid = document.getElementById('sellAmountPaid');
var sell_Balance = document.getElementById('sellBalance');
var sell_QuantityRemains = document.getElementById('sellQuantityRemains');
var sell_AmountPayment = document.getElementById('sellAmountPayment');
var sell_Button = document.getElementById('sellButton');
//==============SHOW QUANTITY
sell_ProductName.addEventListener('change', showQuantity)
function showQuantity() {
    var sell_ProductNameChange = sell_ProductName.value;
    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { sell_ProductNameChange: sell_ProductNameChange },
        dataType: 'json',
        success: function (data) {
            // console.log(data);
            sell_QuantityRemains.value = data.quantity;
            sell_ItemCost.value = data.cost;
        }
    });

}

//=======================| CHECK TOTAL PAYMENT
sell_AmountPaid.addEventListener('input', checkCustBalance);
function checkCustBalance() {
    var bal = sell_AmountPaid.value - sell_AmountPayment.value;
    if (bal !== "") {
        sell_Balance.value = bal;
        // console.log(sell_Balance.value);
    } else {
        sell_Balance.value = 0;
    }

}



//============================| CHECK BALANACE 
sell_QuantityCombo.addEventListener('change', calTotalPayment);
function calTotalPayment() {
    var sellquantity_combo = sell_QuantityCombo.value;
    var itemCost_textField = sell_ItemCost.value;
    sell_AmountPayment.value = sellquantity_combo * itemCost_textField;

}




//===============================| INSERT A PRODUCT |==========================
sell_Button.addEventListener('click', insertSales);

function insertSales() {
    var selldate_ = sell_Date.value;
    var sellproductName = sell_ProductName.value;
    var sellquantity = sell_QuantityCombo.value;
    var sellitemcost = sell_ItemCost.value;
    var sellamountpaid = sell_AmountPaid.value;
    var sellbalance = sell_Balance.value;
    var sellquantityremains = sell_QuantityRemains.value;
    var sellbutton = sell_Button.value;
    var sellPayment = sell_AmountPayment.value;

    // var quantRemains = sell_QuantityCombo.value - sell_QuantityRemains.value;

    var quantRemains = sellquantityremains - sellquantity;
    console.log(selldate_,
        sellproductName,
        sellquantity,
        sellitemcost,
        sellamountpaid,
        sellbalance,
        sellquantityremains,
        sellbutton,
        sellPayment, quantRemains);
    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { selldate_: selldate_, sellproductName: sellproductName, sellquantity: sellquantity, sellitemcost: sellitemcost, sellamountpaid: sellamountpaid, sellbalance: sellbalance, quantRemains: quantRemains, sellPayment: sellPayment, sellbutton: sellbutton },
        // dataType: 'json',
        success: function (data) {
            alert(data);
            // sell_QuantityRemains.value = data.quantity;
        }
    });
}

//=============================| CALCULATE PRODUCT SALES |======================================

const calProdOutput = document.getElementById('calProductSaleOutput');
const calProdFrom = document.getElementById('calProductFrom');
const calProdTo = document.getElementById('calProductTo');
const calProdBTN = document.getElementById('calProductSaleBTN');

calProdBTN.addEventListener('click', calCulateRoomSales);
function calCulateRoomSales() {
    var calProdFromDate = calProdFrom.value;
    var calProdToDate = calProdTo.value;
    var calProdSaleBTN = calProdBTN.value;

    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { calProdFromDate: calProdFromDate, calProdToDate: calProdToDate, calProdSaleBTN: calProdSaleBTN },
        success: function (data) {
            calProdOutput.innerText = data;
        }
    });

}

//==============================================================================================
//                                      UPDATE STOCK
//============================================================================================
const updatestockdate = document.getElementById('updateStockDate');
const updatestockproductnameChange = document.getElementById('updateStockProductName');
const updatestockquantityremain = document.getElementById('updateStockQuantityRemain');
const updatestocknewquantity = document.getElementById('updateStockNewQuantity');
const updatestocktotalquantity = document.getElementById('updateStockTotalQuantity');
const updatestocksellingprice = document.getElementById('updateStockSellingPrice');
const updatestockbtn = document.getElementById('updateStockBTN');


updatestockbtn.addEventListener('click', updateNewStock);
function updateNewStock() {
    var update_stock_date = updatestockdate.value;
    var update_stock_productname_Change = updatestockproductnameChange.value;
    var update_stockquantity_remain = updatestockquantityremain.value;
    // var update_stock_new_quantity = updatestocknewquantity.value;
    var update_stock_total_quantity = updatestocktotalquantity.value;
    var update_stock_selling_price = updatestocksellingprice.value;
    var update_stock_btn = updatestockbtn.value;

    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { update_stock_date: update_stock_date, update_stock_productname_Change: update_stock_productname_Change, update_stockquantity_remain: update_stockquantity_remain, update_stock_total_quantity: update_stock_total_quantity, update_stock_selling_price: update_stock_selling_price, update_stock_btn: update_stock_btn },
        success: function (data) {
            alert(data);
        }
    });

}


//========================| SET FIELDS |
updatestockproductnameChange.addEventListener('change', setQuantitynPrice);

function setQuantitynPrice() {
    let updateStockproductchange = updatestockproductnameChange.value;
    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: { updateStockproductchange: updateStockproductchange },
        dataType: 'json',
        success: function (data) {
            updatestockquantityremain.value = data.quantity;
            updatestocksellingprice.value = data.cost;
        }
    });
}

//===================| ADD NEW QUANTITY
updatestocknewquantity.addEventListener('input', addNewQuantity);
function addNewQuantity() {
    var updatestock_newquanty = parseInt(updatestocknewquantity.value);
    var updatestock_oldquantity = parseInt(updatestockquantityremain.value);
    updatestocktotalquantity.value = parseInt(updatestock_newquanty + updatestock_oldquantity);
}

//=================| QUANTITY CALCULATION 
// sell_Quantity.addEventListener('keyup', calculateQuantity);

// function calculateQuantity() {
//     var quantityRemin = sell_QuantityRemains.value;
//     var quantity = sell_Quantity.value;
//     var remainingQuantity = quantityRemin - quantity;
//     sell_QuantityRemains.value = remainingQuantity;
// }