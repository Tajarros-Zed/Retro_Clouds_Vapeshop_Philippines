<?php

if (!isset($_SESSION)) {
    // Start the session
    session_start();
}
require "./config/config.php";
$_SESSION['customer_ID'] = $_SESSION['customer_ID'] ?? "";
$_SESSION['message'] = $_SESSION['message'] ?? "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER PROFILE | Retro Clouds PH</title>
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/Component.css">
    <link rel="shortcut icon" href="./assets/Favicon_Retro.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
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
            border-radius: 50px;
        }
    </style>
</head>

<body class="bg-[#1A1D3B] select-none">
    <?php
        require ("./config/database.php");
        define('SOURCE_PATH', './assets/Retro_Clouds_VS.jpg');
        include ("./config/Navigation.php");
        include ("./config/sidebar-cart.php");
    ?>

    <div class='flex items-center justify-center p-3 gap-2'>
        <img src="./assets/Retro_Clouds_VS.jpg" class="h-auto w-[50px] rounded-full mix-blend-lighten">
        <h1 class="retro_clouds_h1 uppercase font-bold text-2xl">Retro Clouds</h1>
    </div>

    <div
        class="w-full h-auto py-2 px-4 mobilemd:px-6 mobilemd:py-4 sm:px-8 md:px-10 lg:grid lg:grid-cols-3 lg:gap-x-4 lg:px-12 xl:px-20 xl:gap-x-8 laptopxxl:px-14">
        <div
            class="w-full h-[15vh] flex flex-col justify-center items-center gap-4 iphone:h-[20vh] iphone:max-h-[20vh] sm:mt-4 lg:col-span-3 laptopxxl:flex-row laptopxxl:justify-between laptopxxl:h-[5vh]">
            <h1 class="text-[#fafafa] text-4xl poppins uppercase font-bold">USERS PROFILE</h1>
            <p class="text-[#33FCFF] uppercase"> Your profile and information</p>
        </div>

        <div
            class="bg-[#FF1695] rounded-md border-2 border-[#33FCFF] w-full max-w-full h-[50vh] flex flex-col items-center justify-center mt-8 gap-4 sm:p-4 sm:h-[60vh] md:h-[70vh] lg:col-span-2 lg:h-[128vh] lg:max-h-[128vh] xl:h-[102vh] xl:max-h-[102vh] laptopxxl:h-[88vh] laptopxxl:max-h-[88vh] 2xl:h-[680px] 2xl:max-h-[680px]">
            <div
                class="w-full flex items-center justify-between flex-col lg:max-w-full lg:flex-row 2xl:max-w-full 2xl:flex-row">
                <h1
                    class="text-[#fafafa] text-xl font-bold poppins p-4 text-center w-full lg:text-2xl lg:flex lg:justify-start lg:items-center lg:gap-2 2xl:text-2xl 2xl:text-left 2xl:flex 2xl:justify-start 2xl:items-center 2xl:gap-4">
                    <span class="hidden lg:flex 2xl:text-2xl 2xl:items-center 2xl:justify-center"><i
                            class="fa-solid fa-bag-shopping"></i></span>MY TRANSACTION</h1>
            </div>

            <div
                class="w-full h-[90%] flex items-center justify-center overflow-x-scroll overflow-y-scroll relative lg:overflow-x-hidden 2xl:h-full">
                <table class="table-auto border-2 border-[#fafafa] w-full absolute top-0">
                    <thead>
                        <tr class="border-[#fafafa] bg-[#33fcff] text-[#ff1695]">
                            <th
                                class="px-4 py-1 border-2 border-white text-xs lg:px-1 xl:text-sm 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                                Transac. ID</th>
                            <th
                                class="px-4 py-1 border-2 border-white text-xs lg:px-1 xl:text-sm 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                                Mobile Number</th>
                            <th
                                class="px-4 py-1 border-2 border-white text-xs lg:px-1 xl:text-sm 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                                Shipping Address</th>
                            <th
                                class="px-4 py-1 border-2 border-white text-xs lg:px-1 xl:text-sm 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                                Transac. Date</th>
                            <th
                                class="px-4 py-1 border-2 border-white text-xs lg:px-1 xl:text-sm 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                                Overall Total</th>
                            <th
                                class="px-4 py-1 border-2 border-white text-xs lg:px-1 xl:text-sm 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                                Delivery Selected</th>
                            <th
                                class="px-4 py-1 border-2 border-white text-xs lg:px-1 xl:text-sm 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                                Transaction Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getUserTransation = "SELECT * FROM `transaction_tbl` JOIN delivery_modes ON transaction_tbl.delivery_id = delivery_modes.delivery_id JOIN transaction_status_tbl ON transaction_tbl.status_id = transaction_status_tbl.status_id WHERE `customer_id` = '{$_SESSION['customer_ID']}' ORDER BY transaction_date DESC";
                        $userTransationResult = mysqli_query($conn, $getUserTransation);
                        while ($userTransationRow = mysqli_fetch_assoc($userTransationResult)) {
                            ?>
                            <tr>
                                <td class='text-white text-center border-2 border-white xl:text-sm xl:px-2'>
                                    <?php echo $userTransationRow['transaction_id'] ?></td>
                                <td class='text-white text-center border-2 border-white xl:text-sm xl:px-2'>
                                    <?php echo $userTransationRow['mobile_number'] ?></td>
                                <td class='text-white text-center border-2 border-white xl:text-sm xl:px-2'>
                                    <?php echo $userTransationRow['shipping_address'] ?></td>
                                <td class='text-white text-center border-2 border-white xl:text-sm xl:px-2'>
                                    <?php echo $userTransationRow['transaction_date'] ?></td>
                                <td class='text-white text-center border-2 border-white xl:text-sm xl:px-2'>P
                                    <?php echo number_format($userTransationRow['sub_total'] + $userTransationRow['shipping_fee'], 2) ?>
                                </td>
                                <td class='text-white text-center border-2 border-white xl:text-sm xl:px-2'>
                                    <?php echo $userTransationRow['delivery_name'] ?></td>
                                <td class='text-white text-center border-2 border-white xl:text-sm xl:px-2'>
                                    <?php echo $userTransationRow['status_name'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div
            class="w-full max-w-full h-auto flex flex-col items-start justify-start gap-4 mobilemd:gap-2 mobilemd:items-start mobilemd:justify-start lg:col-span-1 lg:gap-0">
            <div class="w-full h-full flex flex-col items-start justify-start">
                <div
                    class="bg-[#FF1695] rounded-md border-2 border-[#33FCFF] w-full max-w-full h-auto flex flex-col items-start justify-start flex-wrap px-2 py-4 mt-8 sm:p-6 md:py-16 lg:p-4">
                    <div id="users-info-section"
                        class="w-full flex flex-col items-start justify-start gap-4 md:gap-6 lg:gap-2 xl:gap-2 laptopxxl:grid laptopxxl:grid-cols-2 2xl:gap-4">
                        <?php require "users-profile-info.php" ?>
                    </div>
                </div>
            </div>

            <div class="w-full h-full flex flex-col items-start justify-start">
                <div
                    class="bg-[#FF1695] rounded-md border-2 border-[#33FCFF] w-full max-w-full h-auto flex flex-col items-start justify-start flex-wrap px-2 py-4 mt-8 sm:p-6 md:py-16 lg:p-4">
                    <div id="users-password-section"
                        class="w-full flex flex-col items-start justify-start gap-4 md:gap-6 lg:gap-2 xl:gap-2 laptopxxl:grid laptopxxl:grid-cols-2 2xl:gap-4">
                        <?php require "users-profile-password.php" ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <?php
    require ("./config/Footer.php");
    define('SOURCE_FOOTER', './assets/Retro_Clouds_VS.jpg');
    footer();
    ?>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d870978cd1.js" crossorigin="anonymous"></script>
    <!-- Ionic Icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>