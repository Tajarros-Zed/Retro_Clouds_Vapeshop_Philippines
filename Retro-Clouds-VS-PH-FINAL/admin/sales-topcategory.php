<?php
include "../config/config.php";
$currentYear = date("Y");
$currentDay = date("d");
$currentMonth = date("m");

$yearFilter = (!empty($_POST['year'])) ? "= " . $_POST['year'] : "!= 0";
$monthFilter = (!empty($_POST['month'])) ? "= " . $_POST['month'] : "!= 0";

// $bestSellingFilter = "SELECT * FROM products JOIN inventory_tbl ON products.product_id = inventory_tbl.item_id ORDER BY sold DESC LIMIT 1";
$topCategoryFilter = "SELECT 
    products.category_id, 
    categories.category_name, 
    SUM(product_quantity) AS total_quantity
FROM orders 
JOIN products ON orders.product_id = products.product_id 
JOIN categories ON products.category_id = categories.category_id 
JOIN transaction_tbl ON orders.transaction_id = transaction_tbl.transaction_id
WHERE DATE_FORMAT(transaction_date, '%m') $monthFilter 
AND DATE_FORMAT(transaction_date, '%Y') $yearFilter
GROUP BY products.category_id, categories.category_name 
ORDER BY total_quantity DESC;
";

$topCategoryFilterResult = mysqli_query($conn, $topCategoryFilter);
// $topCategoryFilterRow = mysqli_fetch_assoc($topCategoryFilterResult);
if ($topCategoryFilterRow = mysqli_fetch_assoc($topCategoryFilterResult)) {
    $topCategory = $topCategoryFilterRow["category_name"];
} else {
    $topCategory = "NO PRODUCTS SOLD IN THIS DATE";
}
?>
<h1 class="setPoppins text-base text-white text-center font-semibold uppercase">Top Category</h1>
<i class="fa-solid fa-award text-5xl text-white"></i>
<h2 class="setOpenSans text-sm text-[#33FCFF] font-bold uppercase"><?php echo $topCategory ?></h2>
<script>
    $(document).ready(function () {
        $('#product-search').click(function (e) {
            console.log("SEARCH");
            const search = document.getElementById('search-value');
            $('#products-section').load('management-product.php', { searchValue: search.value });
        });
    });
</script>