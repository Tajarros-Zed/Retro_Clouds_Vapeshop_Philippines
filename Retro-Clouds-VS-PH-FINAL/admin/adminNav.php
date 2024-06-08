<?php
function imageSrc()
{
    echo  SOURCE_PATH;
}
if (isset($_POST['logoutAdminBtn'])) {
    session_destroy();
    header("Location: ../index.php");
}
?>
<header class="header absolute w-full left-0 top-0 z-50 p-0 mobilemd:p-1 iphone:p-2 lg:p-0">
    <div class="mx-auto">
        <div class="custom-nav bg-[#1A1D3B] flex justify-between items-center py-2 px-4 mobilemd:rounded-md mobilemd:px-6 sm:px-8 md:px-10 lg:px-12 xl:px-14 laptopxxl:px-16 2xl:px-20">
            <div class="px-0">
                <a href="sales.php" class="flex items-center justify-center gap-2">
                    <img src="<?php imageSrc(); ?>" class="h-auto w-[50px] rounded-full mix-blend-lighten md:w-[60px] lg:w-[60px]">
                    <h1 class='setTourney uppercase font-bold text-xl iphone:text-2xl'>Retro Clouds</h1>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex lg:hidden cursor-pointer mr-2 lg:m-0" id="open-nav-menu">
                    <span class='text-[#00FBFF] text-2xl'><i class="fa-solid fa-bars-staggered"></i></span>
                </div>

                <nav class="hidden lg:flex px-4 lg:px-0">
                    <ul class="flex space-x-8 md:items-center lg:space-x-8">
                        <li class="relative group">
                            <a href="sales.php" class="setPoppins block py-3 text-base font-bold uppercase text-white hover:text-[#33FCFF] md:text-sm md:py-0 2xl:text-base">Sales</a>
                        </li>

                        <li class="relative group">
                            <a href="management.php" class="setPoppins block py-3 text-base font-bold uppercase text-white hover:text-[#33FCFF] md:text-sm md:py-0 2xl:text-base">Management</a>
                        </li>

                        <li class="relative group">
                            <a href="users.php" class="setPoppins block py-3 text-base font-bold uppercase text-white hover:text-[#33FCFF] md:text-sm md:py-0 2xl:text-base">Users</a>
                        </li>

                        <li class="relative group">
                            <a href="inventory.php" class="setPoppins block py-3 text-base font-bold uppercase text-white hover:text-[#33FCFF] md:text-sm md:py-0 2xl:text-base">Inventory</a>
                        </li>

                        <li class="relative group">
                            <a href="admin-profile.php" class="setPoppins block py-3 text-base font-bold uppercase text-white hover:text-[#33FCFF] md:text-sm md:py-0 2xl:text-base">Profile</a>
                        </li>
                        <form method="post">
                            <li class="flex items-center justify-center"><button name="logoutAdminBtn" class="setPoppins flex items-center justify-center gap-2 py-2 px-6 border-2 border-[#33FCFF] bg-[#FF1695] rounded-full text-base font-bold uppercase text-white hover:text-[#33FCFF] md:py-1 md:px-4 md:text-base lg:m-0"><i class="fa-solid fa-user-shield text-base"></i> Log Out</button></li>
                        </form>
                    </ul>
                </nav>
            </div>

            <div class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" id="menu-overlay"></div>
            <nav class="fixed top-0 right-0 h-full w-72 bg-gray-900 text-white transform translate-x-full transition-transform duration-300 z-50" id="nav-menu">
                <div class="flex justify-between items-center p-4">
                    <img src="<?php imageSrc(); ?>" class="h-auto w-[50px] rounded-full mix-blend-lighten">
                    <h1 class='setTourney uppercase font-bold text-xl lg:text-2xl'>Retro Clouds</h1>
                    <div class="cursor-pointer" id="close-nav-menu">
                        <span class='text-[#00FBFF] text-2xl'><i class='fa-solid fa-xmark'></i></span>
                    </div>
                </div>

                <ul class="space-y-4 p-4">
                    <li class="relative group">
                        <a href="sales.php" class="setPoppins block py-2 px-4 text-base font-bold uppercase text-white hover:text-[#33FCFF]">Sales</a>
                    </li>

                    <li class="relative group">
                        <a href="management.php" class="setPoppins block py-2 px-4 text-base font-bold uppercase text-white hover:text-[#33FCFF]">Management</a>
                    </li>

                    <li class="relative group">
                        <a href="users.php" class="setPoppins block py-2 px-4 text-base font-bold uppercase text-white hover:text-[#33FCFF]">Users</a>
                    </li>

                    <li class="relative group">
                        <a href="inventory.php" class="setPoppins block py-2 px-4 text-base font-bold uppercase text-white hover:text-[#33FCFF]">Inventory</a>
                    </li>

                    <li class="relative group">
                        <a href="admin-profile.php" class="setPoppins block py-2 px-4 text-base font-bold uppercase text-white hover:text-[#33FCFF]">Profile</a>
                    </li>
                    <form method="post">
                        <li class="flex items-center justify-start"><button name="logoutAdminBtn" class="setPoppins flex items-center justify-center gap-2 py-2 px-6 border-2 border-[#33FCFF] bg-[#FF1695] rounded-full text-base font-bold uppercase text-white hover:text-[#33FCFF] md:py-1 md:px-4 md:text-base xl:text-base"><i class="fa-solid fa-user-shield text-base"></i> Log Out</button></li>
                    </form>
                </ul>
            </nav>
        </div>
    </div>
    </div>
</header>

<!-- <style>
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
</style> -->

<script>
    /*  window.addEventListener("scroll", () => {
        let setCustomNav = document.querySelector(".custom-nav");
        setCustomNav.classList.toggle("sticky", window.scrollY > 20);
    }) */

    document.getElementById('open-nav-menu').addEventListener('click', function() {
        document.getElementById('nav-menu').classList.remove('translate-x-full');
        document.getElementById('menu-overlay').classList.remove('hidden');
    });

    document.getElementById('close-nav-menu').addEventListener('click', function() {
        document.getElementById('nav-menu').classList.add('translate-x-full');
        document.getElementById('menu-overlay').classList.add('hidden');
    });

    document.getElementById('menu-overlay').addEventListener('click', function() {
        document.getElementById('nav-menu').classList.add('translate-x-full');
        document.getElementById('menu-overlay').classList.add('hidden');
    });
</script>