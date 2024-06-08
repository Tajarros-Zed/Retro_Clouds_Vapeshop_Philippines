<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Clouds PH - Faqs</title>
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/faqs.css">
    <link rel="shortcut icon" href="./assets/Favicon_Retro.png" type="image/x-icon">
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

<body class="bg-[#1A1D3B]" id="scroll-top">

    <!-- Navigation -->
    <?php
        require("./config/config.php");
        require("./config/database.php");
        define('SOURCE_PATH', './assets/Retro_Clouds_VS.jpg');
        include("./config/Navigation.php");
        include("./config/sidebar-cart.php");


    $sql = "SELECT * FROM faqs";
    $result1 = $conn->query($sql);

    if (!$result1) {
        echo "Error : " . $conn->error;
    }
    ?>

    <div class="bg-[#1A1D3B] w-full max-w-full h-[30vh] pt-16 px-4 flex items-center justify-center flex-wrap mobilemd:px-6 iphone:pt-20 sm:h-[35vh] sm:px-8 md:px-10 lg:px-12 xl:px-14 laptopxxl:px-40 laptopxxl:h-[40vh] ">
        <div class="w-full flex flex-col gap-4 items-center justify-center sm:gap-2">
            <h2 class="retro-clouds-h2 text-[#ff1695] uppercase text-base font-medium w-full iphone:text-xl lg:text-2xl">Asked Questions</h2>
            <h1 class="retro_clouds_h2 text-white uppercase text-2xl font-bold w-full iphone:text-2xl sm:text-4xl lg:text-5xl laptopxxl:text-6xl">Answer to Common Questions</h1>
        </div>
    </div>

    <div class="retro_clouds_bg_gradient w-full max-w-full h-auto py-8 px-4 flex items-start justify-start flex-wrap mobilemd:px-6 sm:px-8 md:px-10 lg:px-12 xl:px-14 laptopxxl:px-40">
        <div class="w-full max-w-full flex flex-col gap-8 laptopxxl:gap-10">
            <?php
            while ($faqs = $result1->fetch_assoc()) {
            ?>
                <div class="accordions bg-gradient-to-r from-[#33FCFF] to-[#1F9799] border border-[#1A1D3B] rounded-lg">
                    <div class="faqs_title flex items-center justify-between  p-2 px-8 w-full gap-4 iphone:h-[70px] iphone:max-h-[70px] iphone:p-4 sm:h-[80px] sm:max-h-[80px] sm:p-6 lg:h-[90px] lg:max-h-[90px] laptopxxl:h-[100px] laptopxxl:max-h-[100px] laptopxxl:py-8">
                        <i class="fa-solid fa-circle-question text-[#FF1695] text-4xl xl:text-6xl"></i>
                        <span class="retro_clouds_h2 text-sm uppercase font-bold text-[#FF1695] mobilemd:text-base iphone:text-lg sm:text-xl xl:text-2xl xl:tracking-wider laptopxxl:text-3xl"><?php echo $faqs["question"]; ?></span>
                        <i class="fa-sharp fa-solid fa-chevron-down text-base accordion_icons font-bold text-[#FF1695] laptopxxl:text-lg"></i>
                    </div>

                    <div class="faqs_container grid grid-rows-[0] overflow-hidden rounded-b-lg bg-[#1A1D3B]">
                        <div class="min-h-0 p-2 lg:p-4 xl:p-6">
                            <p class="retro_clouds_p text-white text-sm font-normal mobilelg:text-base xl:tracking-wide laptopxxl:text-2xl"> <?php echo $faqs["answer"]; ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="bg-[#1A1D3B] w-full max-w-full h-[20vh] max-h-[20vh] py-8 flex items-start justify-start flex-wrap sm:h-[25vh] sm:max-h-[25vh] md:h-[30vh] md:max-h-[30vh] lg:h-[35vh] lg:max-h-[35vh] xl:h-[40vh] xl:max-h-[40vh] laptopxxl:h-[45vh] laptopxxl:max-h-[45vh] 2xl:h-[50vh] 2xl:max-h-[50vh]">
        <div class="w-full max-w-full h-full divider">

        </div>
    </div>

    <?php
    require("./config/Footer.php");
    define('SOURCE_FOOTER', './assets/Retro_Clouds_VS.jpg');
    footer();
    ?>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d870978cd1.js" crossorigin="anonymous"></script>
    <script src="./js/faqs.js"></script>
    <!-- Ionic Icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>