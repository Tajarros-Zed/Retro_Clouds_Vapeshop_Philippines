<?php
session_start();
require "../config/config.php";
$id = $_POST['txtID'] ?? "";
$stock = $_POST['txtStock'] ?? "";
$category = $_POST['lstCategoryName'] ?? "";
$brand = $_POST['lstBrandName'] ?? "";
$name = $_POST['txtName'] ?? "";
$price = $_POST['txtPrice'] ?? "";
$flavor = $_POST['txtFlavor'] ?? "";
$color = $_POST['txtColor'] ?? "";
$bottleSize = $_POST['txtBottleSize'] ?? "";
$nicotine = $_POST['txtNicotine'] ?? "";
$puffs = $_POST['txtPuffs'] ?? "";
$description = $_POST['txtDescription'] ?? "";
$image = $_FILES["image"]["name"] ?? "";
$_SESSION['message'] = $_SESSION['message'] ?? "";
$_SESSION['mode'] = $_SESSION['mode'] ?? "add";

if (isset($_POST['btnAdd'])) {
    $_SESSION['mode'] = "add";
}
if (isset($_POST['btnUpdate'])) {
    $_SESSION['mode'] = "update";
}
if (isset($_POST['btnDelete'])) {
    $_SESSION['mode'] = "delete";
}
if (isset($_POST['btnUpdateStock'])) {
    $_SESSION['mode'] = "update stock";
}

