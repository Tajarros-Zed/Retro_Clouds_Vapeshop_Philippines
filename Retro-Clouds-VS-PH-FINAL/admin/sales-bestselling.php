<?php
    include "../config/config.php";
    $currentYear = date("Y");
    $currentDay = date("d");
    $currentMonth = date("m");

    $yearFilter = (!empty($_POST['year'])) ? "= ".$_POST['year'] : "!= 0";
    $monthFilter = (!empty($_POST['month'])) ? "= ".$_POST['month'] : "!= 0";
    $categoryFilter = (!empty($_POST['category'])) ? "= ".$_POST['category'] : "!= 0";
    if(isset($_POST['category'])) {
        if($_POST['category'] == 1) {
            $category = "DISPOSABLE VAPES";
        } else if($_POST['category'] == 2) {
            $category = "VAPE JUICES";
        } else if($_POST['category'] == 3) {
            $category = "POD KITS";
        } else {
            $category = "PRODUCTS";
        }
    } else {
        $category = "PRODUCTS";
    }

    // $bestSellingFilter = "SELECT * FROM products JOIN inventory_tbl ON products.product_id = inventory_tbl.item_id ORDER BY sold DESC LIMIT 1";
    $bestSellingFilter = "SELECT 
        products.product_name, 
        products.flavor, products.color, 
        products.product_id, SUM(product_quantity) AS total_quantity
    FROM orders 
    JOIN products ON orders.product_id = products.product_id 
    JOIN transaction_tbl ON orders.transaction_id = transaction_tbl.transaction_id
    WHERE DATE_FORMAT(transaction_date, '%m') $monthFilter 
    AND DATE_FORMAT(transaction_date, '%Y') $yearFilter
    AND category_id $categoryFilter
    GROUP BY product_id 
    ORDER BY total_quantity DESC";

    $bestSellingFilterResult = mysqli_query($conn, $bestSellingFilter);
    // $bestSellingFilterRow = mysqli_fetch_assoc($bestSellingFilterResult);
    if($bestSellingFilterRow = mysqli_fetch_assoc($bestSellingFilterResult)) {
        $bestSellingName = $bestSellingFilterRow['product_name'];
        $bestSellingNameExt = ($bestSellingFilterRow['flavor'] == "NULL" || $bestSellingFilterRow['flavor'] == "N/A") ? $bestSellingFilterRow['color'] : $bestSellingFilterRow['flavor'];
        $bestSellingQuantity = $bestSellingFilterRow['total_quantity'];
    } else {
        $bestSellingName = "NO $category SOLD IN THIS DATE";
        $bestSellingNameExt = "";
        $bestSellingQuantity = "0";
    }
?>
<h1 class="setPoppins text-base text-white text-center font-semibold uppercase">Best Selling Product</h1>
<i class="fa-solid fa-trophy text-4xl text-white"></i>
<h2 class="setOpenSans text-sm text-[#33FCFF] font-bold text-center"><?php echo $bestSellingName . " " . $bestSellingNameExt ?></h2>
<h2 class="setOpenSans text-xs text-[#33FCFF] font-semibold"><?php echo $bestSellingQuantity ?> Units Sold</h2>
<script>
    $(document).ready(function () {
        $('#product-search').click(function(e) {
        console.log("SEARCH");
            const search = document.getElementById('search-value');
            $('#products-section').load('management-product.php', { searchValue: search.value });
        });
    });
</script>