<?php
function imageSrc()
{
    echo  SOURCE_PATH;
}

if (isset($_POST['btnLogout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

?>
<header class="header absolute w-full left-0 top-0 z-50 p-0 mobilemd:p-1 iphone:p-2 laptopxxl:p-1">
    <div class="mx-auto">
        <div class="custom-nav bg-[#1A1D3B] flex justify-between items-center py-2 px-4 mobilemd:rounded-md mobilemd:px-6 sm:px-8 md:px-10 lg:px-12 xl:px-14 laptopxxl:px-16 2xl:px-20">
            <div class="px-0">
                <a href="index.php" class="flex items-center justify-center gap-2">
                    <img src="<?php imageSrc(); ?>" class="h-auto w-[50px] rounded-full mix-blend-lighten md:w-[60px] lg:w-[60px]">
                    <h1 class='retro_clouds_h1 uppercase font-bold text-xl iphone:text-2xl'>Retro Clouds</h1>
                </a>
            </div>

            <div class="flex items-center">
                <div class="flex lg:hidden cursor-pointer mr-2" id="open-nav-menu">
                    <span class='text-[#00FBFF] text-2xl'><i class="fa-solid fa-bars-staggered"></i></span>
                </div>

                <nav class="hidden lg:flex px-4">
                    <ul class="flex items-center space-x-8 md:items-center lg:space-x-12 laptopxxl:justify-between laptopxxl:items-center">
                        <li class="relative group">
                            <a href="index.php" class="poppins block py-3 text-base font-bold uppercase text-white hover:text-[#33FCFF] md:text-sm md:py-0 2xl:text-base">Home</a>
                        </li>

                        <li class="relative group">
                            <span href="#" class="poppins flex items-center justify-center gap-2 py-3 text-base font-bold uppercase text-white hover:text-[#33FCFF] md:text-sm 2xl:text-base">Pages <i class="fa-solid fa-chevron-down text-xs"></i></span>
                            <ul class="absolute left-0 top-full mt-1 w-48 border-t-4 border-[#FF1695] bg-[#33FCFF] shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity duration-300 -translate-y-3">
                                <li><a href="about.php" class="poppins font-bold uppercase block py-2 px-4 text-base text-[#1A1D3B] hover:text-[#FF1695] md:text-sm 2xl:text-base">About</a></li>
                                <li><a href="testimonials.php" class="poppins font-bold uppercase block py-2 px-4 text-base text-[#1A1D3B] hover:text-[#FF1695] md:text-sm 2xl:text-base">Testimonials</a></li>
                                <li><a href="faqs.php" class="poppins font-bold uppercase block py-2 px-4 text-base text-[#1A1D3B] hover:text-[#FF1695] md:text-sm 2xl:text-base">Faqs</a></li>
                                <?php
                                if (!empty($_SESSION['customer_ID'])) {
                                    echo "
                                            <li><a href='users-profile.php' class='poppins font-bold uppercase block py-2 px-4 text-base text-[#1A1D3B] hover:text-[#FF1695] md:text-sm 2xl:text-base'>Users Profile</a></li>
                                        ";
                                }
                                ?>
                            </ul>
                        </li>

                        <li><a href="catalog.php" class="poppins block py-3 text-base font-bold uppercase text-white hover:text-[#33FCFF] md:text-sm 2xl:text-base">Catalog</a></li>
                        <!-- <li id="loginDisplay" class="flex items-center justify-center"><a href="Login-Page.php" class="poppins flex items-center justify-center gap-2 py-2 px-6 border-2 border-[#33FCFF] bg-[#FF1695] rounded-full text-base font-bold uppercase text-white hover:text-[#33FCFF] md:py-1 md:px-4 md:text-base xl:text-base"><i class="fa-regular fa-circle-user text-lg laptopxxl:text-xl"></i> Login</a></li> -->
                        <?php
                        if (empty($_SESSION['customer_ID'])) {
                            echo "
                                <li id='loginDisplay' class='flex items-center justify-center'><a href='Login-Page.php' class='poppins flex items-center justify-center gap-2 py-2 px-6 border-2 border-[#33FCFF] bg-[#FF1695] rounded-full text-base font-bold uppercase text-white hover:text-[#33FCFF] md:py-1 md:px-4 md:text-base xl:text-base'><i class='fa-regular fa-circle-user text-lg laptopxxl:text-xl'></i> Login</a></li>
                                ";
                        } else {
                            echo "
                                <li id='logoutDisplay' class='flex items-center justify-center'><form action='' method='post'><button type='submit' class='poppins flex items-center justify-center gap-2 py-2 px-6 border-2 border-[#33FCFF] bg-[#FF1695] rounded-full text-base font-bold uppercase text-white hover:text-[#33FCFF] md:py-1 md:px-4 md:text-base xl:text-base' name='btnLogout'><i class='fa-regular fa-circle-user text-lg laptopxxl:text-xl'></i> Logout</button></form></li>
                                ";
                        }
                        // if (isset($_POST['loginDisplayBtn'])) {
                        //     session_destroy();
                        //     echo "<script>document.getElementById('loginDisplay').style.display = 'none';</script>";
                        //     echo "<script>document.getElementById('logoutDisplay').style.display = 'flex';</script>";

                        // }
                        ?>
                        <!-- <li id="logoutDisplay" style="display:none;" class="flex items-center justify-center"><form action="" method="post"><button type="submit" id="loginDisplayBtn" class="poppins flex items-center justify-center gap-2 py-2 px-6 border-2 border-[#33FCFF] bg-[#FF1695] rounded-full text-base font-bold uppercase text-white hover:text-[#33FCFF] md:py-1 md:px-4 md:text-base xl:text-base"><i class="fa-regular fa-circle-user text-lg laptopxxl:text-xl"></i> Logout</button></form></li> -->
                        <li><a href="#" id="sidebarCartSlideInBtn" class="block py-3 text-base font-bold uppercase text-white hover:text-[#33FCFF] laptopxxl:text-2xl"><ion-icon name="bag-handle-outline" class="text-2xl font-bold laptopxxl:text-[2rem]"></ion-icon></a></li>
                        <!-- <li class="flex items-start justify-start px-2"><a href="" class="h-[35px] w-[35px] text-2xl font-bold uppercase text-white bg-[#666] border-2 border-white rounded-full flex items-end justify-center overflow-hidden"><i class="fa-solid fa-user"></i></a></li> -->
                    </ul>
                </nav>
            </div>

            <div class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" id="menu-overlay"></div>
            <nav class="fixed top-0 right-0 h-full w-72 bg-gray-900 text-white transform translate-x-full transition-transform duration-300 z-50" id="nav-menu">
                <div class="flex justify-between items-center p-4">
                    <img src="<?php imageSrc(); ?>" class="h-auto w-[50px] rounded-full mix-blend-lighten">
                    <h1 class='retro_clouds_h1 uppercase font-bold text-xl lg:text-2xl'>Retro Clouds</h1>
                    <div class="cursor-pointer" id="close-nav-menu">
                        <span class='text-[#00FBFF] text-2xl'><i class='fa-solid fa-xmark'></i></span>
                    </div>
                </div>

                <ul class="space-y-4 p-4">
                    <li class="relative group">
                        <a href="index.php" class="poppins block py-2 px-4 text-base font-bold uppercase text-white hover:text-[#33FCFF]">Home</a>
                    </li>

                    <div class="flex flex-col items-start justify-start px-4 gap-2">
                        <div class="sub-menu w-full flex flex-col items-center justify-start p-0">
                            <span class="poppins w-full text-base font-bold uppercase text-white hover:text-[#33FCFF] py-2 flex justify-between items-center">Pages <i class="fa-solid fa-chevron-down text-xs dropdown-arrow"></i></span>
                        </div>

                        <div class="w-full px-2 flex items-start justify-start flex-col gap-2">
                            <ul id="dropdown" class="dropdown w-full gap-2" style="display: none; justify-content:start; align-items:start; flex-direction:column;">
                                <li class="py-2 w-full"><a href="about.php" class="w-full poppins text-base tracking-wider font-bold uppercase text-[#FF1695]">About</a></li>
                                <li class="py-2 w-full"><a href="testimonials.php" class="w-full poppins text-base tracking-wider font-bold uppercase text-[#FF1695]">Testimonials</a></li>
                                <li class="py-2 w-full"><a href="faqs.php" class="w-full poppins text-base tracking-wider font-bold uppercase text-[#FF1695]">Faqs</a></li>
                                <?php
                                if (!empty($_SESSION['customer_ID'])) {
                                    echo "
                                    <li><a href='users-profile.php' class='poppins font-bold uppercase block py-2 px-0 text-base text-[#FF1695] hover:text-[#FF1695] md:text-sm 2xl:text-base'>Users Profile</a></li>
                                    ";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <li><a href="catalog.php" class="poppins block py-2 px-4 text-base font-bold uppercase text-white hover:text-[#33FCFF]">Catalog</a></li>
                    <li><a href="#" id="sidebarCartBurgerSlideInBtn" class="block py-2 px-4 text-base font-bold uppercase text-white hover:text-[#33FCFF] md:text-lg"><ion-icon name="bag-handle-outline" class="text-2xl md:text-[2rem]"></ion-icon></a></li>
                    <?php
                        if (empty($_SESSION['customer_ID'])) {
                            echo "
                                    <li id='loginDisplay' class='flex items-center justify-start'><a href='Login-Page.php' class='poppins flex items-center justify-center gap-2 py-2 px-6 border-2 border-[#33FCFF] bg-[#FF1695] rounded-full text-base font-bold uppercase text-white hover:text-[#33FCFF] md:py-1 md:px-4 md:text-base xl:text-base'><i class='fa-regular fa-circle-user text-lg laptopxxl:text-xl'></i> Login</a></li>
                                    ";
                        } else {
                            echo "
                                    <li id='logoutDisplay' class='flex items-center justify-start'><form action='' method='post'><button type='submit' class='poppins flex items-center justify-center gap-2 py-2 px-6 border-2 border-[#33FCFF] bg-[#FF1695] rounded-full text-base font-bold uppercase text-white hover:text-[#33FCFF] md:py-1 md:px-4 md:text-base xl:text-base' name='btnLogout'><i class='fa-regular fa-circle-user text-lg laptopxxl:text-xl'></i> Logout</button></form></li>
                                    ";
                        }
                    ?>
                    <!-- <li><a href="#" class="w-1/2 poppins flex items-center justify-center gap-2 py-2 px-6 border-2 border-[#33FCFF] bg-[#FF1695] rounded-full text-base font-bold uppercase text-white hover:text-[#33FCFF]"><i class="fa-regular fa-circle-user text-lg"></i> Login</a></li> -->
                    <!-- <li class="flex items-start justify-start px-2"><a href="" class="h-[40px] w-[40px] text-2xl font-bold uppercase text-white bg-[#666] border-2 border-white rounded-full flex items-end justify-center overflow-hidden"><i class="fa-solid fa-user"></i></a></li> -->
                </ul>
            </nav>
        </div>
    </div>
    </div>
</header>

<div class="toast-box"></div>

<style>
    .custom-nav.sticky {
        background: #1A1D3B !important;
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        max-width: 100% !important;
        border-radius: 0 !important;
        margin: 0 !important;
    }

    .rotate {
        transform: rotate(90deg);
    }
</style>

<script>
    window.addEventListener("scroll", () => {
        let setCustomNav = document.querySelector(".custom-nav");
        setCustomNav.classList.toggle("sticky", window.scrollY > 20);
    });

    document.getElementById('open-nav-menu').addEventListener('click', function() {
        document.getElementById('nav-menu').classList.remove('translate-x-full');
        document.getElementById('menu-overlay').classList.remove('hidden');
    });

    document.getElementById('close-nav-menu').addEventListener('click', function() {
        document.getElementById('nav-menu').classList.add('translate-x-full');
        document.getElementById('menu-overlay').classList.add('hidden');
    });

    const subMenu = document.querySelector('.sub-menu');
    const dropdown = document.getElementById('dropdown');
    const dropdownArrow = document.querySelector('.dropdown-arrow');

    subMenu.addEventListener('click', (e) => {
        e.preventDefault();
        if (dropdown.style.display === "flex") {
            dropdown.style.display = "none";
            dropdownArrow.style.transform = "rotate(0deg)";
        } else {
            dropdown.style.display = "flex";
            dropdownArrow.style.transform = "rotate(180deg)";

        }
    });
</script>