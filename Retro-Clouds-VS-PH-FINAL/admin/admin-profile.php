<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PROFILE | Retro Clouds PH</title>
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="./sales.css">
    <link rel="shortcut icon" href="../assets/Favicon_Retro.png" type="image/x-icon">
</head>

<body class="bg-[#1A1D3B]">
    <?php
    define('SOURCE_PATH', '../assets/Retro_Clouds_VS.jpg');
    include("./adminNav.php");
    require("../config/database.php"); 

    $conn = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME); 

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["changePasswordBtn"])) {
        $passwordNew = $_POST["newPasswordTxt"];
        $confirmPassword = $_POST["confirmPasswordTxt"];
        $adminEmail = $_POST["adminEmailTxt"];

        if(empty($adminEmail) || empty($passwordNew) || empty($confirmPassword)) {
            echo "<script>alert('Fill all fields');</script>";
        } else {
            if ($passwordNew == $confirmPassword) {
                $hashPassword=password_verify($passwordNew,PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE admin_tbl SET password = ? WHERE email_address = ?");
                $stmt->bind_param("ss", $hashPassword, $adminEmail);
                $stmt->execute();

                $affectedRows = $stmt->affected_rows;
                if ($affectedRows <= 0) {
                    echo "<script>alert('No admin record found');</script>";
                } else {
                    echo "<script>alert('Admin password successfully changed');</script>";
                }
                $stmt->close();
            } else {
                echo "<script>alert('Passwords do not match');</script>";
            }
        }
    }
    ?>

    <div class='flex items-center justify-center p-3 gap-2'>
        <img src="../assets/Retro_Clouds_VS.jpg" class="h-auto w-[50px] rounded-full mix-blend-lighten">
        <h1 class="retro_clouds_h1 uppercase font-bold text-2xl">Retro Clouds</h1>
    </div>

    <div class="w-full max-w-full h-auto py-6 px-4 flex flex-col items-center justify-center flex-wrap gap-8 iphone:p-8 md:gap-6">
        <div class="w-full h-[15vh] flex flex-col justify-center items-center gap-4 md:gap-4">
            <h1 class="text-[#fafafa] text-4xl poppins uppercase font-black text-center md:text-5xl">ADMIN PROFILE</h1>
            <p class="text-[#33FCFF] uppercase font-medium text-sm md:text-lg">Your profile and information</p>
        </div>

        <div class="w-full max-w-full h-auto flex flex-col items-center justify-center gap-4 iphone:w-[400px] iphone:max-w-[400px] md:w-[700px] md:max-w-[700px] lg:w-[850px] lg:max-w-[850px]">
            <div class="w-full flex flex-1 flex-col">
                <div class="bg-[#ff1695] rounded-lg border-2 border-[#33FCFF] w-full max-w-full h-auto flex flex-col items-start justify-start flex-wrap p-4">
                    <form method="post" class="w-full flex flex-col items-start justify-start gap-4">
                        <h1 class="text-[#fafafa] font-black text-base w-full uppercase md:text-2xl">Change Password</h1>
                        <div class="bg-[#3ffcff] text-[#ff1695] flex items-center rounded-sm justify-start p-2 w-full md:p-4">
                            <label class="text-[#ff1695] text-xs font-semibold w-[60%] mobilemd:w-[70%] md:text-lg md:uppercase md:font-bold md:w-[50%]">Admin Email:</label>
                            <input type="text" name="adminEmailTxt" class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-medium md:text-xl md:font-bold md:p-2" placeholder="Admin Email..." autocomplete="off">
                        </div>

                        <div class="bg-[#3ffcff] text-[#ff1695] flex items-center rounded-sm justify-start p-2 w-full md:p-4">
                            <label class="text-[#ff1695] text-xs font-semibold w-[60%] mobilemd:w-[70%] md:text-lg md:uppercase md:font-bold md:w-[50%]">New Password:</label>
                            <input type="password" name="newPasswordTxt" class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-medium md:text-xl md:font-bold md:p-2" placeholder="New Password..." autocomplete="off">
                        </div>

                        <div class="bg-[#3ffcff] text-[#ff1695] flex items-center rounded-sm justify-start p-2 w-full md:p-4">
                            <label class="text-[#ff1695] text-xs font-semibold w-[60%] mobilemd:w-[70%] md:text-lg md:uppercase md:font-bold md:w-[50%]">Confirm New Password:</label>
                            <input type="password" name="confirmPasswordTxt" class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-xs texts font-medium md:text-xl md:font-bold md:p-2" placeholder="Confirm New Password..." autocomplete="off">
                        </div>
                        <input type="submit" name="changePasswordBtn" value="Change Password" class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#33FCFF] flex items-center justify-center gap-1 rounded-full w-full border border-white py-2 cursor-pointer uppercase lg:w-1/2 lg:p-4 lg:rounded-sm">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d870978cd1.js" crossorigin="anonymous"></script>
</body>

</html>