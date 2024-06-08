<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Clouds PH - Checkout</title>
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/checkout.css">
    <link rel="shortcut icon" href="./assets/Favicon_Retro.png" type="image/x-icon">
    <style>
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background-color: #1A1D3B;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(#1A1D3B, #FF1695, #1A1D3B);
            border-radius: 50px;
        }
    </style>
</head>

<body class="gradient_body_one select-none">
    <!-- Navigation -->
    <?php
    ini_set("display_errors",0);
    session_start();
    define('SOURCE_PATH', './assets/Retro_Clouds_VS.jpg');
    include("./config/Navigation.php");
    require("./config/config.php");
    include("./config/sidebar-cart.php");
    date_default_timezone_set('Asia/Manila');
    $currentDate = date('Y-m-d');
    $buyNow = ($_POST['buy-now'] == "true") ? true : false;
    if($buyNow) {
        $BuyNowCustomerID = $_POST['customer-id'];
        $BuyNowProductID = $_POST['product-id'];
        $BuyNowProductQuantity = $_POST['product-quantity'];
    }

    $sqlGetCartCount = "SELECT * FROM cart_tbl WHERE customer_id='{$_SESSION['customer_ID']}'";
    $result= $conn->query($sqlGetCartCount);
    $rows = $result ->num_rows;
    $setDisabled="";


    if($rows<=0){
        $setDisabled="disabled";
    }


    $sql = "SELECT * FROM customer_tbl WHERE costumer_id='{$_SESSION['customer_ID']}'";
    $result1 = $conn->query($sql);
    $rowResult1 = $result1->fetch_assoc();
    $_SESSION['email'] = $rowResult1['email'];
    $_SESSION['customerName'] =  $rowResult1['fname'] . " " . $rowResult1['lname'];
    ?>

    <form action="./process_payment.php" method="post" class="w-full max-w-full h-auto p-4 flex flex-col flex-wrap mobilemd:px-6 mobilelg:px-8 iphone:px-10 iphone:gap-4 sm:px-12 md:px-20 lg:p-28 lg:grid lg:grid-cols-2 lg:gap-8 xl:py-32 xl:px-20 xl:gap-14">
        <div class="w-full flex flex-1 flex-col flex-wrap lg:items-center xl:justify-between">
            <div class="w-full max-w-full h-[25vh] max-h-[25vh] flex items-end justify-end flex-wrap lg:h-[10vh] lg:max-h-[10vh]">
                <div class="flex flex-col flex-1 gap-1 items-start justify-start">
                    <h2 class="retro_clouds_h2 text-white uppercase text-2xl font-bold w-full xl:text-3xl laptopxxl:text-4xl">Checkout</h2>
                    <div class="w-full flex justify-start items-center gap-2 iphone:gap-4 xl:gap-8 laptopxxl:gap-12">
                        <h2 class="retro_clouds_h2 text-[#FF1695] uppercase text-sm font-medium iphone:text-base xl:text-lg laptopxxl:text-xl">Order Summary</h2>
                        <p class="retro_clouds_h2 text-[#FF1695] uppercase text-base font-medium iphone:text-lg xl:text-xl laptopxxl:text-2xl">|</p>
                        <h2 class="retro_clouds_h2 text-[#FF1695] uppercase text-sm font-medium iphone:text-base xl:text-lg laptopxxl:text-xl">Check Out Page</h2>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-full h-auto flex items-start justify-start flex-wrap my-4">
                <div class="border-t-2 border-b-2 border-white w-full flex flex-col items-start justify-start ">
                    <div action="" method="" class="w-full flex flex-col flex-wrap overflow-hidden">
                        <div class="w-full flex flex-1 flex-col items-start justify-start gap-4 my-8">
                            <div class="w-full flex flex-col items-start justify-start">
                                <h2 class="retro_clouds_h2 text-lg uppercase font-bold text-white sm:text-xl xl:text-[1.45rem] laptopxxl:2xl">Contact Information</h2>
                            </div>

                            <div class="w-full max-w-full grid grid-cols-2 grid-rows-1 gap-2 xl:gap-8">
                                <div class="col-span-1 gap-1 iphone:gap-2 xl:flex xl:items-start xl:justify-start xl:flex-col xl:gap-4">
                                    <input name="mobileNumber" type="text" name="mobileNumberTxt" class="w-full outline-none border-2 border-[#33FCFF] rounded-sm text-sm retro_clouds_h2 font-medium bg-[#ffffffb3] p-1 sm:text-base sm:p-1 sm:px-2 laptopxxl:p-2 laptopxxl:font-semibold">
                                    <label class="row-span-1 text-white retro_clouds_p font-semibold text-xs mobilelg:text-sm xl:text-base">Mobile Number</label>
                                </div>

                                <div class="col-span-1 gap-1 iphone:gap-2 xl:flex xl:items-start xl:justify-start xl:flex-col xl:gap-4">
                                    <input type="text" disabled name="email" value="<?php echo  $_SESSION['email'] ?>" class="w-full outline-none border-2 border-[#33FCFF] rounded-sm text-sm retro_clouds_p font-medium bg-[#ffffffb3] p-1 sm:text-base sm:p-2 sm:px-2" value="abscbn">
                                    <label class="row-span-1 text-white retro_clouds_p font-semibold text-xs mobilelg:text-sm xl:text-base">Email Address</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-full h-auto flex items-start justify-start flex-wrap my-4">
                <div class="w-full flex flex-1 flex-col items-start justify-start">
                    <div action="" class="w-full flex flex-col flex-wrap overflow-hidden">
                        <div class="w-full flex flex-1 flex-col items-start justify-start gap-4 xl:gap-8">
                            <div class="w-full flex flex-col items-start justify-start">
                                <h2 class="retro_clouds_h2 text-lg uppercase font-bold text-white sm:text-xl xl:text-[1.45rem] laptopxxl:text-2xl">Shipping Address</h2>
                            </div>

                            <div class="w-full flex flex-col items-start justify-start gap-1 xl:flex xl:items-start xl:justify-start xl:flex-col xl:gap-4">
                                <input name="address1" type="text" name="addressLineOneTxt" class="w-full outline-none border-2 border-[#33FCFF] rounded-sm text-sm retro_clouds_h2 font-medium bg-[#ffffffb3] p-1 sm:text-base sm:p-1 sm:px-2 laptopxxl:p-2 laptopxxl:font-semibold">
                                <label class="text-white retro_clouds_p font-semibold text-xs mobilelg:text-sm xl:text-base">Unit Number, House Number, Block, Lot</label>
                            </div>

                            <div class="w-full flex flex-col items-start justify-start gap-1 xl:flex xl:items-start xl:justify-start xl:flex-col xl:gap-4">
                                <input name="address2" type="text" name="addressLineTwoTxt" class="w-full outline-none border-2 border-[#33FCFF] rounded-sm text-sm retro_clouds_h2 font-medium bg-[#ffffffb3] p-1 sm:text-base sm:p-1 sm:px-2 laptopxxl:p-2 laptopxxl:font-semibold">
                                <label class="text-white retro_clouds_p font-semibold text-xs mobilelg:text-sm xl:text-base">Street, Barangay, City</label>
                            </div>

                            <div class="w-full flex flex-col items-start justify-start gap-1 xl:flex xl:items-start xl:justify-start xl:flex-col xl:gap-4">
                                <input name="address3" type="text" name="addressLineThreeTxt" class="w-full outline-none border-2 border-[#33FCFF] rounded-sm text-sm retro_clouds_h2 font-medium bg-[#ffffffb3] p-1 sm:text-base sm:p-1 sm:px-2 laptopxxl:p-2 laptopxxl:font-semibold">
                                <label class="text-white retro_clouds_p font-semibold text-xs mobilelg:text-sm xl:text-base">Land Mark and Other Description (Optional)</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-full overflow-x-hidden h-auto flex items-start justify-start flex-wrap my-4">
                <div class="w-full flex flex-col items-start justify-start xl:items-center xl:justify-between xl:flex-row">
                    <div class="w-[400px]">
                        <div class="w-full flex flex-col items-start justify-start gap-2 relative">
                            <div class="w-full">
                                <h2 class="retro_clouds_h2 text-lg uppercase font-bold text-[#33FCFF] w-full sm:text-xl laptopxxl:text-2xl">Delivery Options</h2>
                            </div>

                            <select name="deliverySelection" class="bg-[#1A1D3B] border-2  border-white rounded-full px-4 py-1 retro_clouds_h2 text-xs uppercase font-semibold text-white mobilemd:text-sm mobilelg:text-base iphone:w-full sm:py-2 sm:text-lg sm:tracking-wider xl:flex xl:w-full laptopxxl:rounded-md">
                                <!-- <option value="1" selected class="retro_clouds_h2 text-xs uppercase font-semibold mobilemd:text-sm mobilelg:text-base">Nearby Pick Up</option> -->
                                <option value="1" class="retro_clouds_h2 text-xs font-normal mobilemd:text-sm mobilelg:text-base">JRS Express</option>
                                <option value="2" class="retro_clouds_h2 text-xs font-normal mobilemd:text-sm mobilelg:text-base">JNT Express</option>
                                <option value="3" class="retro_clouds_h2 text-xs font-normal mobilemd:text-sm mobilelg:text-base">Lala Move</option>
                                <option value="4" class="retro_clouds_h2 text-xs font-normal mobilemd:text-sm mobilelg:text-base">Ninja Van</option>
                                <option value="5" class="retro_clouds_h2 text-xs font-normal mobilemd:text-sm mobilelg:text-base">LBC Express</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full flex flex-1 flex-col flex-wrap lg:items-center">
            <div class="bg-gradient-to-b from-[#FF1695] to-[#990D5A] rounded-sm w-full max-w-full h-auto flex items-start justify-start flex-wrap p-2 my-4 lg:w-[80%]  xl:h-[300px] xl:w-[420px] xl:max-w-[420px] xl:items-center xl:justify-between">
                <div class="flex flex-col items-start justify-start w-full lg:pt-30">
                    <div class="flex justify-center w-full mb-4">
                        <h2 class="retro_clouds_h2 text-lg uppercase font-bold text-white py-2 sm:text-xl">Order Summary</h2>
                    </div>
                    <?php 
                    if($buyNow) {
                        $getProductWithID = "SELECT * FROM products WHERE product_id = '$BuyNowProductID'";
                        $productWithIDResult = mysqli_query($conn, $getProductWithID);
                        $productWithIDRow = mysqli_fetch_assoc($productWithIDResult);
                    }
                    $getAllCartItemsSum = "SELECT *, SUM(price*product_quantity) as total_per_product FROM cart_tbl JOIN products ON cart_tbl.product_id = products.product_id WHERE customer_id='{$_SESSION['customer_ID']}' GROUP BY cart_tbl.product_id";
                    $allCartItemsSumResult = mysqli_query($conn, $getAllCartItemsSum);
                    $subTotal = 0;
                    $quantity = 0;
                    if(!$buyNow) {
                        while ($allCartItemsSumRow = mysqli_fetch_assoc($allCartItemsSumResult)) {
                            if($allCartItemsSumRow['sale'] == $currentDate) {
                                $subTotal += $allCartItemsSumRow['total_per_product']*0.78;
                            }
                            else {
                                $subTotal += $allCartItemsSumRow['total_per_product'];
                            }
                            $quantity += $allCartItemsSumRow['product_quantity'];
                        }
                        $shippingFee = ($quantity > 50) ? 45+$quantity : 45;
                        $total = $subTotal + $shippingFee;
                    } else {
                        $quantity = $BuyNowProductQuantity;
                        $subTotal = $productWithIDRow['price'] * $quantity;
                        $_SESSION['subtotal'] = $subTotal;
                        $shippingFee = ($quantity > 50) ? 45+$quantity : 45;
                        $total = $subTotal + $shippingFee;
                    }
                    ?>
                    <div class="w-full flex flex-col items-start justify-start px-4 py-1 gap-4 lg:gap-0">
                        <div class="border-b border-white w-full mb-4 flex">
                            <h2 class="w-full text-white retro_clouds_h2 uppercase font-semibold text-base mb-1 iphone:text-lg">Sub Total</h2>
                            <h2 class="w-full text-white retro_clouds_h2 uppercase font-semibold text-right mb-1 iphone:text-lg"><?php echo number_format($subTotal, 2) ?></h2>
                            <input name="subTotal" type="text" hidden value="<?php echo $subTotal ?>">
                        </div>
                        <div class="border-b border-white w-full mb-4 flex">
                            <h2 class="w-full text-white retro_clouds_h2 uppercase font-semibold text-base mb-1 iphone:text-lg">Shipping Fees</h2>
                            <h2 class="w-full text-white retro_clouds_h2 uppercase font-semibold text-right mb-1 iphone:text-lg"><?php echo number_format($shippingFee, 2) ?></h2>
                            <input name="shippingFee" type="text" hidden value="<?php echo $shippingFee ?>">
                        </div>
                        <div class="border-b border-white w-full mb-4 flex">
                            <h2 class="w-full text-white retro_clouds_h2 uppercase font-bold text-lg mb-4">Total</h2>
                            <h2 value="<?php echo number_format($total, 2) ?>" class="w-full text-white retro_clouds_h2 uppercase font-bold text-lg mb-4 text-right"><?php echo number_format($total, 2) ?></h2>
                            <input name="amount" type="text" hidden value="<?php echo $total ?>">
                            <input type="hidden" name="description" id="description" class="w-full outline-none border-2 border-[#33FCFF] rounded-sm text-sm retro_clouds_p font-medium bg-[#ffffffb3] p-1" value="<?php echo "Retro Clouds Order Payment - {$_SESSION['customerName']}" ?>">
                        </div>

                        <button type="submit" id="confirm-order-section" class="bg-gradient-to-r from-[#1A1D3B] to-[#474FA1] w-full p-2 text-center text-white retro_clouds_h2 uppercase font-bold tracking-widest rounded-md" id="confirm-order-btn" <?php echo $setDisabled;?>>
                            <h2>Confirm Order</h2>
                        </button>

                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-b from-[#FF1695] to-[#1A1D3B] rounded-sm w-full max-w-full h-[40vh] flex items-start justify-start flex-wrap px-4 py-2 overflow-hidden overflow-y-scroll gap-4 iphone:h-[50vh] sm:h-[60vh] sm:p-6 md:px-12 lg:p-4 lg:w-[80%] lg:h-[50vh] xl:h-[490px] xl:w-[420px] xl:max-w-[420px] xl:max-h-[490px] xl:p-8">
                <div class="w-full flex flex-col items-start justify-start border-b-2 border-white lg:justify-center lg:items-center">
                    <h2 class="retro_clouds_h2 text-lg uppercase font-bold text-[#33FCFF] py-2 sm:text-xl">Your Order</h2>
                </div>

                <?php 
                    $getAllCartItems = "SELECT * FROM cart_tbl JOIN products ON cart_tbl.product_id = products.product_id WHERE customer_id='{$_SESSION['customer_ID']}'";
                    $allCartItemsResult = mysqli_query($conn, $getAllCartItems);
                    if(!$buyNow) {
                        while($allCartItemsRow = mysqli_fetch_assoc($allCartItemsResult)) {
                            $name = $allCartItemsRow['product_name'];
                            $nameExt = ($allCartItemsRow['flavor'] == "NULL" || $allCartItemsRow['flavor'] == "N/A") ? $allCartItemsRow['color'] : $allCartItemsRow['flavor'];
                            $size = ($allCartItemsRow['bottle_size'] == "NULL" || $allCartItemsRow['bottle_size'] == "N/A") ? "" : $allCartItemsRow['bottle_size'];
                            $price = ($allCartItemsRow['sale'] == $currentDate) ? number_format($allCartItemsRow['price']*0.78, 2)." (SALE!)" : number_format($allCartItemsRow['price'], 2);
                            $quantity = $allCartItemsRow['product_quantity'];
                            $image = $allCartItemsRow['img_dir'];
                        ?>
                        <div class="w-full flex items-start justify-start gap-4 border-b border-white p-2">
                            <div class="w-full h-auto flex items-start justify-start gap-4 lg:grid lg:grid-cols-2 lg:items-center lg:justify-center">
                                <div class="bg-transparent w-1/2 p-2 flex items-center justify-center lg:w-full lg:p-0">
                                    <img src="./assets/catalog/<?php echo $image ?>" class="aspect-square object-contain w-[58%] md:w-[50%] lg:w-full lg:p-2 lg:h-full xl:w-[150px]">
                                </div>

                                <div class="w-full flex flex-1 flex-col justify-between gap-4 xl:h-full xl:items-center xl:justify-end xl:gap-8">
                                    <div class="w-full flex flex-col items-start justify-start mt-0.5 lg:gap-4 xl:justify-center xl:items-center">
                                        <h2 class="retro_clouds_h2 text-white uppercase text-sm font-semibold lg:text-center w-full xl:text-base"><?php echo $name ?></h2>
                                        <p class="retro_clouds_h2 text-white uppercase text-sm font-medium lg:text-center w-full xl:text-base"><?php echo $nameExt ?></p>
                                    </div>

                                    <div class="w-full flex flex-1 items-start justify-between">
                                        <p class="retro_clouds_p text-white uppercase text-xs font-normal lg:text-sm lg:font-semibold">Qty: <?php echo $quantity ?></p>
                                        <p class="retro_clouds_p text-white uppercase text-xs font-normal lg:text-sm lg:font-semibold">P <?php echo $price ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        }
                    } else {
                        if($productWithIDRow['flavor'] == "NULL" || $productWithIDRow['flavor'] == "N/A") {
                            $nameExt = $productWithIDRow['color'];
                        } else {
                            $nameExt = $productWithIDRow['flavor'];
                        }
                ?>
                        <div class="w-full flex items-start justify-start gap-4 border-b border-white p-2">
                            <div class="w-full h-auto flex items-start justify-start gap-4 lg:grid lg:grid-cols-2 lg:items-center lg:justify-center">
                                <div class="bg-transparent w-1/2 p-2 flex items-center justify-center lg:w-full lg:p-0">
                                    <img src="./assets/catalog/<?php echo $productWithIDRow['img_dir'] ?>" class="aspect-square object-contain w-[58%] md:w-[50%] lg:w-full lg:p-2 lg:h-full xl:w-[150px]">
                                </div>

                                <div class="w-full flex flex-1 flex-col justify-between gap-4 xl:h-full xl:items-center xl:justify-end xl:gap-8">
                                    <div class="w-full flex flex-col items-start justify-start mt-0.5 lg:gap-4 xl:justify-center xl:items-center">
                                        <h2 class="retro_clouds_h2 text-white uppercase text-sm font-semibold lg:text-center w-full xl:text-base"><?php echo $productWithIDRow['product_name'] ?></h2>
                                        <p class="retro_clouds_h2 text-white uppercase text-sm font-medium lg:text-center w-full xl:text-base"><?php echo $nameExt ?></p>
                                    </div>

                                    <div class="w-full flex flex-1 items-start justify-between">
                                        <p class="retro_clouds_p text-white uppercase text-xs font-normal lg:text-sm lg:font-semibold">Qty: <?php echo $BuyNowProductQuantity ?></p>
                                        <p class="retro_clouds_p text-white uppercase text-xs font-normal lg:text-sm lg:font-semibold">P <?php echo $productWithIDRow['price'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php 
                    }
                ?>
            </div>
        </div>
        <input type="hidden" name="remarks" class="w-full outline-none border-2 border-[#33FCFF] rounded-sm text-sm retro_clouds_p font-medium bg-[#ffffffb3] p-1" value="payment">
    </form>
    <?php
    require("./config/Footer.php");
    define('SOURCE_FOOTER', './assets/Retro_Clouds_VS.jpg');
    footer();
    ?>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d870978cd1.js" crossorigin="anonymous"></script>
    <!-- Ionic Icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>