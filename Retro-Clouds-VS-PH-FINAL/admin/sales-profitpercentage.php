<?php
include "../config/config.php";
$yearFilter = (!empty($_POST['year'])) ? "= " . $_POST['year'] : "!= 0";
$monthFilter = (!empty($_POST['month'])) ? "= " . $_POST['month'] : "!= 0";
$categoryFilter = (!empty($_POST['category'])) ? "= " . $_POST['category'] : "!= 0";
if (isset($_POST['category'])) {
    if ($_POST['category'] == 1) {
        $category = "DISPOSABLE VAPES";
    } else if ($_POST['category'] == 2) {
        $category = "VAPE JUICES";
    } else if ($_POST['category'] == 3) {
        $category = "POD KITS";
    } else {
        $category = "PRODUCTS";
    }
} else {
    $category = "PRODUCTS";
}

$getTotalCapital = "SELECT 
    *,
    SUM(product_quantity*((price*0.80)-100)) as total_capital
FROM orders 
JOIN products ON orders.product_id = products.product_id
JOIN transaction_tbl ON orders.transaction_id = transaction_tbl.transaction_id
WHERE DATE_FORMAT(transaction_date, '%m') $monthFilter 
AND DATE_FORMAT(transaction_date, '%Y') $yearFilter
AND category_id $categoryFilter";
$totalCapitalResult = mysqli_query($conn, $getTotalCapital);

$getTotalSales = "SELECT 
    *,
    SUM(product_quantity*price) as total
FROM orders 
JOIN products ON orders.product_id = products.product_id
JOIN transaction_tbl ON orders.transaction_id = transaction_tbl.transaction_id
WHERE DATE_FORMAT(transaction_date, '%m') $monthFilter 
AND DATE_FORMAT(transaction_date, '%Y') $yearFilter
AND category_id $categoryFilter";
$totalSalesResult = mysqli_query($conn, $getTotalSales);

$totalSales = mysqli_fetch_assoc($totalSalesResult)['total'];
$totalCapital = mysqli_fetch_assoc($totalCapitalResult)['total_capital'];
$totalProfit = $totalSales - $totalCapital;
$totalProfitPercentage = ($totalSales > 0) ? ($totalProfit/$totalSales)*100 : 0;
?>
<h1 class="w-full setPoppins text-center text-xl text-white font-bold uppercase">Profit Percentage</h1>
<div class="pie-chart border-2 border-[#1A1D3B]" data-percent="30" style="
    width: 240px;
    height: 240px;
    background: conic-gradient(
        #33FCFF 0% calc(<?php echo $totalProfitPercentage ?> * 1%),
        transparent calc(<?php echo $totalProfitPercentage ?> * 1%) 100%
    ), conic-gradient(
        #A2162F 0% calc(<?php echo $totalProfitPercentage*-1 ?> * 1%),
        transparent calc(<?php echo $totalProfitPercentage*-1 ?> * 1%) 100%
    ), conic-gradient(
        #FFFF 0% calc(100 * 1%),
        transparent calc(100 * 1%) 100%
    );
    border-radius: 50%;
    position: relative;
">
    <h1 class="setPoppins" style="position: relative; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; font-weight: bold; font-size: 2rem; color: #1A1D3B; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8); transition: background 0.5s ease-in-out;"><?php echo number_format($totalProfitPercentage, 2) . "%" ?></h1>
</div>
<!-- <div class="pie-chart md:w-[100px] md:h-[100px] lg:w-[110px] lg:h-[110px]">
    <div class="slice one"></div>
    <div class="slice two"></div>
    <div class="slice three"></div>
</div> -->
<script>
    $(document).ready(function () {
        $('#product-search').click(function (e) {
            console.log("SEARCH");
            const search = document.getElementById('search-value');
            $('#products-section').load('management-product.php', { searchValue: search.value });
        });
    });
</script>