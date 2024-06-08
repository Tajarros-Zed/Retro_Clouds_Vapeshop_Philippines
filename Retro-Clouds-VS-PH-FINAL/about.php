<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Retro Clouds PH</title>
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/about.css">
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

        .swiper-slide {
            text-align: center !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            flex-direction: column !important;
        }
    </style>
</head>

<body class="bg-[#1A1D3B] select-none" id="scroll-top">
    <?php
        require("./config/config.php");
        require("./config/database.php");
        define('SOURCE_PATH', './assets/Retro_Clouds_VS.jpg');
        include("./config/Navigation.php");
        include("./config/sidebar-cart.php");
    ?>
    <!-- ABOUT HERO BANNER -->
    <div class="w-full h-[80vh] bg-gradient-to-t from-[#FF1695] via-[#1A1D3B] to-[#1A1D3B] flex flex-col items-center justify-end px-4 mobilemd:px-6 sm:px-8 md:px-10 lg:h-screen lg:max-h-screen lg:pb-4 lg:px-24 xl:px-14 laptopxxl:px-16 2xl:px-20">
        <div class="w-full h-[80%] mixed-gradient-img flex flex-col items-center justify-center gap-2 lg:h-[85%]">
            <div class="w-[80%] max-w-[80%] h-[90%] flex flex-col items-center lg:gap-2 lg:h-full lg:p-4 laptopxxl:grid laptopxxl:grid-cols-2 laptopxxl:w-full laptopxxl:max-w-full laptopxxl:justify-center">
                <div class="w-full h-[30%] flex flex-col gap-1 justify-center mobilelg:gap-2 p-1 lg:h-[25%] laptopxxl:items-center laptopxxl:h-[50vh] laptopxxl:px-8 laptopxxl:gap-12">
                    <p class="text-sm text-[#33FCFF] uppercase font-semibold poppins sm:text-base lg:text-lg laptopxxl:text-left laptopxxl:text-xl">About Retro Clouds</p>
                    <p class="text-3xl text-[#fafafa] uppercase font-semibold oswald sm:text-4xl sm:tracking-wide lg:text-5xl laptopxxl:text-left laptopxxl:text-6xl">WHAT WE DO</p>
                    <p class="text-xs uppercase text-[#fafafa]  font-semibold poppins sm:text-sm lg:text-base laptopxxl:text-left laptopxxl:text-lg">Selling vape products since 2020</p>
                    <p class="hidden text-[#fafafa]  font-normal poppins sm:text-sm lg:text-base laptopxxl:flex laptopxxl:text-left">Established in December 2022, we started as a passionate vape store in Pinagsama Phase 2, Taguig City, and our passion for providing the best vaping experience has led us to expand and serve vapers in San Pedro Laguna, Gen Tri Cavite, Kawit Cavite, and even Infanta Pangasinan. We offer a wide variety of high-quality e-liquids, vape devices, and accessories from reputable brands, with knowledgeable staff to help you find the perfect setup, all at competitive prices.</p>
                </div>
                <div class="retro-logo w-[99%] h-[70%] lg:h-full"></div>
            </div>
        </div>
    </div>

    <!-- STORE BRANCHES -->
    <div class="h-auto w-full max-w-full bg-gradient-to-b from-[#FF1695] via-[#1A1D3B] to-[#1A1D3B] flex flex-col items-center justify-center p-4 mobilemd:px-6 sm:px-8 md:px-10 lg:px-24 xl:px-14 laptopxxl:px-16 2xl:px-20 2xl:py-12">
        <div class="w-full max-w-full h-[100%] max-h-[100%] relative flex flex-col items-center gap-8 md:justify-between md:gap-8 lg:gap-12">
            <p class="text-3xl uppercase font-semibold oswald md:text-4xl lg:text-5xl text-[#fafafa]">store branches</p>
            <div class="w-full max-w-full h-full max-h-full flex flex-col flex-wrap gap-3 items-center md:justify-between">
                <div class="mixed-gradient-img w-full max-w-full h-full max-h-full overflow-hidden">
                    <!-- Slider main container -->
                    <div class="w-full max-w-full h-full min-h-full mySwiper flex flex-col flex-wrap justify-center items-center cursor-grabbing">
                        <div class="swiper-wrapper flex">
                            <!-- STORE BRANCH PASIG-->
                            <div class="swiper-slide text-center mixed-gradient-img text-white text-xs gap-4 p-4 md:p-8 slide_1">
                                <iframe class="w-full h-[300px] laptopxxl:h-[380px] 2xl:h-[400px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3862.4687152650276!2d121.05490877457144!3d14.515161279163838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cf4a96a5b0e1%3A0x6ffef89d1466140d!2s27%208th%2C%20Manila%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1717630704189!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <p class="text-sm text-[#fafafa] uppercase poppins lg:text-base 2xl:text-lg w-full">No. 27 8th Street, North Signal Village, Taguig</p>
                                <p class="text-sm text-[#fafafa] uppercase poppins lg:text-base">09454083993</p>
                            </div>
                            <!-- STORE BRANCH MAKATI-->
                            <div class="swiper-slide text-center mixed-gradient-img text-white text-xs gap-4 p-4 md:p-8 slide_1">
                                <iframe class="w-full h-[300px] laptopxxl:h-[380px] 2xl:h-[400px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3862.335918475174!2d121.05867147457164!3d14.52276807897857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c8b6c788c3ab%3A0xa515211583d50bfd!2sPhase%202%2C%2032%20Block%201%2C%20Taguig%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1717630606839!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <p class="text-sm text-[#fafafa] uppercase poppins lg:text-base 2xl:text-lg w-full">Block 1 Lot 32 Phase 2, Pinagsama, City of Taguig</p>
                                <p class="text-sm text-[#fafafa] uppercase poppins lg:text-base">09454083993</p>
                            </div>
                            <!-- STORE BRANCH TAGUIG-->
                            <div class="swiper-slide text-center mixed-gradient-img text-white text-xs gap-4 p-4 md:p-8 slide_1">
                                <iframe class="w-full h-[300px] laptopxxl:h-[380px] 2xl:h-[400px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3862.6435584922688!2d121.05287677640472!3d14.5051400432568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cf47ead75bd7%3A0xdd72ad4f989d8e7d!2sMagsaysay%20Road%20%26%20Daisy%2C%20Taguig%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1717630749241!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <p class="text-sm text-[#fafafa] uppercase poppins lg:text-base 2xl:text-lg w-full">Daisy St. Cnr Magsaysay Rd, South Sgnl Vlg, Taguig</p>
                                <p class="text-sm text-[#fafafa] uppercase poppins lg:text-base">09454083993</p>
                            </div>
                            <!-- STORE BRANCH MANILA-->
                            <div class="swiper-slide text-center mixed-gradient-img text-white text-xs gap-4 p-4 md:p-8 slide_1">
                                <iframe class="w-full h-[300px] laptopxxl:h-[380px] 2xl:h-[400px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.45024296879!2d121.04056427641402!3d14.573401541436736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c845862500ff%3A0xc21cfa3d5d84512a!2sBlock%2046%2C%2036%20Boni%20Ave%2C%20Mandaluyong%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1717630804332!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <p class="text-sm text-[#fafafa] uppercase poppins lg:text-base 2xl:text-lg w-full">Block 46 Lot 36 A. Boni Ave, Central Bicutan, Taguig</p>
                                <p class="text-sm text-[#fafafa] uppercase poppins lg:text-base">09454083993</p>
                            </div>
                            <!-- STORE BRANCH MANDALUYONG-->
                            <div class="swiper-slide text-center mixed-gradient-img text-white text-xs gap-4 p-4 md:p-8 slide_1">
                                <iframe class="w-full h-[300px] laptopxxl:h-[380px] 2xl:h-[400px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3862.1420374706836!2d121.06805067457175!3d14.53386687870807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c898136d1137%3A0x40afa2a755eeb34f!2sBagong%20Calzada%2C%20Taguig%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1717630948903!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <p class="text-sm text-[#fafafa] uppercase poppins lg:text-base 2xl:text-lg w-full">42 J.P. Rizal St. Bagong Kalsada, Tuktukan, Taguig</p>
                                <p class="text-sm text-[#fafafa] uppercase poppins lg:text-base">09454083993</p>
                            </div>
                        </div>
                        <div class="swiper-pagination flex items-end justify-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BUSINESS PERMITS -->
    <div class="xl:grid xl:grid-cols-2">
        <div class="w-full max-w-full h-auto bg-gradient-to-t from-[#FF1695] via-[#1A1D3B] to-[#1A1D3B] flex flex-col items-center flex-wrap justify-end py-8 px-4 mobilemd:px-6 sm:px-8 md:px-10 lg:px-24 xl:col-span-1 xl:bg-gradient-to-t xl:from-[#1A1D3B] xl:via-[#FF1695] xl:to-[#1A1D3B] xl:px-14 laptopxxl:px-16 2xl:px-20">
            <div class="h-full w-full flex flex-col items-center gap-4 py-4 md:gap-6 lg:justify-center">
                <div class="flex flex-col items-center gap-4 w-[90%] laptopxxl:w-full laptopxxl:items-start">
                    <p class="text-3xl text-nowrap uppercase font-semibold oswald pt-4 text-[#fafafa] md:text-4xl lg:text-5xl laptopxxl:text-6xl">BUSINESS PERMITS</p>
                    <p class="text-xs text-[#fafafa] poppins md:text-sm lg:text-base">Copies of business permits of our store branches. </p>
                </div>
                <div class="flex flex-col items-center gap-4 w-full text-[#610049] font-semibold oswald sm:grid sm:grid-cols-2 sm:gap-6 xl:grid-cols-1">
                    <button class="uppercase tracking-wider font-bold rounded-sm bg-gradient-to-r from-[#1F9799] via-[#33FCFF] to-[#1F9799] w-full p-1 sm:col-span-2 sm:p-2 lg:text-lg" id="branchPermitOneBtn">pinagsama, city of taguig</button>
                    <button class="uppercase tracking-wider font-bold rounded-sm bg-gradient-to-r from-[#1F9799] via-[#33FCFF] to-[#1F9799] w-full p-1 sm:col-span-2 sm:p-2 lg:text-lg" id="branchPermitTwoBtn">north signal village, city of taguig</button>
                    <button class="uppercase tracking-wider font-bold rounded-sm bg-gradient-to-r from-[#1F9799] via-[#33FCFF] to-[#1F9799] w-full p-1 sm:col-span-2 sm:p-2 lg:text-lg" id="branchPermitFourBtn">central bicutan, city of taguig</button>
                    <button class="uppercase tracking-wider font-bold rounded-sm bg-gradient-to-r from-[#1F9799] via-[#33FCFF] to-[#1F9799] w-full p-1 sm:col-span-2 sm:p-2 lg:text-lg" id="branchPermitThreeBtn">south signal village, city of taguig</button>
                    <button class="uppercase tracking-wider font-bold rounded-sm bg-gradient-to-r from-[#1F9799] via-[#33FCFF] to-[#1F9799] w-full p-1 sm:col-span-2 sm:p-3 lg:text-lg" id="branchPermitFiveBtn">tuktukan, city of taguig</button>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-b from-[#FF1695] via-[#1A1D3B] to-[#1A1D3B] flex flex-col items-center justify-center w-full h-[70vh] px-4 mobilemd:px-6 sm:h-screen sm:px-8 md:px-10 lg:px-24 xl:col-span-1 xl:bg-gradient-to-b xl:from-[#1A1D3B] xl:via-[#FF1695] xl:to-[#1A1D3B] xl:p-0 xl:pr-14 laptopxxl:pr-16 2xl:pr-20">
            <div class="h-[90%] w-full mixed-gradient-img flex items-center justify-center rounded-sm">
                <img src="./assets/businessPermitImages/branch1.jpg" alt="One" class="h-full w-full p-4 mixed-gradient-img" style="display: flex;" id="branchPermitOneImg">
                <img src="./assets/businessPermitImages/branch2.jpg" alt="Two" class="h-full w-full p-4 mixed-gradient-img" style="display: none;" id="branchPermitTwoImg">
                <img src="./assets/businessPermitImages/branch3.jpg" alt="Three" class="h-full w-full p-4 mixed-gradient-img" style="display: none;" id="branchPermitFourImg">
                <img src="./assets/businessPermitImages/branch4.jpg" alt="Four" class="h-full w-full p-4 mixed-gradient-img" style="display: none;" id="branchPermitThreeImg">
                <img src="./assets/businessPermitImages/branch5.jpeg" alt="Five" class="h-full w-full p-4 mixed-gradient-img" style="display: none;" id="branchPermitFiveImg">
            </div>
        </div>
    </div>

    <?php
    require("./config/Footer.php");
    define('SOURCE_FOOTER', './assets/Retro_Clouds_VS.jpg');
    footer();
    ?>

    <!-- Scripting -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./js/about.js"></script>
    <script src="https://kit.fontawesome.com/d870978cd1.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>