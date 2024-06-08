<?php
session_start();
require_once "config/config.php";
date_default_timezone_set('Asia/Manila');
$currentDate = new DateTime();
$currentDateStr = $currentDate->format('Y-m-d');
$_SESSION['customer_ID'] = $_SESSION['customer_ID'] ?? "0";
$customerID = $_SESSION['customer_ID'];


//Deal of the day
$getAllProducts = "SELECT * FROM products WHERE sale = '$currentDateStr'";
$result = mysqli_query($conn, $getAllProducts);
$saleDiscount = 0.22;
//get deal
if (mysqli_num_rows($result) > 0) {
    $item = mysqli_fetch_assoc($result);
    $dealId = $item['product_id'];
    $dealNameExt = ($item['flavor'] == "NULL" || $item['flavor'] == "N/A") ? $item['color'] : $item['flavor'];
    $dealName = $item['product_name'] . " " . $dealNameExt;
    $dealPrice = "P " . number_format($item['price'], 2);
    $dealDiscountedPrice = "P " . number_format($item['price'] * (1 - $saleDiscount), 2);
    $dealImg = $item['img_dir'];
} else {
    $saleCounter = 0;
    $getAllProducts = "SELECT * FROM products";
    $result = mysqli_query($conn, $getAllProducts);
    $randomDeal = rand(0, mysqli_num_rows($result) - 1);
    while ($item = mysqli_fetch_assoc($result)) {
        if ($saleCounter == $randomDeal) {
            $updateItemSale = "UPDATE products SET sale='$currentDateStr' WHERE product_id='{$item['product_id']}'";
            mysqli_query($conn, $updateItemSale);
            $dealId = $item['product_id'];
            $dealNameExt = ($item['flavor'] == "NULL" || $item['flavor'] == "N/A") ? $item['color'] : $item['flavor'];
            $dealName = $item['product_name'] . " " . $dealNameExt;
            $dealPrice = "P " . number_format($item['price'], 2);
            $dealDiscountedPrice = "P " . number_format($item['price'] * (1 - $saleDiscount), 2);
            $dealImg = $item['img_dir'];
            break;
        }
        $saleCounter++;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Clouds PH - Catalog</title>
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/catalog.css">
    <link rel="stylesheet" href="./styles/catalog-popup.css">
    <link rel="shortcut icon" href="./assets/Favicon_Retro.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/timer.js" defer></script>
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/home.css">
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
<div id="cart-process"></div>

<body class="bg-[#1A1D3B] select-none" id="scroll-top">
    <!-- Navigation -->
    <?php
        require("./config/database.php");
        define('SOURCE_PATH', './assets/Retro_Clouds_VS.jpg');
        include("./config/Navigation.php");
        include("./config/sidebar-cart.php");

    ?>
    <div id="popup-section">

    </div>
    <!-- Hero Section -->
    <div
        class="bg-[#1A1D3B] w-full max-w-full h-[60vh] min-h-[60vh] flex items-start justify-start iphone:h-[65vh] lg:h-[75vh] lg:max-h-[75vh] lg:px-12 lg:py-4 xl:px-14 xl:h-[85vh] xl:max-h-[85vh] laptopxxl:h-[90vh] laptopxxl:max-h-[90vh] laptopxxl:px-28 2xl:h-[95vh] 2xl:max-h-[95vh] 2xl:px-32">
        <div class="bg-transparent w-full max-w-full h-full max-h-full relative flex">
            <div
                class="retro_clouds_carousel absolute bottom-0 w-full flex justify-start items-center bg-transparent z-10 px-4 sm:px-8">
            </div>
            <div class="absolute top-0 left-0 w-full h-[100%] object-cover mobilemd:px-6">
                <img src="./assets/catalog-carousel-2.png"
                    class="cursor-pointer retro_clouds_carousel_img absolute top-0 left-0 w-full h-full object-cover">
                <img src="./assets/catalog-carousel-3.png"
                    class="cursor-pointer retro_clouds_carousel_img absolute top-0 left-0 w-full h-full object-cover">
                <img src="./assets/catalog-carousel-4.png"
                    class="cursor-pointer retro_clouds_carousel_img absolute top-0 left-0 w-full h-full object-cover">
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div
        class="retro_clouds_bg_gradient w-full max-w-full h-auto py-8 px-4 flex items-center justify-center flex-wrap flex-col mobilemd:px-6 sm:px-0 sm:justify-start sm:items-start">
        <div
            class="flex flex-0 flex-col w-full h-auto flex-wrap gap-4 lg:grid lg:grid-cols-2 lg:items-end lg:justify-center">
            <div
                class="w-full flex flex-1 justify-between items-center gap-4 iphone:justify-start sm:pt-14 sm:px-14 lg:grid lg:grid-rows-1 lg:py-8 lg:px-12 lg:gap-6 xl:px-14 laptopxxl:ps-28 2xl:ps-32">
                <h2
                    class="retro_clouds_h2 uppercase text-white text-base font-black mobilemd:text-lg iphone:text-xl sm:text-2xl lg:col-span-2 lg:text-[2rem]">
                    Categories</h2>
                <div
                    class="flex flex-1 items-center justify-end gap-4 mobilemd:justify-around mobilemd:gap-2 iphone:justify-end iphone:gap-4 sm:gap-8 lg:col-span-1 laptopxxl:gap-12 2xl:gap-16">
                    <a href="#pods-section"
                        class="border border-[#fafafa] w-[40px] h-[40px] bg-[url(./assets/banner_one.png)] bg-cover bg-center rounded-full flex flex-col items-center justify-center object-cover mobilemd:w-[50px] mobilemd:h-[50px] iphone:w-[70px] iphone:h-[70px] sm:w-[80px] sm:h-[80px] lg:w-[120px] lg:h-[120px] xl:w-[140px] xl:h-[140px] 2xl:h-[160px] 2xl:w-[160px] 2xl:gap-0">
                        <img src="./assets/categ_pods.png" class="h-full">
                        <p
                            class="hidden retro_clouds_h2 laptopxxl:flex uppercase laptopxxl:text-xl font-bold text-[#fafafa] laptopxxl:z-10">
                            Pods Kit</p>
                    </a>
                    <a href="#disposables-section"
                        class="border border-[#fafafa] w-[40px] h-[40px] bg-[url(./assets/banner_one.png)] bg-cover bg-center rounded-full flex flex-col items-center justify-center object-cover mobilemd:w-[50px] mobilemd:h-[50px] iphone:w-[70px] iphone:h-[70px] sm:w-[80px] sm:h-[80px] lg:w-[120px] lg:h-[120px] xl:w-[140px] xl:h-[140px] 2xl:h-[160px] 2xl:w-[160px] 2xl:gap-0">
                        <img src="./assets/categ_dispo.png" class="h-full">
                        <p
                            class="hidden retro_clouds_h2 laptopxxl:flex uppercase laptopxxl:text-xl font-bold text-[#fafafa] laptopxxl:z-10">
                            Disposable</p>
                    </a>
                    <a href="#juices-section"
                        class="border border-[#fafafa] w-[40px] h-[40px] bg-[url(./assets/banner_one.png)] bg-cover bg-center rounded-full flex flex-col items-center justify-center object-cover mobilemd:w-[50px] mobilemd:h-[50px] iphone:w-[70px] iphone:h-[70px] sm:w-[80px] sm:h-[80px] lg:w-[120px] lg:h-[120px] xl:w-[140px] xl:h-[140px] 2xl:h-[160px] 2xl:w-[160px] 2xl:gap-0">
                        <img src="./assets/categ_juice.png" class="h-full">
                        <p
                            class="hidden retro_clouds_h2 laptopxxl:flex uppercase laptopxxl:text-xl font-bold text-[#fafafa] laptopxxl:z-10">
                            Juice</p>
                    </a>
                </div>
            </div>

            <!-- Sort By -->
            <div
                class="w-full max-w-full h-auto flex items-center justify-center flex-wrap py-4 mobilemd:py-2 sm:pb-14 sm:px-14 lg:col-span-1 lg:py-8 lg:pe-12 xl:pe-14 laptopxxl:pe-28 2xl:pe-32">
                <form action="" method="post"
                    class="w-full max-w-full flex items-center justify-center laptopxxl:justify-end">
                    <select name="" id="catalog-sort"
                        class="cursor-pointer w-full outline-none border border-[#33FCFF] bg-[#1A1D3B] rounded-full text-white py-1 px-6 retro_clouds_p flex items-center justify-center mobilemd:py-2 md:py-4 laptopxxl:w-1/2 laptopxxl:px-14"
                        onchange="console.log(this.value)">
                        <option value="price ASC">Price Low to High</option>
                        <option value="price DESC">Price High to Low</option>
                        <option value="product_name ASC">Alphabetical A-Z</option>
                        <option value="product_name DESC">Alphabetical Z-A</option>
                    </select>
                </form>
            </div>
        </div>
        <!-- Deals -->
        <div
            class="bg-[url(../assets/img_divider_three.png)] bg-cover bg-bottom bg-fixed flex flex-1 flex-col items-center justify-center w-full max-w-full mb-8 py-6 px-4 gap-4 mobilemd:px-6 mobilelg:bg-top lg:py-8 laptopxxl:gap-8 laptopxxl:py-14 2xl:px-32">
            <h2
                class="retro_clouds_h2 uppercase text-xl font-bold text-white iphone:text-2xl iphone:tracking-widest lg:text-[2rem]">
                Deals of the Day</h2>
            <div
                class="w-[280px] max-w-[280px] flex flex-1 flex-col flex-wrap iphone:w-[290px] iphone:max-w-[290px] sm:w-[320px] sm:max-w-[320px] md:w-[350px] md:max-w-[350px] lg:w-[600px] lg:max-w-[600px] xl:w-[650px] xl:max-w-[650px] laptopxxl:w-[700px] laptopxxl:max-w-[700px]">
                <div class="flex items-center justify-center bg-[#1A1D3B] w-full border border-[#FF1695]">
                    <div class="flex flex-col gap-4 p-4 w-full md:p-6 lg:grid lg:grid-cols-2 laptopxxl:p-8 2xl:gap-8">
                        <div class="w-full flex-col flex items-center justify-center">
                            <div
                                class="flex flex-col relative items-center justify-center bg-[#1A1D3B] w-full m-[1px] border border-[#33FCFF]">
                                <img src="./assets/catalog/<?php echo $dealImg ?>"
                                    class="h-auto w-[120px] p-4 md:p-6 md:w-[55%]">
                                <div class="absolute bottom-0 w-full bg-[#FF1695] border-t border-[#33FCFF]">
                                    <div id="quick-view"
                                        class="retro_clouds_h2 cursor-pointer w-full text-center p-1 flex items-center justify-center font-black text-sm uppercase iphone:text-base lg:text-lg lg:p-2">
                                        Quick View</div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col w-full items-start justify-center gap-4 2xl:gap-6">
                            <input id="deal-id" type="text" hidden value="<?php echo $dealId ?>">
                            <input id="deal-name" type="text" hidden value="<?php echo $dealName ?>">
                            <h2 class="retro_clouds_h2 w-full text-white text-lg font-semibold lg:text-2xl">
                                <?php echo $dealName ?>
                            </h2>
                            <div class="flex gap-2 w-full max-w-full items-center justify-center lg:justify-start">
                                <p
                                    class="retro_clouds_p w-full text-[#6f6f6f] text-sm font-medium line-through lg:w-1/3">
                                    <?php echo $dealPrice ?>
                                </p>
                                <p
                                    class="retro_clouds_p w-full text-white text-base font-semibold lg:text-xl lg:font-bold lg:w-1/2">
                                    <?php echo $dealDiscountedPrice ?>
                                </p>
                            </div>

                            <div
                                class="flex flex-col w-full items-start justify-center gap-4 lg:items-start lg:justify-start">
                                <h2 class="retro_clouds_h2 text-white text-base font-bold uppercase lg:text-lg">Offers
                                    end in:</h2>
                                <div class="w-full flex gap-6 items-start justify-start lg:justify-between">
                                    <div
                                        class="flex items-start justify-start flex-col lg:p-2 lg:bg-[#33FCFF] rounded-md">
                                        <p class="retro_clouds_ph text-lg text-[#FF1695] font-bold w-[100%] text-left lg:text-2xl lg:text-center"
                                            id="hours">00</p>
                                        <span
                                            class="retro_clouds_ph text-sm text-[#33FCFF] font-semibold iphone:text-base lg:text-[#1A1D3B] lg:font-bold">Hours</span>
                                    </div>

                                    <div
                                        class="flex items-start justify-start flex-col lg:p-2 lg:bg-[#33FCFF] rounded-md">
                                        <p class="retro_clouds_ph text-lg text-[#FF1695] font-bold w-[100%] text-left lg:text-2xl lg:text-center"
                                            id="minutes">00</p>
                                        <span
                                            class="retro_clouds_ph text-sm text-[#33FCFF] font-semibold iphone:text-base lg:text-[#1A1D3B] lg:font-bold">Minutes</span>
                                    </div>

                                    <div
                                        class="flex items-start justify-start flex-col lg:p-2 lg:bg-[#33FCFF] rounded-md">
                                        <p class="retro_clouds_ph text-lg text-[#FF1695] font-bold w-[100%] text-left lg:text-2xl lg:text-center"
                                            id="seconds">00</p>
                                        <span
                                            class="retro_clouds_ph text-sm text-[#33FCFF] font-semibold iphone:text-base lg:text-[#1A1D3B] lg:font-bold">Seconds</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vape Pods -->
    <div class="bg-[#1A1D3B] w-full max-w-full h-auto px-4 flex items-center justify-center flex-wrap flex-col gap-4 py-12 mobilemd:px-6 sm:px-14 sm:gap-8 lg:px-12 lg:grid lg:grid-cols-3 lg:grid-rows-1 lg:gap-14 xl:px-14 laptopxxl:px-28 2xl:px-32"
        id="pods-section">
        <?php include "catalog-podkits.php" ?>
    </div>

    <!-- Vape Disposable -->
    <div class="bg-[#1A1D3B] w-full max-w-full h-auto px-4 flex items-center justify-center flex-wrap flex-col gap-4 py-12 mobilemd:px-6 sm:px-14 sm:gap-8 lg:px-12 lg:grid lg:grid-cols-3 lg:grid-rows-1 lg:gap-14 xl:px-14 laptopxxl:px-28 2xl:px-32"
        id="disposables-section">
        <?php require "catalog-disposables.php" ?>
    </div>

    <!-- Vape Juice -->
    <div class="bg-[#1A1D3B] w-full max-w-full h-auto px-4 flex items-center justify-center flex-wrap flex-col gap-4 py-12 mobilemd:px-6 sm:px-14 sm:gap-8 lg:px-12 lg:grid lg:grid-cols-3 lg:grid-rows-1 lg:gap-14 xl:px-14 laptopxxl:px-28 2xl:px-32"
        id="juices-section">
        <?php require "catalog-juices.php" ?>
    </div>

    <div
        class="retro_clouds_bg_gradient w-full max-w-full h-[30vh] max-h-[30vh] px-4 py-16 flex items-start justify-start flex-wrap iphone:items-center iphone:justify-center iphone:py-0 laptopxxl:h-[60vh] laptopxxl:max-h-[60vh] laptopxxl:px-14">
        <div class="customDivider w-full max-w-full h-full iphone:h-[20vh] laptopxxl:h-[45vh]">

        </div>
    </div>

    <?php
    require ("./config/Footer.php");
    define('SOURCE_FOOTER', './assets/Retro_Clouds_VS.jpg');
    footer();
    ?>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d870978cd1.js" crossorigin="anonymous"></script>
    <!-- External JavaScript -->
    <script src="./js/catalog.js"></script>
    <!-- <script src="js/catalogButtons.js"></script> -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!--  -->
    <script>
    </script>
    <script>
        $(document).ready(function () {
            window.addEventListener('resize', function () {
                updateCatalog();
            });
            $('#catalog-sort').click(function (e) {
                updateCatalog();
                // var filterType = e.target.value;
                // var limit = 8;
                // if (window.innerWidth <= 1399 && window.innerWidth >= 1024) {
                //     limit = 6;
                // } else if (window.innerWidth < 1024) {
                //     limit = 4;
                // }
                // $('#pods-section').load('catalog-podkits.php', { limit: limit, filterType: filterType });
                // $('#disposables-section').load('catalog-disposables.php', { limit: limit, filterType: filterType });
                // $('#juices-section').load('catalog-juices.php', { limit: limit, filterType: filterType });
            });
            updateCatalog();
            function updateCatalog() {
                var filterType = document.getElementById('catalog-sort').value;
                var limit = 8;
                if (window.innerWidth <= 1399 && window.innerWidth >= 1024) {
                    limit = 6;
                } else if (window.innerWidth < 1024) {
                    limit = 4;
                }
                $('#pods-section').load('catalog-podkits.php', { limit: limit, filterType: filterType });
                $('#disposables-section').load('catalog-disposables.php', { limit: limit, filterType: filterType });
                $('#juices-section').load('catalog-juices.php', { limit: limit, filterType: filterType });
            }
        });
    </script>
</body>

</html>
<script>
    $(document).ready(function () {
        $('#quick-view').click(function (e) {
            var productName = document.querySelector('#deal-name').value;
            var productId = document.querySelector('#deal-id').value;
            // console.log("CLICKED");
            $('#popup-section').load('catalog-popup.php', {
                productName: productName,
                productId: productId,
                deal: true
            });
        });
    });
</script>