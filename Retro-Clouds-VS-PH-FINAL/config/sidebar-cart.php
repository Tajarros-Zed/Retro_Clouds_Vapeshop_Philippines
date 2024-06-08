<?php
require('./config/config.php');


if (isset($_POST['deleteAllBtn'])) {
    $sql = "DELETE FROM cart_tbl WHERE customer_id = '{$_SESSION['customer_ID']}'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:./catalog.php");
        echo "<script>window.alert('Cart Deletion Successful.')</script>";
    }
}

?>
<a href="../checkout.php"></a>
<div id="sidebar-cart" class="w-[300px] max-w-[300px] h-full bg-[#1A1D3B] p-4 fixed z-50" style="transition: all 0.3s ease; right:-300px;">
    <div class='flex items-center justify-center px-3 py-5 gap-2 text-left'>
        <i class="fa-solid fa-bag-shopping text-white text-xl h-auto"></i>
        <h1 class="text-[#fafafa] uppercase font-bold text-xl">SHOPPING CART</h1>
        <div id="sidebarCartSlideOutBtn" style="color:#fff; height: 40px; width: 40px; font-size: 25px;" class="h-auto flex justify-end items-center cursor-pointer"><i class="fas fa-times"></i></div>
    </div>

    <div class="w-full flex flex-1 flex-col flex-wrap gap-4">

        <div class="bg-gradient-to-b from-[#FF1695] to-[#1A1D3B] rounded-sm w-full max-w-full h-[40vh] flex items-start justify-start flex-wrap px-4 py-2 overflow-hidden overflow-y-scroll gap-4">
            <div class="w-full flex flex-col items-start justify-start border-b-2 border-white">
                <h2 class="retro_clouds_h2 text-lg uppercase font-bold text-[#33FCFF] py-2">Your Order</h2>
            </div>

            <?php
            $subtotal = 0;
            $orderQuantity = 0;
            $getAllCarts = "SELECT * FROM cart_tbl JOIN customer_tbl ON cart_tbl.customer_id = customer_tbl.costumer_id JOIN products ON cart_tbl.product_id = products.product_id WHERE customer_id = '{$_SESSION['customer_ID']}'"; //
            $result = mysqli_query($conn, $getAllCarts);
            while ($cart = mysqli_fetch_assoc($result)) {
            ?>
                <div class="w-full flex items-start justify-start gap-4 border-b border-white p-2">
                    <div class="w-full h-auto grid grid-cols-2 gap-4">
                        <div class="bg-transparent drop-shadow- w-full p-1 col-span-1">
                            <img src="./assets/catalog/<?php echo $cart['img_dir']; ?>" class="h-auto w-full aspect-square object-contain">
                        </div>

                        <div class="w-full grid col-span-1 gap-4">
                            <div class="w-full flex flex-1 flex-col items-center justify-center gap-2">
                                <h2 class="retro_clouds_h2 text-white uppercase text-sm font-bold text-center"><?php echo $cart['product_name']; ?></h2>
                                <p class="retro_clouds_h2 text-white uppercase text-sm font-semibold text-center"><?php if ($cart['flavor'] == 'N/A' || $cart['flavor'] == 'NULL') {
                                                                                                                        echo $cart['color'];
                                                                                                                    } else {
                                                                                                                        echo $cart['flavor'];
                                                                                                                    } ?></p>
                            </div>

                            <div class="w-full flex flex-1 items-start justify-between">
                                <p class="retro_clouds_p text-white uppercase text-sm font-medium">Qty: <?php echo $cart['product_quantity']; ?></p>
                                <p class="retro_clouds_p text-white uppercase text-sm font-medium">P <?php echo $cart['price']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $subtotal += $cart['price'];
                $orderQuantity += $cart['product_quantity'];
            } ?>
        </div>

        <form method="post">
            <button type="submit" name="deleteAllBtn" class="bg-gradient-to-b from-[#FF1695] to-[#33FCFF] outline-none border-2 my-4 border-white w-full p-2 text-center text-white retro_clouds_h2 uppercase font-black tracking-wider rounded-md">
                <span class="w-full flex items-center justify-center gap-6">
                    <h2><i class="fa-sharp fa-solid fa-trash"></i></h2>
                    <h2>Delete All</h2>
                </span>
            </button>


            <div class="bg-gradient-to-b from-[#FF1695] to-[#990D5A] rounded-sm w-full max-w-fullh-auto flex items-start justify-start flex-wrap px-4 py-2">
                <div class="flex flex-col items-start justify-start w-full gap-4">
                    <div class="flex justify-start items-center w-full">
                        <h2 class="retro_clouds_h2 text-lg uppercase font-black text-[#33FCFF] w-full py-2">Order Summary</h2>
                    </div>
                    <div class="w-full flex flex-col items-start justify-start gap-8">
                        <div class="w-full flex items-start justify-between border-b border-[#fafafa]">
                            <h2 class="w-full text-white retro_clouds_h2 uppercase font-bold text-base"> Order Quantity</h2>
                            <h2 class="w-1/3 text-white retro_clouds_h2 uppercase font-bold text-base mb-1 pr-[5px]" style="text-align: right;"><?php echo $orderQuantity; ?></h2>
                            <input type="hidden" name="quantity" value="<?php echo $orderQuantity; ?>">
                        </div>
                        <div class="w-full text-white retro_clouds_h2 uppercase font-bold text-base flex border-b border-[#fafafa]">
                            <h2 class="w-full">SUB Total</h2>
                            <h2 class="w-full pr-[5px]" style="text-align: right;"><?php echo "P " . number_format($subtotal, 2, '.', ','); ?></h2>
                        </div>

                        <a href="./checkout.php" class="bg-gradient-to-b from-[#FF1695] to-[#33FCFF] border-2 border-white w-full p-2 text-center text-white retro_clouds_h2 uppercase font-black tracking-wider rounded-md">
                            PROCEED TO CHECKOUT
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    var id = <?php if (empty($_SESSION['customer_ID'])) {
                    echo 0;
                } else {
                    echo $_SESSION['customer_ID'];
                } ?>;
    document.getElementById("sidebarCartSlideInBtn").addEventListener("click", function() {
        if (id == 0) {
            // LOGIN WILL POPUP LIKE A COCONUT TREE
            window.alert('You must be Logged In.');
        } else {
            document.getElementById("sidebar-cart").style.right = "0";
        }
    });
    document.getElementById("sidebarCartBurgerSlideInBtn").addEventListener("click", function() {
        if (id == 0) {
            // LOGIN WILL POPUP LIKE A COCONUT TREE
            window.alert('You must be Logged In.');
        } else {
            document.getElementById("sidebar-cart").style.right = "0";
        }
    });
    document.getElementById("sidebarCartSlideOutBtn").addEventListener("click", function() {
        document.getElementById("sidebar-cart").style.right = "-300px";
    });
</script>