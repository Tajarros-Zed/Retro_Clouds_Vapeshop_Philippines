<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sales Dashboard</title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="./sales.css">
    <link rel="shortcut icon" href="../assets/Favicon_Retro.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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

<body class="bg-[#1A1D3B]">
    <?php
    define('SOURCE_PATH', '../assets/Retro_Clouds_VS.jpg');
    include("./adminNav.php");
    include "../config/config.php";
    $getAllProducts = "SELECT * FROM products JOIN inventory_tbl ON products.product_id = inventory_tbl.item_id";

    $getYearRange = "SELECT 
    DATE_FORMAT(transaction_date, '%Y') AS order_year,
    MIN(DATE_FORMAT(transaction_date, '%Y')) AS min_year,
    MAX(DATE_FORMAT(transaction_date, '%Y')) AS max_year
    FROM transaction_tbl";
    $yearRange = mysqli_query($conn, $getYearRange);
    $yearRangeRow = mysqli_fetch_assoc($yearRange);
    ?>

    <form action="">
        <div class="w-full max-w-full h-auto flex flex-col items-start justify-start flex-wrap">
            <!-- Header -->
            <div class="w-full flex items-center justify-start p-4 gap-2 mobilemd:p-6 mobilelg:px-8 sm:px-8 md:px-10 py-8">
                <img src="../../frontend/assets/Catalog/logos/Retro_Clouds_VS.jpg" class="h-auto w-[80px] mix-blend-lighten">
                <h1 class="setTourney text-2xl uppercase font-semibold">Retro Clouds</h1>
            </div>

            <div class="w-full flex flex-col items-start justify-start flex-wrap gap-4 p-4 mobilemd:p-6 mobilelg:px-8 sm:px-8 md:px-10 lg:px-12 md:grid md:grid-cols-2 lg:gap-8 xl:px-14 xl:gap-14 laptopxxl:px-16 laptopxxl:gap-20 2xl:px-20 2xl:gap-28">
                <!-- Right Side in Large Scale -->
                <div class="w-full flex flex-1 flex-col items-start justify-start">
                    <div class="w-full flex flex-col items-start justify-start gap-4 lg:gap-6">
                        <div class="w-full flex flex-col items-center justify-center">
                            <h1 class="setPoppins text-white text-[1.7rem] uppercase font-bold w-full text-center">Sales Dashboard</h1>
                            <h2 class="setOpenSans text-[#33FCFF] text-sm uppercase font-normal w-full text-center">Retro Clouds Vape Lounge</h2>
                            <div class="w-full flex items-start justify-between gap-4 my-4">
                                <select name="" id="month" class="w-full ouline-none bg-[#1A1D3B] border border-white rounded-full p-2 setPoppins text-white text-center text-sm uppercase font-semibold">
                                    <option value="" selected>Month</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>

                                <select name="" id="year" class="w-full ouline-none bg-[#1A1D3B] border border-white rounded-full p-2 setPoppins text-white text-center text-sm uppercase font-semibold">
                                    <option value="" selected>Year</option>
                                    <?php 
                                        for($x = $yearRangeRow['min_year']; $x <= $yearRangeRow['max_year']; $x++) {
                                            echo "
                                                <option value='$x'>$x</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="w-full bg-gradient-to-b from-[#FF1695] to-[#990D5A] rounded-xl border-2 border-[#33FCFF] flex flex-col items-start justify-start p-4">
                            <div class="w-full flex flex-col items-center justify-start gap-4">
                                <h1 class="w-full setPoppins text-white uppercase font-bold text-xl text-center">Product Categories</h1>
                                <div data-value="3" class="category cursor-pointer w-full setOpenSans text-base text-white uppercase font-semibold text-center  bg-gradient-to-b from-[#33FCFF] to-[#990D5A] px-2 py-3 border-2 border-white rounded-lg">Vape Pods</div>
                                <div data-value="2" class="category cursor-pointer w-full setOpenSans text-base text-white uppercase font-semibold text-center  bg-gradient-to-b from-[#33FCFF] to-[#990D5A] px-2 py-3 border-2 border-white rounded-lg">Vape Juices</div>
                                <div data-value="1" class="category cursor-pointer w-full setOpenSans text-base text-white uppercase font-semibold text-center  bg-gradient-to-b from-[#33FCFF] to-[#990D5A] px-2 py-3 border-2 border-white rounded-lg">Disposables</div>
                                <!-- <div id="category-input">
                                    <input type="hidden" id="category" value="">
                                </div> -->
                            </div>
                        </div>

                        <div class="w-full max-w-full flex flex-1 flex-col items-start justify-start flex-wrap gap-4 md:grid md:grid-cols-2">
                            <div class="w-full bg-gradient-to-b from-[#FF1695] to-[#990D5A] rounded-xl border-2 border-[#33FCFF] flex flex-col items-start justify-start p-4 md:h-[145px] md:max-h-[145px] md:items-center md:justify-center lg:h-[150px] lg:max-h-[150px]">
                                <div id="total-sales" class="w-full flex flex-col items-center justify-start gap-4">
                                    <?php require "sales-totalsales.php" ?>
                                </div>
                            </div>

                            <div class="w-full bg-gradient-to-b from-[#FF1695] to-[#990D5A] rounded-xl border-2 border-[#33FCFF] flex flex-col items-start justify-start p-4 md:h-[145px] md:max-h-[145px] md:items-center md:justify-center lg:h-[150px] lg:max-h-[150px] ">
                                <div id="total-profit" class="w-full flex flex-col items-center justify-start gap-4">
                                    <?php require "sales-totalprofit.php" ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Left Side in Large Scale  -->
                <div class="w-full flex flex-1 flex-col justify-center items-center flex-wrap">
                    <div class="w-full flex flex-1 justify-center items-center flex-col gap-4">
                    <!--     <div class="w-full bg-gradient-to-b from-[#FF1695] to-[#990D5A] rounded-xl border-2 border-[#33FCFF] flex flex-col items-start justify-start gap-4 p-4 md:gap-2 md:p-2">
                            <div class="w-full flex items-center justify-between">
                                <a href="" class="w-full setPoppins text-sm text-[#33FCFF] text-center uppercase font-semibold">Sales Type</a>
                                <a href="" class="w-full setPoppins text-sm text-[#33FCFF] text-center uppercase font-semibold">Payment Mode</a>
                            </div>

                            <div class="w-full flex flex-col items-center justify-center">
                                Sales and Payment Mode  
                                <div class="w-[130px] h-[130px] bg-[#1A1D3B] rounded-full md:w-[100px] md:h-[100px] lg:w-[110px] lg:h-[110px]"></div>
                            </div>

                            <div class="w-full flex items-center justify-evenly">
                                <div class="w-full flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-square-full text-[#33FCFF]"></i>
                                    <h1 class="setPoppins text-white text-base text-center uppercase font-bold tracking-wider">Online</h1>
                                </div>

                                <div class="w-full flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-square-full text-[#1A1D3B]"></i>
                                    <h1 class="setPoppins text-white text-base text-center uppercase font-bold tracking-wider">Cash</h1>
                                </div>
                            </div>
                        </div> -->

                        <div class="w-full bg-gradient-to-b from-[#FF1695] to-[#990D5A] rounded-xl border-2 border-[#33FCFF] flex flex-col items-start justify-start p-4">
                            <!-- Profit Percentage -->
                            <div id="profit-percentage" class="w-full flex flex-col items-center justify-center gap-4">
                                <?php require "sales-profitpercentage.php" ?>
                            </div>
                        </div>

                        <div class="w-full h-auto flex items-start justify-start gap-2 lg:col-span-2">
                            <div id="best-selling" class="w-full h-[30vh] max-h-[30vh] overflow-hidden flex flex-col items-center justify-evenly gap-2 bg-gradient-to-b from-[#FF1695] to-[#990D5A] rounded-xl border-2 border-[#33FCFF] p-2">
                                <?php require "sales-bestselling.php" ?>
                            </div>

                            <div id="top-category" class="w-full h-[30vh] flex flex-col items-center justify-evenly gap-4 overflow-hidden bg-gradient-to-b from-[#FF1695] to-[#990D5A] rounded-xl border-2 border-[#33FCFF] p-2">
                                <?php require "sales-topcategory.php" ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d870978cd1.js" crossorigin="anonymous"></script>
    <!-- External JavaScript -->
</body>

</html>
<script>
    $(document).ready(function () {
        var category = "";
        $('.category').click(function(e) {
            const month = document.getElementById('month').value;
            const year = document.getElementById('year').value;
            category = e.target.dataset.value;
            console.log(category);
            updateSales(month, year, category);
        });
        $('#month').change(function(e) {
            const month = document.getElementById('month').value;
            const year = document.getElementById('year').value;
            category = e.target.dataset.value;
            updateSales(month, year, category);
        });
        $('#year').change(function(e) {
            const month = document.getElementById('month').value;
            const year = document.getElementById('year').value;
            category = e.target.dataset.value;
            updateSales(month, year, category);
        });
    });

    function updateSales(month, year, category) {
        $('#total-sales').load('sales-totalsales.php', { month: month, year: year, category: category });
        $('#total-profit').load('sales-totalprofit.php', { month: month, year: year, category: category });
        $('#profit-percentage').load('sales-profitpercentage.php', { month: month, year: year, category: category });
        $('#best-selling').load('sales-bestselling.php', { month: month, year: year, category: category });
        $('#top-category').load('sales-topcategory.php', { month: month, year: year });
    }
</script>