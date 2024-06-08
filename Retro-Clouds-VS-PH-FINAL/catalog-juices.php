<?php
date_default_timezone_set('Asia/Manila');
$currentDate = date('Y-m-d');
$page = $_POST['page'] ?? "1";
$limit = $_POST['limit'] ?? "8";
$filterType = $_POST['filterType'] ?? "price ASC";
$productStart = 0 + ($limit * ($page - 1));
require "config/config.php";
$getAllJuices = "SELECT * FROM products WHERE category_id = '2' GROUP BY product_name ORDER BY $filterType";
$allJuices = mysqli_query($conn, $getAllJuices);
$getAllJuicesSorted = "SELECT * FROM products WHERE category_id = '2' GROUP BY product_name ORDER BY $filterType LIMIT $productStart, $limit";
$allJuicesSorted = mysqli_query($conn, $getAllJuicesSorted);
$rows = mysqli_num_rows($allJuices);
$pages = number_format($rows/$limit);
?>
<div class="flex flex-1 flex-col w-full max-w-full h-auto lg:col-span-3">
    <div class="w-full flex justify-between items-center h-auto">
        <h1
            class="retro_clouds_h2 uppercase font-bold text-xl tracking-wider text-white iphone:text-2xl iphone:tracking-widest lg:text-4xl">
            Vape Juice</h1>
    </div>
</div>
<div
    class="retro_clouds_border_gradient w-full h-[1px] rounded-full relative bg-gradient-to-r from-[#33FCFF] to-[#FF1695] lg:col-span-3">
</div>

<div class="w-full flex items-start justify-start flex-col mt-2 lg:mt-0 lg:items-center lg:justify-center lg:h-full">
    <img src="./assets/juice-hero-banner.png" class="border border-[#FF1695] h-auto lg:h-full lg:object-cover">
</div>

<div
    class="w-full max-w-full h-auto grid grid-cols-2 grid-rows-2 gap-y-8 gap-x-4 mt-8 sm:gap-x-8 lg:col-span-2 lg:mt-0 lg:gap-4 lg:grid-cols-3 laptopxxl:grid-cols-4">
    <?php
    while ($allJuicesRow = mysqli_fetch_assoc($allJuicesSorted)) {
        ?>
        <div id="<?php echo $allJuicesRow['product_id'] ?>" data-value="<?php echo $allJuicesRow['product_name'] ?>"
            class='$juiceDisplay juices w-full h-full flex items-center justify-center flex-col border border-[#33FCFF] cursor-pointer customProd'>
            <img src='./assets/catalog/<?php echo $allJuicesRow['img_dir'] ?>'
                class='h-auto w-[55%] scale-125 mobilemd:w-[100px] mobilelg:w-[120px] iphone:w-[140px] sm:w-[150px] lg:w-[120px] laptopxxl:w-[150px]'
                style='width: 100%; aspect-ratio: 1; object-fit: contain'>
            <div class='mt-6 w-full p-2 h-auto flex flex-col gap-2 sm:px-4'>
                <h2 class='z-10 text-xs text-[#FF1695] font-black uppercase sm:text-sm customName'>
                    <?php echo $allJuicesRow['product_name'] ?>
                </h2>
                <p class='z-10 text-xs text-white font-medium sm:text-sm'>₱
                    <?php 
                        if($allJuicesRow['sale'] != $currentDate) {
                            $price = number_format($allJuicesRow['price'], 2);
                        } else {
                            $price = number_format($allJuicesRow['price']*0.78, 2) . " (SALE!)";
                        }
                        echo $price;
                    ?>
                </p>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<div class="w-full max-w-full flex flex-1 flex-col items-end justify-end flex-wrap lg:col-span-3">
    <div class="flex gap-2 items-end justify-end w-full mobilemd:gap-4">
        <?php
            for($x = 1; $x <= $pages; $x++) {
        ?>
        <div class='<?php if($x == $page) echo "bg-[#FF1695]" ?> juice-button customProd juice-buttons w-[20px] h-[20px] border border-[#FF1695] rounded-full flex items-center justify-center mobilemd:w-[30px] mobilemd:h-[30px]'
            style='cursor: pointer'>
            <a class='flex justify-center items-center'>
                <span
                    class='text-center text-[#33FCFF] text-xs font-semibold mobilemd:text-base'><?php echo $x ?></span>
            </a>
        </div>
        <?php
            }
        ?>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.juice-button').click(function (e) {
            $('#juices-section').load('catalog-juices.php', { page: e.target.innerText, limit: <?php echo $limit ?> });
        });
    });
    $('.juices').click(function (e) {
        var productName = e.currentTarget.dataset.value;
        var productId = e.currentTarget.id;
        console.log(productId);
        $('#popup-section').load('catalog-popup.php', { productName: productName, productId: productId });
    });
</script>