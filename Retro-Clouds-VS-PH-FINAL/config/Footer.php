<?php

function setFooterLogo()
{
    echo  SOURCE_FOOTER;
}

function footer()
{
?>

    <div class="w-full max-w-full h-auto p-4 bg-[#1A1D3B] flex flex-1 flex-col items-start justify-start flex-wrap py-12 mobilemd:px-6 sm:px-8 md:px-10 lg:px-12 xl:px-14 xl:mb-14 laptopxxl:px-16 laptopxxl:mb-18 laptopxxl:py-20 2xl:px-20">
        <div class="w-full max-w-full h-auto flex flex-1 flex-col items-start justify-start gap-8 mobilelg:grid mobilelg:grid-cols-2 mobilelg:gap-x-0 lg:grid lg:grid-cols-3 lg:gap-8">
            <div class="w-full flex flex-col items-start justify-start gap-4 mobilelg:col-span-2 lg:col-span-1 laptopxxl:gap-6">
                <img src="<?php setFooterLogo(); ?>" class="h-auto w-[80px] mix-blend-lighten sm:w-[100px] md:w-[120px]">
                <p class="retro_clouds_p text-white font-bold text-xs uppercase sm:text-sm md:text-base laptopxxl:text-lg 2xl:w-1/2">All you need to create a perfect cloud.</p>

                <div class="w-full flex-1 gap-8 mobilelg:col-span-2 sm:gap-12 lg:col-span-1 hidden lg:flex lg:gap-4 laptopxxl:gap-6">
                    <a href="https://www.facebook.com/RetroClouds" target="_blank" class="w-[40px] h-[40px] rounded-full flex items-center justify-center text-center bg-[#FF1695] text-xl text-white sm:w-[50px] sm:h-[50px] sm:text-2xl lg:w-[40px] lg:h-[40px] lg:text-lg"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="" class="w-[40px] h-[40px] rounded-full flex items-center justify-center text-center bg-[#FF1695] text-xl text-white sm:w-[50px] sm:h-[50px] sm:text-2xl lg:w-[40px] lg:h-[40px] lg:text-lg"><i><i class="fa-brands fa-instagram"></i></i></a>
                    <a href="mailto:johnjosephnavarro@yahoo.com" class="w-[40px] h-[40px] rounded-full flex items-center justify-center text-center bg-[#FF1695] text-xl text-white sm:w-[50px] sm:h-[50px] sm:text-2xl lg:w-[40px] lg:h-[40px] lg:text-lg"><i class="fa-solid fa-envelope"></i></a>
                </div>
            </div>

            <div class="w-full flex flex-1 gap-8 mobilelg:col-span-2 sm:gap-12 lg:col-span-1 lg:hidden">
                <a href="https://www.facebook.com/RetroClouds" target="_blank" class="w-[40px] h-[40px] rounded-full flex items-center justify-center text-center bg-[#FF1695] text-xl text-white sm:w-[50px] sm:h-[50px] sm:text-2xl"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="" class="w-[40px] h-[40px] rounded-full flex items-center justify-center text-center bg-[#FF1695] text-xl text-white sm:w-[50px] sm:h-[50px] sm:text-2xl"><i><i class="fa-brands fa-instagram"></i></i></a>
                <a href="" class="w-[40px] h-[40px] rounded-full flex items-center justify-center text-center bg-[#FF1695] text-xl text-white sm:w-[50px] sm:h-[50px] sm:text-2xl"><i class="fa-solid fa-envelope"></i></a>
            </div>

            <div class="w-full grid grid-cols-2 grid-rows-1 mobilelg:col-span-2 lg:col-span-1">
                <div class="w-full flex flex-col items-start justify-start gap-6 sm:gap-4 lg:gap-12">
                    <h2 class="retro_clouds_h2 w-full text-[#FF1695] uppercase text-sm font-bold mb-4 sm:text-base md:text-lg lg:text-base laptopxxl:text-lg">Quick Links</h2>
                    <a href="index.php" class="hover:text-[#FF1695] retro_clouds_p w-full text-white uppercase text-xs font-bold sm:text-sm md:text-base lg:text-sm laptopxxl:text-base">Home</a>
                    <a href="about.php" class="hover:text-[#FF1695] retro_clouds_p w-full text-white uppercase text-xs font-bold sm:text-sm md:text-base lg:text-sm laptopxxl:text-base">About</a>
                    <a href="testimonials.php" class="hover:text-[#FF1695] retro_clouds_p w-full text-white uppercase text-xs font-bold sm:text-sm md:text-base lg:text-sm laptopxxl:text-base">Testimonials</a>
                    <a href="catalog.php" class="hover:text-[#FF1695] retro_clouds_p w-full text-white uppercase text-xs font-bold sm:text-sm md:text-base lg:text-sm laptopxxl:text-base">Catalog</a>
                </div>

                <div class="w-full flex flex-col items-center justify-center gap-6 sm:gap-4 lg:col-span-1 lg:items-start lg:justify-start lg:gap-8">
                    <h2 class="retro_clouds_h2 w-full text-[#FF1695] uppercase text-sm font-bold mb-4 sm:text-base md:text-lg lg:text-base laptopxxl:text-lg">Stay Connected</h2>
                    <p class="retro_clouds_p w-full text-white uppercase text-xs font-bold sm:text-sm md:text-base lg:text-sm laptopxxl:text-base">Pinagsama, City of Taguig</p>
                    <p class="retro_clouds_p w-full text-white uppercase text-xs font-bold sm:text-sm md:text-base lg:text-sm laptopxxl:text-base">North signal Vilalge, city of taguig</p>
                    <p class="retro_clouds_p w-full text-white uppercase text-xs font-bold sm:text-sm md:text-base lg:text-sm laptopxxl:text-base">Central bicutan, city of taguig</p>
                    <p class="retro_clouds_p w-full text-white uppercase text-xs font-bold sm:text-sm md:text-base lg:text-sm laptopxxl:text-base">south signal village, city of taguig</p>
                    <p class="retro_clouds_p w-full text-white uppercase text-xs font-bold sm:text-sm md:text-base lg:text-sm laptopxxl:text-base">tuktukan, city of taguig</p>
                </div>
            </div>

            <div class="w-full flex flex-col items-start justify-start gap-2 mobilelg:col-span-1 sm:justify-between sm:h-full lg:h-auto lg:hidden">
                <h2 class="retro_clouds_h2 text-white text-base font-semibold uppercase w-full">Monday to Friday</h2>
                <p class="retro_clouds_p text-white text-base font-semibold uppercase w-full">11:00 AM - 10:00 PM</p>
            </div>

            <div class="w-full flex flex-col items-start justify-start gap-4 mobilelg:col-span-1 mobilelg:gap-2 xl:justify-end xl:items-end xl:text-right">
                <div class="w-full hidden flex-col items-start justify-start gap-2 mobilelg:col-span-1 sm:justify-between sm:h-full lg:h-auto lg:flex lg:gap-1">
                    <h2 class="retro_clouds_h2 text-white text-base font-semibold uppe rcase w-full laptopxxl:text-lg">Monday to Friday</h2>
                    <p class="retro_clouds_p text-white text-base font-semibold uppercase w-full lg:mb-4 xl:mb-8 laptopxxl:text-lg">11:00 AM - 10:00 PM</p>
                </div>
                <h2 class="retro_clouds_h2 w-full text-[#FF1695] text-base uppercase font-semibold sm:font-bold md:text-lg laptopxxl:text-xl">Subscribe to our news letter</h2>
                <div class="flex items-start justify-start bg-[#1A1D3B] w-[80%] max-w-[80%] h-[33px] rounded-full border-2 border-[#FF1695] mobilelg:w-full mobilelg:max-w-full xl:w-[70%]">
                    <form action="" method="" class="w-full max-w-full flex">
                        <input type="email" class="w-full border-none outline-none bg-[#1A1D3B] rounded-full text-white py-1 px-6 retro_clouds_h2 text-sm" placeholder="Your Email...">
                        <a href="" name="setNewsLetter" class="bg-[#33FCFF] rounded-e-full px-4 border-s-2 border-[#FF1695] flex items-center justify-center sm:px-8">
                            <span class="text-[#ff1696a4] retro_clouds_h2 uppercase text-sm font-bold sm:text-base"><i class="fa-solid fa-right-from-bracket"></i></span>
                        </a>
                    </form>
                </div>
                <div class="w-full hidden flex-col items-start justify-start gap-4 mobilelg:col-span-2 lg:flex lg:mt-4 xl:mt-8">
                    <a href="Terms_and_Condition.pdf" class="retro_clouds_h2 w-full text-white text-sm uppercase font-semibold hover:text-[#33FCFF] sm:text-base lg:text-lg" download>Terms and Condition</a>
                    <a href="Privacy_and_Policy.pdf" class="retro_clouds_h2 w-full text-white text-sm uppercase font-semibold hover:text-[#33FCFF] sm:text-base lg:text-lg" download="">Privacy and Policy</a>
                    <a href="#scroll-top" class="retro_clouds_h2 hover:text-[#33FCFF] w-full text-white text-sm uppercase font-semibold sm:text-base lg:text-lg">Scroll to Top</a>
                </div>
            </div>

            <div class="w-full flex flex-col items-start justify-start gap-4 mobilelg:col-span-2 lg:hidden">
                <a href="Terms_and_Condition.pdf" class="retro_clouds_h2 w-full text-white text-sm uppercase font-semibold hover:text-[#33FCFF] sm:text-base lg:text-lg" download>Terms and Condition</a>
                <a href="" class="retro_clouds_h2 w-full text-white text-sm uppercase font-semibold sm:text-base" download>Privacy Policy</a>
                <a href="#scroll-top" class="retro_clouds_h2 w-full text-white text-sm uppercase font-semibold sm:text-base">Scroll to Top</a>
            </div>
        </div>
    </div>

    <div class="w-full max-w-full h-auto bg-[#33FCFF] flex items-center justify-center flex-wrap px-2 py-2">
        <h1 class="retro_clouds_h2 text-center uppercase font-bold text-base text-[#610049] sm:text-lg">Ivauzch 2024 All Rights Reserved</h1>
    </div>
<?php
}
?>