<div class="bg-[#FF1695] rounded-lg border-2 border-cyan-400 w-full max-w-full h-[90vh] flex flex-col items-center justify-center mt-8 gap-4 sm:p-4 lg:h-[129vh] lg:max-h-[129vh] xl:h-[135vh] xl:max-h-[135vh] 2xl:h-[80vh] 2xl:max-h-[80vh]">
    <div class="w-full flex items-center justify-between flex-col lg:max-w-full lg:flex-row 2xl:max-w-full 2xl:flex-row">
        <h1 class="text-[#fafafa] text-xl font-bold poppins p-2 text-center w-full lg:text-2xl lg:flex lg:justify-start lg:items-center lg:gap-2 2xl:text-2xl 2xl:text-left 2xl:flex 2xl:justify-start 2xl:items-center 2xl:gap-4"><span class="hidden lg:flex 2xl:text-2xl 2xl:items-center 2xl:justify-center"><i class="fa-solid fa-bag-shopping"></i></span>PRODUCT DIRECTORY</h1>
        <div class="w-full">
            <div
                <?php
                $searchString = $_POST['searchValue'] ?? "";
                ?>
                class="bg-[#33FCFF] text-[#FF1695] flex items-center gap-4 justify-start p-3 w-full rounded-sm sm:px-6 lg:p-2 xl:p-2 2xl:rounded-lg 2xl:px-4">
                <label
                    class="headings text-[#FF1695] text-xs font-semibold hidden w-[40%] sm:text-base md:text-lg lg:text-base xl:w-[50%] 2xl:w-[45%]">SEARCH</label>
                <input id="search-value" value="<?php echo $searchString ?>" type="text" name=""
                    class="w-full p-1 bg-transparent outline-none border-b border-[#FF1695] text-xs texts font-bold mobilelg:text-sm sm:text-base md:text-lg lg:text-base xl:text-base"
                    placeholder="Search Product..." autocomplete="off">
                <div id="product-search"
                    class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#33FCFF] flex items-center justify-center text-[8px] gap-1 rounded-full w-[50%] border border-[#33FCFF] py-1 cursor-pointer uppercase mobilelg:px-2 mobilelg:text-xs lg:w-1/3 lg:py-2 lg:rounded-sm lg:text-base">
                    SEARCH
                </div>
            </div>
        </div>
    </div>

    <div class="w-full h-[90%] flex items-center justify-center overflow-x-scroll overflow-y-scroll relative 2xl:h-full lg:overflow-x-hidden">
        <table class="table-auto border-2 border-white w-full absolute top-0">
            <thead>
                <tr class="border-[#fafafa] bg-[#33FCFF] text-[#FF1695]">
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        ID</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Brand</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Name</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Price</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Flavor</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Color</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Size</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Nicotine <span class="hidden">Percent</span></th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Puffs</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Description</th>
                </tr>
            </thead>
            <tbody class="text-[#fafafa]">
                <?php
                require "../config/config.php";
                $searchFilter = "WHERE product_name LIKE '%$searchString%'";
                $selectAllProducts = "SELECT * FROM products JOIN brands ON products.brand_id = brands.brand_id $searchFilter ORDER BY product_id ASC";
                $countAllProducts = "SELECT COUNT(product_id) AS count FROM products";
                $allProducts = mysqli_query($conn, $selectAllProducts);
                ini_set("display_errors", 0);
                $count = 10;
                while ($productRow = mysqli_fetch_assoc($allProducts)) {
                    echo "
                        <tr>
                            <td class='text-center border-2 border-white xl:text-sm xl:px-2'>{$productRow['product_id']}</td>
                            <td class='text-center border-2 border-white xl:text-sm xl:px-2'>{$productRow['brand_name']}</td>
                            <td class='text-center border-2 border-white xl:text-sm xl:px-2'>{$productRow['product_name']}</td>
                            <td class='text-center border-2 border-white xl:text-sm xl:px-2'>{$productRow['price']}</td>
                            <td class='text-center border-2 border-white xl:text-sm xl:px-2'>{$productRow['flavor']}</td>
                            <td class='text-center border-2 border-white xl:text-sm xl:px-2'>{$productRow['color']}</td>
                            <td class='text-center border-2 border-white xl:text-sm xl:px-2'>{$productRow['bottle_size']}</td>
                            <td class='text-center border-2 border-white xl:text-sm xl:px-2'>{$productRow['nicotine_percentage']}</td>
                            <td class='text-center border-2 border-white xl:text-sm xl:px-2'>{$productRow['puffs']}</td>
                            <td class='text-center border-2 border-white xl:text-sm xl:px-2'>{$productRow['description']}</td>
                        </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
    <h1 class="text-[#fafafa] text-base font-bold poppins p-2 text-center w-full 2xl:text-lg">TOTAL PRODUCT COUNT : <?php echo mysqli_fetch_assoc(mysqli_query($conn, $countAllProducts))['count'] ?>
    </h1>
</div>
<script>
    $(document).ready(function () {
        $('#product-search').click(function(e) {
        console.log("SEARCH");
            const search = document.getElementById('search-value');
            $('#products-section').load('management-product.php', { searchValue: search.value });
        });
    });
</script>