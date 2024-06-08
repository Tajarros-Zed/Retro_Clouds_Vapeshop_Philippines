<?php
require "../config/config.php";
$id = $_POST['product_id'] ?? "";
$getStock = "SELECT * FROM inventory_tbl WHERE item_id = '$id'";
$getStockResult = mysqli_query($conn, $getStock);
$getStock = ($getStockRow = mysqli_fetch_assoc($getStockResult)) ? "Current Stock: " . $getStockRow['total_stock'] : "Stock...";
?>
<div
    class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start p-2 gap-2 w-full mobilemd:px-1 mobilelg:px-2 sm:px-6 lg:px-2 xl:p-2">
    <label
        class="headings text-[#FF1695] text-[8px] font-semibold w-[40%] mobilemd:text-xs mobilelg:text-sm sm:text-base md:text-lg lg:text-base lg:w-1/2 2xl:w-[45%]">ID:</label>
    <input id="stock-id" type="number" name="txtID"
        class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-bold mobilemd:w-[80%] mobilelg:text-sm sm:text-base md:text-lg lg:text-sm xl:text-base"
        placeholder="Product ID..." autocomplete="off" value="<?php echo $id ?>">
</div>
<div
    class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start p-2 gap-2 w-full mobilemd:px-1 mobilelg:px-2 sm:px-6 lg:px-2 xl:p-2">
    <label
        class="headings text-[#FF1695] text-[8px] font-semibold w-[40%] mobilemd:text-xs mobilelg:text-sm sm:text-base md:text-lg lg:text-base lg:w-1/2 2xl:w-[45%]">Stock:</label>
    <input id="stocks" type="number" name="txtStock" min="0"
        class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-bold mobilemd:w-[80%] mobilelg:text-sm sm:text-base md:text-lg lg:text-sm xl:text-base"
        placeholder="<?php echo $getStock ?>" autocomplete="off">
</div>
<script>
    $(document).ready(function () {
        // document.getElementById('stock').value = '1';
        var id = 0;
        $('#stock-id').change(function (e) {
            console.log("changed");
            id = e.target.value;
            $('#update-stock').load('management-updatestock.php', { product_id: id });
        });
    });
</script>