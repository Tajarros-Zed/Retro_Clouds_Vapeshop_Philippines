
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Clouds PH</title>
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="shortcut icon" href="./assets/Favicon_Retro.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
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

<body class="bg-[#1A1D3B] select-none" id="scroll-top">

    <!-- NAVIGATION -->
    <?php
        require("./config/config.php");
        require("./config/database.php");
        define('SOURCE_PATH', './assets/Retro_Clouds_VS.jpg');
        include("./config/Navigation.php");
        include("./config/sidebar-cart.php");

    ?>
    <!-- HERO BANNER -->
    <div class="w-full max-w-full h-[60vh] min-h-[60vh] flex items-start justify-start relative mobilelg:h-[90vh] mobilelg:max-h-[90vh] lg:h-screen lg:max-h-screen" id="scroll-top">
        <video autoplay muted loop plays-inline src="./assets/Retro-Clouds-Hero-Video.mp4" class="absolute top-0 left-0 -z-[1] w-full h-full object-cover"></video>
    </div>
    <a href=""></a>
    <!-- FEATURED PRODUCT -->
    <div class="w-full h-[50%] bg-gradient-to-b from-[#FF1695] to-transparent laptopxxl:h-[60%] laptopxxl:max-h-[60%] 2xl:h-[50%] 2xl:max-h-[50%] 2xl:px-8">
        <div class="w-full p-4 mobilemd:px-6 sm:p-8 md:p-10 md:grid md:grid-cols-3 md:justify-center md:items-center md:gap-4 lg:p-12 xl:p-14 xl:gap-8 laptopxxl:p-16 2xl:px-32">
            <div class="flex flex-col gap-2 z-10 md:justify-end md:items-end lg:mb-20 xl:gap-4">
                <h1 class="text-[#fafafa] font-bold text-2xl oswald sm:text-[2rem] md:text-[1.7rem] md:text-right md:w-full lg:text-[2rem] xl:text-4xl xl:tracking-wider">PANTHER SERIES</h1>
                <div class=" w-1/2 bg-gradient-to-r from-cyan-300 via-transparent to-cyan-300 ml-7 sm:w-1/3 md:w-1/2 md:justify-end">
                    <p class="poppins text-center font-medium text-[#fafafa] mobilelg:text-lg lg:p-1 lg:text-xl xl:text-2xl">&#x20B1; 1097.25</p>
                </div>
            </div>

            <div class="w-full relative flex flex-col items-center justify-center m-4 md:m-0 lg:grid lg:grid-cols-3 lg:items-center lg:justify-center lg:gap-4">
                <img src="./assets/smokes.png" class="hidden lg:flex lg:h-auto lg:scale-[3]">
                <img src="./assets/Red-Dark-Green-Grape.png" alt="" class="rotate-0 h-auto w-[30%] mobilemd:w-[25%] iphone:w-[20%] iphone:rotate-[35deg] sm:w-[100px] md:rotate-0 lg:w-[120px] xl:w-[170px]">
                <img src="./assets/smokes.png" class="hidden lg:flex lg:h-auto lg:scale-[3] lg:-z-[1]">
            </div>

            <div class=" w-full h-auto z-10 flex flex-col items-end justify-end gap-3 md:justify-start md:items-start lg:mt-20 xl:gap-6">
                <h1 class="poppins text-[#fafafa] text-xs w-[60%] mobilelg:text-base mobilelg:w-[70%] sm:w-[50%] md:w-full lg:text-lg xl:text-xl">Dr Vapes Panther Series Grape Flavored Goodness in 120ml Bottle. Now available in the Retro Clouds Vape Shop!</h1>
                <a href="./catalog.php" aria-disabled="true">
                    <div class="bg-gradient-to-b from-[#FF1695] to-[#008F99] flex items-center justify-center gap-1 rounded-full border border-white py-2 px-7 sm:gap-2">
                        <i class="fa-solid fa-bag-shopping text-white sm:text-lg lg:text-xl"></i>
                        <h1 class="oswald text-white font-semibold sm:text-lg lg:text-xl">SHOP NOW</h1>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- GOVERNMENT WARNING -->
    <div class="relative p-4 w-full h-[20vh] bg-gradient-to-l from-[#1F9799] via-[#33FCFF] to-[#1F9799] flex items-center justify-center mobilemd:px-6 sm:px-8 md:h-auto md:px-10 lg:px-12 xl:px-14 xl:py-6 laptopxxl:px-16 2xl:px-20">
        <div class="w-full h-auto flex flex-col items-center justify-center">
            <p class="text-[#610049] text-center font-semibold bebas-neue mobilelg:text-xl lg:text-2xl">Government warning: This product is harmful and contains nicotine which is a highly addictive substance. This is for use only by adults and is not recommended for use by non-smokers.</p>
        </div>
    </div>

    <!-- BRAND PARTNERS -->
    <div class="overflow-x-hidden partners_bg relative w-full h-auto p-4 flex flex-col justify-center items-center flex-wrap gap-4 mobilemd:p-6 mobilelg:gap-6 sm:max-h-[50vh] sm:h-[50vh] sm:p-8 sm:gap-8 md:px-10 lg:px-12 xl:px-14 xl:gap-14 xl:h-[60vh] xl:max-h-[60vh] laptopxxl:px-16 2xl:px-20">
        <div class="w-full flex items-center justify-around gap-2 flex-wrap">
            <a href="https://www.facebook.com/iqphilippine" target="_blank" class="hover:scale-105"><img src="./assets/Infinity Series Brand Logo.png" class="w-[80px] h-auto mobilelg:w-[100px] sm:w-[120px] xl:w-[130px] 2xl:w-[160px]"></a>
            <a href="https://www.facebook.com/aeroginvapeph" target="_blank" class="hover:scale-105"><img src="./assets/aerogin-logo.png" class="w-[80px] h-auto mobilelg:w-[100px] sm:w-[120px] xl:w-[130px] 2xl:w-[160px]"></a>
            <a href="https://www.facebook.com/NastyPH" target="_blank" class="hover:scale-105"><img src="./assets/nasty-logo.png" class="w-[80px] h-auto mobilelg:w-[100px] sm:w-[120px] xl:w-[130px] 2xl:w-[160px]"></a>
        </div>
        <div class="w-full flex items-center justify-around gap-2 flex-wrap">
            <a href="https://www.facebook.com/worldsupersmooth.ph" target="_blank" class="hover:scale-105"><img src="./assets/relx-logo.png" class="w-[80px] h-auto mobilelg:w-[100px] sm:w-[120px] xl:w-[130px] 2xl:w-[160px]"></a>
            <p class="text-[#fafafa] oswald text-sm text-nowrap mobilemd:text-base mobilelg:text-lg sm:text-2xl md:text-[2rem] xl:text-4xl">BRAND PARTNERS</p>
            <a href="https://www.facebook.com/profile.php?id=61553286650013" target="_blank" class="hover:scale-105"><img src="./assets/geekvape-logo.png" class="w-[80px] h-auto mobilelg:w-[100px] sm:w-[120px] xl:w-[130px] 2xl:w-[160px]"></a>
        </div>
        <div class="w-full flex items-center justify-around gap-2 flex-wrap">
            <a href="https://www.facebook.com/veehoophmain" target="_blank" class="hover:scale-105"><img src="./assets/veehoo-logo.png" class="w-[80px] h-auto mobilelg:w-[100px] sm:w-[120px xl:w-[130px]] 2xl:w-[160px]"></a>
            <a href="https://www.facebook.com/Shiftdisposablevape" target="_blank" class="hover:scale-105"><img src="./assets/shft-logo.png" class="w-[80px] h-auto mobilelg:w-[100px] sm:w-[120px] xl:w-[130px] 2xl:w-[160px]"></a>
            <a href="https://www.facebook.com/SMPOPH" target="_blank" class="hover:scale-105"><img src="./assets/smpo-logo.png" class="w-[80px] h-auto mobilelg:w-[100px] sm:w-[120px] xl:w-[130px] 2xl:w-[160px]"></a>
        </div>
    </div>

    <!-- RELATED ARTICLES -->
    <div class="lg:grid lg:grid-cols-2 lg:w-full lg:max-w-full lg:items-end lg:justify-between">
        <div class="w-full max-w-full h-[60vh] bg-gradient-to-t from-[#FF1695] to-transparent flex flex-col items-center justify-center gap-3 px-4 mobilemd:px-6 sm:h-[70vh] sm:max-h-[70vh] sm:p-8 sm:gap-4 md:px-10 md:h-[80vh] md:max-h-[80vh] lg:p-12 xl:p-14 laptopxxl:p-16 2xl:px-20 2xl:py-8">
            <div class="w-full h-[10vh] flex items-center justify-center">
                <p class="text-[#33FCFF] text-2xl oswald uppercase mobilelg:font-bold sm:text-[2rem] 2xl:text-4xl 2xl:tracking-wider">related articles</p>
            </div>
            <a href="https://kidshealth.org/en/teens/e-cigarettes.html" target="_blank" class="w-full h-[60%] bg-[#1A1D3B] flex flex-col items-center justify-center blog-bg-one border border-[#1A1D3B]  border-x-2 border-y-8 rounded-md hover:border-[#FF1695] hover:border-2 iphone:justify-end sm:h-[80%] sm:max-h-[80%] md:h-full md:max-h-full lg:p-4">

                <div class="w-full h-[50%] overflow-hidden flex items-center justify-center iphone:hidden lg:w-full">

                </div>

                <div class="flex flex-col w-[90%] items-start justify-center bg-[#1a1d3bd5] px-1 mobilelg:w-full mobilelg:p-2 sm:p-4">
                    <p class="text-white oswald  text-xs sm:text-sm">January 2024</p>
                    <h1 class="text-white text-lg sm:text-xl">Vaping: What You Need to Know</h1>
                    <p class="text-white text-xs oswald sm:text-sm">Medically reviewed by: Elana Pearl Ben-Joseph, MD</p>
                </div>
            </a>
        </div>

        <div class="w-full max-w-full h-[40vh] max-h-[40vh] bg-gradient-to-b from-[#FF1695] to-transparent flex flex-col items-center justify-start mobilelg:px-6 sm:h-[70vh] sm:max-h-[70vh] sm:p-8 sm:gap-4 md:px-10 md:h-[80vh] md:max-h-[80vh] lg:grid lg:col-span-1 lg:bg-gradient-to-t lg:from-[#FF1695] lg:to-transparent lg:justify-end lg:p-14 laptopxxl:p-16 2xl:pr-20 2xl:pl-0 2xl:py-8 2xl:justify-end">
            <div class="w-full max-w-full h-[100%] flex flex-col px-4 mobilemd:px-6 mobilelg:gap-4 mobilelg:px-0 2xl:gap-12 2xl:flex-1 2xl:px-0 2xl:pl-0 2xl:w-[600px] 2xl:max-w-[600px]">
                <div class="w-full max-w-full h-[50%] flex items-center justify-around iphone:justify-between iphone:gap-4 lg:h-full 2xl:flex-1">
                    <a href="https://newsinhealth.nih.gov/2020/05/risks-vaping" target="_blank" class="w-[45%] h-[95%] bg-[#1A1D3B] border border-3 border-[#33FCFF] hover:border-[#FF1695] flex flex-col items-center justify-center blog-bg-two iphone:w-1/2 iphone:justify-end iphone:h-[130px] sm:h-full sm:max-h-full 2xl:w-full">
                        <div class="bg-[#1a1d3bd5] w-[90%] mobilelg:w-full iphone:p-1 sm:p-2">
                            <p class="text-white oswald text-xs px-1 sm:text-sm">May 2020</p>
                            <h1 class="text-white text-sm px-1 sm:text-base">The Risks of Vaping</h1>
                        </div>
                    </a>
                    <a href="https://www.medicalnewstoday.com/articles/vaping-vs-smoking" target="_blank" class="w-[45%] h-[95%] bg-[#1A1D3B] border border-3 border-[#33FCFF] hover:border-[#FF1695] flex flex-col items-center justify-center blog-bg-three iphone:w-1/2 iphone:justify-end iphone:h-[130px] sm:h-full sm:max-h-full 2xl:w-full">
                        <div class="bg-[#1a1d3bd5] w-[90%] mobilelg:w-full iphone:p-1 sm:p-2">
                            <p class="text-white oswald text-xs px-1 sm:text-sm">May 2024</p>
                            <h1 class="text-white text-sm px-1 sm:text-base">Vaping vs. smoking: Which is safer?</h1>
                        </div>
                    </a>
                </div>
                <div class="w-full max-w-full h-[50%] flex items-center justify-around iphone:justify-between iphone:gap-4 lg:h-full 2xl:flex-1">
                    <a href="https://archpublichealth.biomedcentral.com/articles/10.1186/s13690-022-00998-w" target="_blank" class="w-[45%] h-[95%] bg-[#1A1D3B] border border-3 border-[#33FCFF] hover:border-[#FF1695] flex flex-col items-center justify-center blog-bg-four iphone:w-1/2 iphone:justify-end iphone:h-[130px] sm:h-full sm:max-h-full 2xl:w-full">
                        <div class="bg-[#1a1d3bd5] w-[90%] mobilelg:w-full iphone:p-1 sm:p-2">
                            <p class="text-white oswald text-xs px-1 sm:text-sm">November 2022</p>
                            <h1 class="text-white text-sm px-1 sm:text-base">The prevalence of electronic cigarettes</h1>
                        </div>
                    </a>
                    <a href="#" class="w-[45%] h-[95%] bg-[#1A1D3B] border border-3 border-[#33FCFF] hover:border-[#FF1695] flex flex-col items-center justify-center blog-bg-five iphone:w-1/2 iphone:justify-end iphone:h-[130px] sm:h-full sm:max-h-full 2xl:w-full">
                        <div class="bg-[#1a1d3bd5] w-[90%] mobilelg:w-full iphone:p-1 sm:p-2">
                            <p class="text-white oswald text-xs px-1 sm:text-sm">April 2018</p>
                            <h1 class="text-white text-sm px-1 sm:text-base">Vaping’s potential to benefit public...</h1>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php
        require("./config/Footer.php");
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