if (isset($_POST['btnGo'])) {
    if ($_SESSION['mode'] == "add") {
        if (empty($name) || empty($category) || empty($brand) || empty($price) || empty($flavor) || empty($color) || empty($bottleSize) || empty($nicotine) || empty($puffs) || empty($description) || empty($image)) {
            $_SESSION['message'] = "PLEASE COMPLETE ALL FIELDS";
        } else {
            if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                $uploadDir = "../assets/catalog/"; // Directory where you want to store uploaded files
                $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);

                // Move the uploaded file to the desired directory
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
                    $_SESSION['message'] = "NEW PRODUCT HAS BEEN CREATED!";
                    $insertNewProduct = "INSERT INTO products (category_id, brand_id, product_name, price, flavor, color, bottle_size, nicotine_percentage, puffs, description, img_dir) VALUES ('$category', '$brand', '$name', '$price', '$flavor', '$color', '$bottleSize', '$nicotine', '$puffs', '$description', '$image')";
                    mysqli_query($conn, $insertNewProduct);
                    $selectLatestProduct = "SELECT * FROM products ORDER BY product_id DESC LIMIT 1";
                    $selectLatestProductQuery = mysqli_query($conn, $selectLatestProduct);
                    $latestID = mysqli_fetch_assoc($selectLatestProductQuery)['product_id'];
                    $insertNewProductInventory = "INSERT INTO inventory_tbl (item_id) VALUES ('$latestID')";
                    mysqli_query($conn, $insertNewProductInventory);
                } else {
                    $_SESSION['message'] = "Sorry, there was an error uploading your file.";
                }
            } else {
                $_SESSION['message'] = "No file uploaded or there was an error uploading the file.";
            }
        }
    } else if ($_SESSION['mode'] == "delete") {
        if (empty($id)) {
            $_SESSION['message'] = "PLEASE ENTER PRODUCT ID";
        } else {
            $checkID = "SELECT * FROM products WHERE product_id = '$id'";
            $checkIDRun = mysqli_query($conn, $checkID);
            $checkIDRow = mysqli_fetch_assoc($checkIDRun);
            if (mysqli_num_rows($checkIDRun) == 0) {
                $_SESSION['message'] = "PRODUCT ID DOES NOT EXIST";
            } else {
                unlink("../assets/catalog/" . $checkIDRow['img_dir']);
                $deleteProductInventory = "DELETE FROM inventory_tbl WHERE item_id = '$id'";
                mysqli_query($conn, $deleteProductInventory);
                $deleteProduct = "DELETE FROM products WHERE product_id = '$id'";
                mysqli_query($conn, $deleteProduct);
                $_SESSION['message'] = "PRODUCT HAS BEEN DELETED!";
            }
        }
    } else if ($_SESSION['mode'] == "update") {
        if (empty($id)) {
            $_SESSION['message'] = "PLEASE ENTER PRODUCT ID";
        } else {
            $checkID = "SELECT * FROM products WHERE product_id = '$id'";
            $checkIDRun = mysqli_query($conn, $checkID);
            $checkIDRow = mysqli_fetch_assoc($checkIDRun);
            if (mysqli_num_rows($checkIDRun) == 0) {
                $_SESSION['message'] = "PRODUCT ID DOES NOT EXIST";
            } else {
                $productUpdates = array();
                if (!empty($name)) {
                    $updateProductName = "UPDATE products SET product_name='$name' WHERE product_id='$id'";
                    mysqli_query($conn, $updateProductName);
                    array_push($productUpdates, "Name");
                }
                if (!empty($category)) {
                    $updateProductCategory = "UPDATE products SET category_id='$category' WHERE product_id='$id'";
                    mysqli_query($conn, $updateProductCategory);
                    array_push($productUpdates, "Category");
                }
                if (!empty($brand)) {
                    $updateProductBrand = "UPDATE products SET brand_id='$brand' WHERE product_id='$id'";
                    mysqli_query($conn, $updateProductBrand);
                    array_push($productUpdates, "Brand");
                }
                if (!empty($price)) {
                    $updateProductPrice = "UPDATE products SET price='$price' WHERE product_id='$id'";
                    mysqli_query($conn, $updateProductPrice);
                    array_push($productUpdates, "Price");
                }
                if (!empty($flavor)) {
                    $updateProductFlavor = "UPDATE products SET flavor='$flavor' WHERE product_id='$id'";
                    mysqli_query($conn, $updateProductFlavor);
                    array_push($productUpdates, "Flavor");
                }
                if (!empty($color)) {
                    $updateProductColor = "UPDATE products SET color='$color' WHERE product_id='$id'";
                    mysqli_query($conn, $updateProductColor);
                    array_push($productUpdates, "Color");
                }
                if (!empty($bottleSize)) {
                    $updateProductBottleSize = "UPDATE products SET bottle_size='$bottleSize' WHERE product_id='$id'";
                    mysqli_query($conn, $updateProductBottleSize);
                    array_push($productUpdates, "Bottle Size");
                }
                if (!empty($nicotine)) {
                    $updateProductNicotine = "UPDATE products SET nicotine_percentage='$nicotine' WHERE product_id='$id'";
                    mysqli_query($conn, $updateProductNicotine);
                    array_push($productUpdates, "Nicotine");
                }
                if (!empty($puffs)) {
                    $updateProductPuffs = "UPDATE products SET puffs='$puffs' WHERE product_id='$id'";
                    mysqli_query($conn, $updateProductPuffs);
                    array_push($productUpdates, "Puffs");
                }
                if (!empty($description)) {
                    $updateProductDescription = "UPDATE products SET description='$description' WHERE product_id='$id'";
                    mysqli_query($conn, $updateProductDescription);
                    array_push($productUpdates, "Description");
                }
                if (!empty($image)) {
                    $updateProductImage = "UPDATE products SET img_dir='$image' WHERE product_id='$id'";
                    mysqli_query($conn, $updateProductImage);
                    array_push($productUpdates, "Image");
                }
                if (count($productUpdates) > 0) {
                    $productUpdates = implode(", ", $productUpdates);
                    $_SESSION['message'] = "PRODUCT ID:$id ($productUpdates) HAS BEEN UPDATED!";
                } else {
                    $_SESSION['message'] = "NO CHANGES HAS BEEN MADE!";
                }
            }
        }
    } else if ($_SESSION['mode'] == "update stock") {
        if (empty($id)) {
            $_SESSION['message'] = "PLEASE ENTER PRODUCT ID";
        } else {
            $checkID = "SELECT * FROM products WHERE product_id = '$id'";
            $checkIDRun = mysqli_query($conn, $checkID);
            $checkIDRow = mysqli_fetch_assoc($checkIDRun);
            if (mysqli_num_rows($checkIDRun) == 0) {
                $_SESSION['message'] = "PRODUCT ID DOES NOT EXIST";
            } else {
                if (!empty($stock)) {
                    $updateProductStock = "UPDATE inventory_tbl SET total_stock = '$stock', latest_stock_refill = '$stock' WHERE item_id='$id'";
                    mysqli_query($conn, $updateProductStock);
                    $_SESSION['message'] = "PRODUCT ID:$id STOCK HAS BEEN UPDATED!";
                } else {
                    $_SESSION['message'] = "NO CHANGES HAS BEEN MADE!";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Clouds PH - Management</title>
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="./sales.css">
    <link rel="shortcut icon" href="../assets/Favicon_Retro.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
    <script defer>
        //add click listener on #popup-message
        $(document).ready(function () {
            $("#popup-message").click(function () {
                $(this).hide();
            });
        });
    </script>
</head>

<body class="bg-[#1A1D3B]">
    <?php
    if (!empty($_SESSION['message'])) {
        ?>
        <div id="popup-message"
            style="position: fixed; z-index: 999999999999999999999999999; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.6); display: flex; justify-content: center; align-items: center;">
            <div id="message-con"
                style="background-color: #FF1695; width: auto; height: fit-content; padding: 2rem; border: 2px solid cyan; border-radius: 10px; color: white; font-weight: bolder; position: relative; top: 0; transform: translate(0, -50%); font-size: 30px;">
                <?php
                echo $_SESSION['message'];
                $_SESSION['message'] = "";
                ?>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    define('SOURCE_PATH', '../assets/Retro_Clouds_VS.jpg');
    include ("./adminNav.php");
    $selectAllBrands = "SELECT * FROM brands ORDER BY brand_name ASC";
    $allBrands = mysqli_query($conn, $selectAllBrands);
    $selectAllCategories = "SELECT * FROM categories ORDER BY category_name ASC";
    $allCategories = mysqli_query($conn, $selectAllCategories);
    ?>

    <div class='flex items-center justify-center p-4 gap-2'>
        <img src="../assets/Retro_Clouds_VS.jpg" class="h-auto w-[50px] rounded-full mix-blend-lighten">
        <h1 class="retro_clouds_h1 uppercase font-bold text-2xl">Retro Clouds</h1>
    </div>

    <div
        class="w-full h-auto py-2 px-4 flex items-center justify-center flex-col flex-wrap mobilemd:px-6 sm:px-8 lg:grid lg:grid-cols-4 lg:items-start lg:justify-start lg:p-2 lg:gap-4 laptopxxl:p-6">
        <div class="w-full h-[15vh] flex flex-col justify-center items-center mobilelg:gap-2 lg:col-span-4">
            <h1 class="text-[#fafafa] text-2xl poppins uppercase font-bold text-center lg:text-[2rem] 2xl:text-4xl">
                PRODUCT MANAGEMENT</h1>
            <p class="text-[#33FCFF] uppercase lg:text-lg"> retro cloudes vape lounge</p>
        </div>

        <div class="w-full flex flex-1 flex-col lg:top-0 lg:right-0 lg:col-span-1 2xl:sticky 2xl:top-0">
            <div
                class="bg-[#FF1695] rounded-lg border-2 border-cyan-400 w-full max-w-full h-auto flex flex-col items-start justify-start flex-wrap px-2 py-4 mt-8 sm:p-4 2xl:sticky 2xl:top-0">
                <form enctype="multipart/form-data" action="" method="post"
                    class="w-full flex flex-col items-start justify-start gap-4 md:gap-6 lg:gap-4 xl:gap-2 2xl:gap-4">
                    <h1
                        class="headings text-[#fafafa] font-bold text-base uppercase w-full text-center mobilemd:text-lg sm:text-2xl md:text-4xl lg:text-xl">
                        MANAGE PRODUCTS</h1>
                    <?php
                    if ($_SESSION['mode'] == "update" || $_SESSION['mode'] == "delete") {
                        ?>
                        <div
                            class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start p-2 gap-2 w-full mobilemd:px-1 mobilelg:px-2 sm:px-6 lg:px-2 xl:p-2">
                            <label
                                class="headings text-[#FF1695] text-[8px] font-semibold w-[40%] mobilemd:text-xs mobilelg:text-sm sm:text-base md:text-lg lg:text-base lg:w-1/2 2xl:w-[45%]">ID:</label>
                            <input id="stock-id" type="number" name="txtID"
                                class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-bold mobilemd:w-[80%] mobilelg:text-sm sm:text-base md:text-lg lg:text-sm xl:text-base"
                                placeholder="Product ID..." autocomplete="off">
                        </div>
                        <?php
                    }
                    ?>

                    <div id="update-stock"
                        class="w-full flex flex-col items-start justify-start gap-4 md:gap-6 lg:gap-4 xl:gap-2 2xl:gap-4">
                        <?php
                        if ($_SESSION['mode'] == "update stock") {
                            require "management-updatestock.php";
                        }
                        ?>
                    </div>
                    <?php
                    if ($_SESSION['mode'] == "update" || $_SESSION['mode'] == "add") {
                        ?>
                        <div
                            class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start p-2 gap-2 w-full mobilemd:px-1 mobilelg:px-2 sm:px-6 lg:px-2 xl:p-2">
                            <label
                                class="headings text-[#FF1695] text-[8px] font-semibold w-[40%] mobilemd:text-xs mobilelg:text-sm sm:text-base md:text-lg lg:text-base lg:w-1/2 2xl:w-[45%]">Category:</label>
                            <select name="lstCategoryName"
                                class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-bold mobilemd:w-[80%] mobilelg:text-sm sm:text-base md:text-lg lg:text-sm xl:text-base">
                                <option value=''></option>
                                <?php
                                while ($allCategoriesRow = mysqli_fetch_assoc($allCategories)) {
                                    echo "
                                        <option value='" . $allCategoriesRow['category_id'] . "'>" . $allCategoriesRow['category_name'] . " - " . $allCategoriesRow['category_id'] . "</option>
                                    ";
                                }
                                ?>
                            </select>
                        </div>

                        <div
                            class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start p-2 gap-2 w-full mobilemd:px-1 mobilelg:px-2 sm:px-6 lg:px-2 xl:p-2">
                            <label
                                class="headings text-[#FF1695] text-[8px] font-semibold w-[40%] mobilemd:text-xs mobilelg:text-sm sm:text-base md:text-lg lg:text-base lg:w-1/2 2xl:w-[45%]">Brand:</label>
                            <select name="lstBrandName"
                                class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-bold mobilemd:w-[80%] mobilelg:text-sm sm:text-base md:text-lg lg:text-sm xl:text-base">
                                <option value=''></option>
                                <?php
                                while ($allBrandsRow = mysqli_fetch_assoc($allBrands)) {
                                    echo "
                                        <option value='" . $allBrandsRow['brand_id'] . "'>" . $allBrandsRow['brand_name'] . " - " . $allBrandsRow['brand_id'] . "</option>
                                    ";
                                }
                                ?>
                            </select>
                        </div>

                        <div
                            class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start p-2 gap-2 w-full mobilemd:px-1 mobilelg:px-2 sm:px-6 lg:px-2 xl:p-2">
                            <label
                                class="headings text-[#FF1695] text-[8px] font-semibold w-[40%] mobilemd:text-xs mobilelg:text-sm sm:text-base md:text-lg lg:text-base lg:w-1/2 2xl:w-[45%]">Name:</label>
                            <input type="text" name="txtName"
                                class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-bold mobilemd:w-[80%] mobilelg:text-sm sm:text-base md:text-lg lg:text-sm xl:text-base"
                                placeholder="Product Name..." autocomplete="off">
                        </div>

                        <div
                            class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start p-2 gap-2 w-full mobilemd:px-1 mobilelg:px-2 sm:px-6 lg:px-2 xl:p-2">
                            <label
                                class="headings text-[#FF1695] text-[8px] font-semibold w-[40%] mobilemd:text-xs mobilelg:text-sm sm:text-base md:text-lg lg:text-base lg:w-1/2 2xl:w-[45%]">Price:</label>
                            <input type="number" name="txtPrice"
                                class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-bold mobilemd:w-[80%] mobilelg:text-sm sm:text-base md:text-lg lg:text-sm xl:text-base"
                                placeholder="Price..." min="0" step=".01" autocomplete="off">
                        </div>

                        <div
                            class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start p-2 gap-2 w-full mobilemd:px-1 mobilelg:px-2 sm:px-6 lg:px-2 xl:p-2">
                            <label
                                class="headings text-[#FF1695] text-[8px] font-semibold w-[40%] mobilemd:text-xs mobilelg:text-sm sm:text-base md:text-lg lg:text-base lg:w-1/2 2xl:w-[45%]">Flavor:</label>
                            <input type="text" name="txtFlavor"
                                class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-bold mobilemd:w-[80%] mobilelg:text-sm sm:text-base md:text-lg lg:text-sm xl:text-base"
                                placeholder="Flavor..." autocomplete="off">
                        </div>

                        <div
                            class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start p-2 gap-2 w-full mobilemd:px-1 mobilelg:px-2 sm:px-6 lg:px-2 xl:p-2">
                            <label
                                class="headings text-[#FF1695] text-[8px] font-semibold w-[40%] mobilemd:text-xs mobilelg:text-sm sm:text-base md:text-lg lg:text-base lg:w-1/2 2xl:w-[45%]">Color:</label>
                            <input type="text" name="txtColor"
                                class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-bold mobilemd:w-[80%] mobilelg:text-sm sm:text-base md:text-lg lg:text-sm xl:text-base"
                                placeholder="Color..." autocomplete="off">
                        </div>

                        <div
                            class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start p-2 gap-2 w-full mobilemd:px-1 mobilelg:px-2 sm:px-6 lg:px-2 xl:p-2">
                            <label
                                class="headings text-[#FF1695] text-[8px] font-semibold w-[40%] mobilemd:text-xs mobilelg:text-sm sm:text-base md:text-lg lg:text-base lg:w-1/2 2xl:w-[45%]">Size:</label>
                            <input type="text" name="txtBottleSize"
                                class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-bold mobilemd:w-[80%] mobilelg:text-sm sm:text-base md:text-lg lg:text-sm xl:text-base"
                                placeholder="Bottle Size..." autocomplete="off">
                        </div>

                        <div
                            class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start p-2 gap-2 w-full mobilemd:px-1 mobilelg:px-2 sm:px-6 lg:px-2 xl:p-2">
                            <label
                                class="headings text-[#FF1695] text-[8px] font-semibold w-[40%] mobilemd:text-xs mobilelg:text-sm sm:text-base md:text-lg lg:text-base lg:w-1/2 2xl:w-[45%]">Nicotine:</label>
                            <input type="text" name="txtNicotine"
                                class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-bold mobilemd:w-[80%] mobilelg:text-sm sm:text-base md:text-lg lg:text-sm xl:text-base"
                                placeholder="Nicotine Percentage..." autocomplete="off">
                        </div>

                        <div
                            class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start p-2 gap-2 w-full mobilemd:px-1 mobilelg:px-2 sm:px-6 lg:px-2 xl:p-2">
                            <label
                                class="headings text-[#FF1695] text-[8px] font-semibold w-[40%] mobilemd:text-xs mobilelg:text-sm sm:text-base md:text-lg lg:text-base lg:w-1/2 2xl:w-[45%]">Puffs:</label>
                            <input type="number" name="txtPuffs"
                                class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-bold mobilemd:w-[80%] mobilelg:text-sm sm:text-base md:text-lg lg:text-sm xl:text-base"
                                placeholder="Puffs..." autocomplete="off">
                        </div>

                        <div
                            class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start p-2 gap-2 w-full mobilemd:px-1 mobilelg:px-2 sm:px-6 lg:px-2 xl:p-2">
                            <label
                                class="headings text-[#FF1695] text-[8px] font-semibold w-[40%] mobilemd:text-xs mobilelg:text-sm sm:text-base md:text-lg lg:text-base lg:w-1/2 2xl:w-[45%]">Desc<span
                                    class="hidden 2xl:inline">ription</span>:</label>
                            <input type="text" name="txtDescription"
                                class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-bold mobilemd:w-[80%] mobilelg:text-sm sm:text-base md:text-lg lg:text-sm xl:text-base"
                                placeholder="Description..." autocomplete="off">
                        </div>

                        <div
                            class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start p-2 gap-2 w-full mobilemd:px-1 mobilelg:px-2 sm:px-6 lg:px-2 xl:p-2">
                            <label
                                class="headings text-[#FF1695] text-[8px] font-semibold w-[40%] mobilemd:text-xs mobilelg:text-sm sm:text-base md:text-lg lg:text-base lg:w-1/2 2xl:w-[45%]">Image:</label>
                            <input type="file" name="image" id="product_image" accept="image/png"
                                class=" text-[#FF1695] w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-bold mobilemd:w-[80%] mobilelg:text-sm sm:text-base md:text-lg lg:text-sm xl:text-base">
                        </div>
                        <?php
                    }
                    ?>

                    <div class="w-full flex-col flex gap-4 2xl:grid 2xl:grid-cols-2">
                        <input type="submit" name="btnAdd" value="ADD PRODUCT"
                            class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#33FCFF] flex items-center justify-center text-[8px] gap-1 rounded-sm w-full border border-white py-1 cursor-pointer uppercase mobilelg:text-xs mobilelg:px-1 sm:py-2 sm:text-sm">
                        <input type="submit" name="btnDelete" value="DELETE PRODUCT"
                            class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#33FCFF] flex items-center justify-center text-[8px] gap-1 rounded-sm w-full border border-white py-1 cursor-pointer uppercase mobilelg:text-xs mobilelg:px-1 sm:py-2 sm:text-sm">
                        <input type="submit" name="btnUpdate" value="UPDATE PRODUCT"
                            class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#33FCFF] flex items-center justify-center text-[8px] gap-1 rounded-sm w-full border border-white py-1 cursor-pointer uppercase mobilelg:text-xs mobilelg:px-1 sm:py-2 sm:text-sm">
                        <input type="submit" name="btnUpdateStock" value="UPDATE STOCK"
                            class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#33FCFF] flex items-center justify-center text-[8px] gap-1 rounded-sm w-full border border-white py-1 cursor-pointer uppercase mobilelg:text-xs mobilelg:px-1 sm:py-2 sm:text-sm">
                        <!-- <input type="submit" name="btnUpdateStock" value="UPDATE STOCK"
                            class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#33FCFF] flex items-center justify-center text-[8px] gap-1 rounded-full w-full border border-white py-1 cursor-pointer uppercase mobilelg:text-xs mobilelg:px-1 sm:py-2 sm:text-sm 2xl:col-span-2"> -->
                    </div>
                    <input type="submit" name="btnGo" value="GO"
                        class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#33FCFF] flex items-center justify-center text-[8px] gap-1 rounded-sm w-full border border-white py-1 cursor-pointer uppercase mobilelg:text-xs mobilelg:px-1 sm:py-2 sm:text-sm">
                </form>
            </div>

        </div>

        <div class="w-full max-w-full h-auto flex flex-col items-center justify-center gap-4 lg:col-span-3">
            <div id="products-section" class="bg-[#FF1695] rounded-lg border-2 border-cyan-400 w-full max-w-full h-[90vh] flex flex-col items-center justify-center mt-8 gap-4 sm:p-4 lg:h-[129vh] lg:max-h-[129vh] xl:h-[135vh] xl:max-h-[135vh] 2xl:h-[60vh] 2xl:max-h-[60vh]">
                <?php require "management-product.php" ?>
            </div>
            <div id="transactions-section" class="bg-[#FF1695] rounded-lg border-2 border-cyan-400 w-full max-w-full h-[90vh] flex flex-col items-center justify-center mt-8 gap-4 sm:p-4 lg:h-[129vh] lg:max-h-[129vh] xl:h-[135vh] xl:max-h-[135vh] 2xl:h-[60vh] 2xl:max-h-[60vh]">
                <?php require "management-transaction.php" ?>
            </div>
        </div>

        <style>
            @media (min-width: 320px) {

                th,
                td {
                    padding: 2px;
                    font-size: 10px;
                }
            }

            @media (min-width: 1024px) {

                th,
                td {
                    padding: 2px;
                    font-size: .7rem;
                }
            }

            @media (min-width: 1536px) {

                th,
                td {
                    padding: 4px;
                    font-size: .9rem;
                }
            }
        </style>
    </div>
    </div>
    </div>


    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d870978cd1.js" crossorigin="anonymous"></script>
</body>

</html>