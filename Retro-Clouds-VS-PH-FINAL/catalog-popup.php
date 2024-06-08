<?php
if(!isset($_SESSION)) {
    session_start();
}
require "config/config.php";
date_default_timezone_set('Asia/Manila');
$customerID = $_SESSION['customer_ID'] ?? "";
$currentDate = date('Y-m-d');
$deal = $_POST['deal'] ?? false;
$productName = $_POST['productName'] ?? "";
$productId = $_POST['productId'] ?? "";
$getProductWithId = "SELECT * FROM products JOIN inventory_tbl ON products.product_id = inventory_tbl.item_id WHERE product_id = '$productId'";
$productWithId = mysqli_query($conn, $getProductWithId);
$getAllProductsWithName = "SELECT * FROM products JOIN inventory_tbl ON products.product_id = inventory_tbl.item_id WHERE product_name = '$productName'";
$allProductsWithName = mysqli_query($conn, $getAllProductsWithName);
$productWithIdRow = mysqli_fetch_assoc($productWithId);
?>
<div class="popup-product-bg" id="popup-bg">
    <form action="checkout.php" method="post"
        class="popup-product mobilemd:w-[300px] mobilelg:w-[350px] iphone:w-[400px] sm:w-[425px] lg:h-[500px] 2xl:w-[600px] 2xl:h-[600px]">
        <input name="customer-id" id="customer-id" type="text" hidden value="<?php echo $customerID ?>">
        <input name="product-id" id="product-id" type="text" hidden value="<?php echo $productId ?>">
        <input name="buy-now" id="product-id" type="text" hidden value="true">
        <div class="w-full max-w-full h-auto flex flex-col items-start justify-start flex-wrap mb-9">
            <div class="w-full flex items-start justify-start flex-wrap gap-2 iphone:gap-6">
                <div
                    class="w-full flex items-center justify-center px-6 py-4 gap-2 sm:flex-row-reverse sm:justify-between">
                    <img src="./assets/Retro_Clouds_VS.jpg" class="h-auto w-[50px] mix-blend-lighten">
                    <h1 class="setTourney text-base uppercase font-semibold mobilemd:text-lg sm:text-xl">Retro Clouds
                    </h1>
                </div>
                <div class="w-full flex items-center justify-start px-6 py-4 flex-wrap gap-4">
                    <div class="w-full h-full flex flex-1 flex-col items-center justify-center">
                        <img id="popup-image" class="popup-img w-full aspect-square object-contain scale-125"
                            src="assets/catalog/<?php echo $productWithIdRow['img_dir'] ?>">
                    </div>

                    <div class="w-full h-full flex flex-1 flex-col gap-4 item-center justify-center sm:gap-6">
                        <h2
                            class="setOpenSans text-[#33FCFF] uppercase font-semibold text-sm text-center sm:text-base sm:w-full">
                            Product Classification</h2>
                        <h1
                            class="popup-name setPoppins text-white uppercase font-bold text-2xl text-center sm:text-[2rem] lg:text-3xl lg:leading-10">
                            <?php echo $productWithIdRow['product_name'];
                                if($productWithIdRow['flavor'] == "NULL" || $productWithIdRow['flavor'] == "N/A") {
                                    echo " " . $productWithIdRow['color'];
                                } else {
                                    echo " " . $productWithIdRow['flavor'];
                                }
                            ?>
                        </h1>
                        <h2 id="popup-price" class="popup-price setOpenSans text-[#33FCFF] uppercase font-bold text-xl text-center">₱
                            <?php
                            if ($productWithIdRow['sale'] != $currentDate) {
                                $price = number_format($productWithIdRow['price'], 2);
                            } else {
                                $price = number_format($productWithIdRow['price'] * 0.78, 2) . " (SALE!)";
                            }
                            echo $price;
                            ?>
                        </h2>
                    </div>
                </div>
                <div class="w-full flex flex-col items-start justify-start px-6 py-4 flex-wrap gap-4">
                    <div class="w-full flex items-start justify-start">
                        <h2 class="w-full setOpenSans text-white font-semibold text-sm text-center">Tax Included.
                            Shipping Calculated at Checkout</h2>
                    </div>

                    <?php 
                        if(!$deal) {
                    ?>
                    <div class="w-full flex items-start justify-start flex-col gap-2">
                        <h1 class="w-full setPoppins text-[#33FCFF] font-bold text-lg uppercase">Flavors</h1>
                        <select name="" id="selection"
                            class="cursor-pointer popup-flavors bg-[#1A1D3B] border border-[#33FCFF] rounded-full px-4 py-2 w-full text-[#FF1695] setPoppins uppercase font-semibold outline-none">
                            <?php
                            while ($allProductsWithNameRow = mysqli_fetch_assoc($allProductsWithName)) {
                                if ($allProductsWithNameRow['sale'] != $currentDate) {
                                    $priceNew = number_format($allProductsWithNameRow['price'], 2);
                                    $isDeal = "false";
                                } else {
                                    $priceNew = number_format($allProductsWithNameRow['price'] * 0.78, 2) . " (SALE!)";
                                    $isDeal = "true";
                                }
                                $flavor = ($allProductsWithNameRow['flavor'] == "NULL" || $allProductsWithNameRow['flavor'] == "N/A") ? $allProductsWithNameRow['color'] : $allProductsWithNameRow['flavor'];
                                ?>
                                <option value="<?php echo $allProductsWithNameRow['img_dir'] .",,,". $priceNew .",,,". $allProductsWithNameRow['description'] .",,,". $allProductsWithNameRow['total_stock'] .",,,". $isDeal .",,,". $allProductsWithNameRow['product_id'] ?>"><?php echo $flavor ?>
                                </option>
                                <?php
                            }
                            echo $allProductsWithNameRow['total_stock'];
                            ?>
                        </select>
                    </div>
                    <?php 
                        }
                    ?>
                </div>

                <div class="w-full flex items-end justify-start px-6 py-4 gap-2 flex-wrap">
                    <div class="w-full flex flex-1 flex-col gap-2">
                        <h1 class="w-full setPoppins text-[#33FCFF] font-bold text-lg uppercase">Quantity</h1>
                        <div class="w-full flex items-center justify-around border-2 border-white rounded-full py-1">
                            <a id="popup-minus" class="popup-minus cursor-pointer setOpenSans text-[#33FCFF] text-lg font-semibold">-</a>
                            <h1 id="popup-quantity" class="popup-quantity setPoppins text-white text-lg font-bold">1</h1>
                            <input name="product-quantity" id="popup-quantity-value" type="text" hidden value="1">
                            <a id="popup-add" class="popup-add cursor-pointer setOpenSans text-[#33FCFF] text-lg font-semibold">+</a>
                        </div>
                    </div>
                </div>

                <div class="w-full flex flex-1 flex-col items-center justify-center px-6 py-2">
                    <p id="popup-description" class="setOpenSans text-white text-sm font-normal"><?php echo $productWithIdRow['description'] ?>
                    </p>
                </div>

                <div id="popup-buttons" class="popup-buttons w-full flex flex-col items-start justify-start px-6 py-4 gap-2 flex-wrap">
                    <div class="w-full flex-col flex items-center gap-4 justify-between iphone:flex-row">
                        <button type="submit" name="btnBuyNow"
                            class="buy-now w-full border border-white rounded-full bg-gradient-to-b from-[#FF1695] to-[#008F99] py-2 px-4 flex items-center justify-center gap-2">
                            <span class="setPoppins text-white font-bold uppercase text-xs mobilelg:text-sm">Buy
                                Now</span>
                            <span class="text-white"><i class="fa-solid fa-bag-shopping"></i></span>
                        </button>
                        
                        <button type="button" id="add-to-cart" name="btnAddToCart"
                            class="<?php if($productWithIdRow['sale'] != $currentDate) {echo "flex";} else {echo "hidden";} ?> add-to-cart w-full border border-white rounded-full bg-gradient-to-b from-[#FF1695] to-[#008F99] py-2 px-4 flex items-center justify-center gap-2">
                            <span class="setPoppins text-white font-bold uppercase text-xs mobilelg:text-sm">Add to
                                Cart</span>
                            <span class="text-white"><i class="fa-solid fa-cart-shopping"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="w-full max-w-full h-auto flex items-center justify-center p-4 flex-wrap bg-gradient-to-r from-[#1F9799] via-[#33FCFF] to-[#1F9799]">
            <h2 class="setOpenSans text-xs uppercase font-black text-[#610049] text-center">Government Warning: This
                product is harmful and contains nicotine which is highly addictive substance. This is for use only by
                adults and is not recommended for use by non-smokers.</h2>
        </div>
    </form>
