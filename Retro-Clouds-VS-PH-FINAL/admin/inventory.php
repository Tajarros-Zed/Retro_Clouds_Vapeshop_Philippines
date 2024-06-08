<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Clouds PH</title>
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="./sales.css">
    <link rel="shortcut icon" href="../assets/Favicon_Retro.png" type="image/x-icon">
    <style>
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background-color: #1A1D3B;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(#1A1D3B, #FF1695, #1A1D3B);
        }
    </style>
</head>

<body class="bg-[#1A1D3B]">
    <?php
    include_once "../config/config.php";
    define('SOURCE_PATH', '../assets/Retro_Clouds_VS.jpg');
    include("./adminNav.php");
    $sumAllProductPrice = "SELECT SUM(price * total_stock) AS total FROM products JOIN inventory_tbl ON products.product_id = inventory_tbl.item_id";
    $valueOfStock = mysqli_query($conn, $sumAllProductPrice);
    $valueOfStockRow = mysqli_fetch_assoc($valueOfStock);
    $sumAllProduct = "SELECT SUM(total_stock) AS total_stock FROM products JOIN inventory_tbl ON products.product_id = inventory_tbl.item_id";
    $stock = mysqli_query($conn, $sumAllProduct);
    $stockRow = mysqli_fetch_assoc($stock);
    $getStockPercentage = "SELECT *, ((total_stock/latest_stock_refill)*100) AS stock_percentage FROM products JOIN inventory_tbl ON products.product_id = inventory_tbl.item_id";
    $stockPercentage = mysqli_query($conn, $getStockPercentage);
    ?>

    <div class='flex items-center justify-center p-3 gap-2'>
        <img src="../assets/Retro_Clouds_VS.jpg" class="h-auto w-[50px] rounded-full mix-blend-lighten">
        <h1 class="retro_clouds_h1 uppercase font-bold text-2xl">Retro Clouds</h1>
    </div>

    <div class="w-full h-auto py-8 px-4 md:px-6 lg:p-10 lg:flex lg:flex-col lg:gap-8 xl:px-20 laptopxxl:px-28 laptopxxl:py-2 laptopxxl:gap-2 2xl:px-36">
        <div class="w-full h-[15vh] flex flex-col justify-center items-center gap-4 laptopxxl:gap-2 laptopxxl:flex-row laptopxxl:justify-between laptopxxl:h-[10vh]">
            <h1 class="text-[#fafafa] text-2xl poppins uppercase font-bold text-center lg:text-4xl xl:text-5xl laptopxxl:text-4xl">INVENTORY DASHBOARD</h1>
            <p class="text-[#33FCFF] uppercase lg:text-lg xl:font-semibold"> retro cloudes vape lounge</p>
        </div>

        <div class="w-full h-auto flex flex-col items-center justify-center gap-4 lg:gap-8 lg:grid lg:grid-cols-2 xl:gap-14 2xl:gap-24">
            <div class="w-full flex flex-col gap-4">
                <div class="bg-[#FF1695] w-full h-[35vh] rounded-xl border border-cyan-400 flex flex-col items-center justify-center gap-2">
                    <i class="fa-solid fa-sack-dollar text-white text-[3rem]"></i>
                    <h1 class="text-[#33FCFF] text-xl font-bold poppins">VALUE OF STOCK</h1>
                    <h1 class="text-[#fafafa] text-4xl font-bold poppins lg:font-black">&#x20B1; <?php echo number_format($valueOfStockRow['total'], 2) ?></h1>
                </div>

                <div class="bg-[#FF1695] w-full h-[35vh] rounded-xl border border-cyan-400 flex flex-col items-center justify-center gap-2">
                    <div class="flex gap-2 items-center justify-center flex-col">
                        <i class="fa-solid fa-box text-white text-[3rem]"></i>
                        <h1 class="text-[#33FCFF] text-xl font-bold poppins">TOTAL UNITS AVAILABLE</h1>
                    </div>
                    <h1 class="text-[#fafafa] text-4xl font-bold poppins lg:font-black"> <?php echo $stockRow['total_stock'] ?></h1>
                    <h1 class="text-[#fafafa] text-lg font-bold poppins uppercase">Inventory Items</h1>
                </div>
            </div>

            <div class="bg-[#FF1695] w-full h-[70vh] rounded-xl border border-cyan-400 flex flex-col items-center justify-center gap-2 p-4 lg:gap-8 lg:h-[73vh] lg:max-h-[73vh]">
                <h1 class="text-[#33FCFF] text-2xl font-bold poppins w-full text-center lg:text-3xl">INVENTORY PERCENTAGE</h1>
                <div class="w-full h-[70%] flex flex-col gap-3 overflow-y-scroll p-0 lg:h-[80%]">
                    <div class="w-full border-b-2 border-[#33FCFF] flex gap-2 lg:py-2 sticky top-0 bg-[#FF1695] p-0">
                        <h1 class="text-[#fafafa] text-sm font-bold poppins w-full lg:text-lg">Product Name</h1>
                        <p class="w-1/3 text-[#fafafa] text-sm font-bold text-right lg:text-lg">Stock Count</p>
                        <p class="w-1/3 text-[#fafafa] text-sm font-bold text-right lg:text-lg">Stock Percentage</p>
                    </div>

                    <?php
                    while ($stockPercentageRow = mysqli_fetch_assoc($stockPercentage)) {
                        $productNameExtend = ($stockPercentageRow['flavor'] == "NULL" || $stockPercentageRow['flavor'] == "N/A") ? $stockPercentageRow['color'] : $stockPercentageRow['flavor'];
                    ?>
                        <div class="w-full border-b-2 border-white flex gap-2 lg:py-2">
                            <h1 class="text-[#fafafa] text-sm font-bold poppins w-full lg:text-lg"><?php echo $stockPercentageRow['product_name'] . " " . $productNameExtend ?></h1>
                            <p class="w-1/3 text-[#33FCFF] text-sm font-bold text-right lg:text-lg"><?php echo number_format($stockPercentageRow['total_stock']); ?></p>
                            <p class="w-1/3 text-[#33FCFF] text-sm font-bold text-right lg:text-lg"><?php echo number_format($stockPercentageRow['stock_percentage'], 2) . "%" ?></p>
                        </div>

                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d870978cd1.js" crossorigin="anonymous"></script>
</body>

</html>