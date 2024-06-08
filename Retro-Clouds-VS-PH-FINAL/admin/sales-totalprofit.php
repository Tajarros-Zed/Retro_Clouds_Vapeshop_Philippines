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
$totalProfit = $totalSales- $totalCapital;
?>
<h1 class="w-full setPoppins text-xl text-white text-center uppercase font-bold"><i
        class="fa-solid fa-chart-line mr-4"></i>Total Profit</h1>
<h2 class="w-full setOpenSans text-lg text-[#33FCFF] font-semibold text-center">₱ <?php echo number_format($totalProfit, 2) ?></h2>
<script>
    $(document).ready(function () {
        $('#product-search').click(function (e) {
            console.log("SEARCH");
            const search = document.getElementById('search-value');
            $('#products-section').load('management-product.php', { searchValue: search.value });
        });
    });
</script>