</div>
<?php
    echo "
    <script>
        productLimit = {$productWithIdRow['total_stock']};
    </script>
    ";
?>
<script>
    $(document).ready(function () {
        // let productLimit = $productWithIdRow;
        $('#add-to-cart').click(function (e) {
            const productQuantity = document.getElementById('popup-quantity').innerText;
            const productID = document.getElementById('product-id').value;
            const customerID = document.getElementById('customer-id').value;
            console.log(productQuantity + " - " + productID + " - " + customerID);
            $('#cart-process').empty();
            $('#popup-section').empty();
            $('#cart-process').load('catalog-cart-process.php', {productQuantity: productQuantity, productID: productID, customerID: customerID});
        });
        $('#popup-bg').click(function (e) {
            if (e.target == e.currentTarget) {
                $('#popup-section').empty();
            }
        });
        $('#selection').change(function (e) {
            // console.log(e.currentTarget.value);
            let productArray = e.currentTarget.value.split(",,,");
            console.log(productArray[0] + " - " + productArray[1] + " - " + productArray[2] + " - " + productArray[3]);
            document.getElementById('product-id').value = productArray[5];
            if(productArray[4] == "true") {
                document.getElementById('add-to-cart').className = "hidden add-to-cart w-full border border-white rounded-full bg-gradient-to-b from-[#FF1695] to-[#008F99] py-2 px-4 flex items-center justify-center gap-2";
            } else {
                document.getElementById('add-to-cart').className = "add-to-cart w-full border border-white rounded-full bg-gradient-to-b from-[#FF1695] to-[#008F99] py-2 px-4 flex items-center justify-center gap-2";
            }
            document.getElementById('popup-image').src = "assets/catalog/"+productArray[0];
            document.getElementById('popup-price').innerText = "₱ "+productArray[1];
            document.getElementById('popup-description').innerText = productArray[2];
            document.getElementById('popup-add').style.display = "block";
            document.getElementById('popup-minus').style.display = "block";
            document.getElementById('popup-buttons').className = "popup-buttons w-full flex flex-col items-start justify-start px-6 py-4 gap-2 flex-wrap";
            if(parseInt(document.getElementById('popup-quantity').innerText) > productArray[3] && document.getElementById('popup-quantity').innerText != "OUT OF STOCK :(") {
                document.getElementById('popup-quantity').innerText = productArray[3];
                document.getElementById('popup-quantity-value').value = productArray[3];
                console.log(document.getElementById('popup-quantity').innerText);
            }
            else if(document.getElementById('popup-quantity').innerText == "OUT OF STOCK :(") {
                document.getElementById('popup-quantity').innerText = "1";
                document.getElementById('popup-quantity-value').value = "1";
                console.log("out of stock");
            }
            productLimit = productArray[3];
            if (productArray[3] <= 0) {
                document.getElementById('popup-quantity').innerText = "OUT OF STOCK :(";
                document.getElementById('popup-add').style.display = "none";
                document.getElementById('popup-minus').style.display = "none";
                document.getElementById('popup-buttons').className = "hidden popup-buttons w-full flex flex-col items-start justify-start px-6 py-4 gap-2 flex-wrap";
            }
        })
        $('#popup-add').click(function (e) {
            let quantity = parseInt(document.getElementById('popup-quantity').innerText);
            if (quantity < productLimit) {
                quantity++;
                document.getElementById('popup-quantity').innerText = quantity;
                document.getElementById('popup-quantity-value').value = quantity;
            }
        });
        $('#popup-minus').click(function (e) {
            let quantity = parseInt(document.getElementById('popup-quantity').innerText);
            if (quantity > 1) {
                quantity--;
                document.getElementById('popup-quantity').innerText = quantity;
                document.getElementById('popup-quantity-value').value = quantity;
            }
        });
    });
</script>