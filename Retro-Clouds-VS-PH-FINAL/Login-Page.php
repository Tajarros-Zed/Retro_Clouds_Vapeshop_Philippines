<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
session_start();
require("./config/config.php");



$errors = [];
$systemMessage ="";

if (isset($_POST['loginBtn'])) {
    $emailAddressTxt = $_POST['emailAddressTxt'];
    $password = $_POST['passwordTxt'];

    if (empty($emailAddressTxt)) {
        $errors[] = "Email is required";
    } elseif (empty($password)) {
        $errors[] = "Password is required";
    } else {
        $sql = "SELECT * FROM admin_tbl WHERE email_address = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $emailAddressTxt);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if ($password === $row['password']) {
                $_SESSION['emailAddressTxt'] = $row['email_address'];
                $_SESSION['amdinType'] = $row['admin_type'];
                $_SESSION['customerID'] = $row['costumer_id'];
                $systemMessage = "Successfully ADMIN logged in";
                header("Location:./admin/sales.php");
            } else {
                $errors[] = "Invalid Password";
            }
        } else {

            $sql = "SELECT * FROM customer_tbl WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $emailAddressTxt);
            $stmt->execute();
            $result = $stmt->get_result();

            

            if ($result && $result->num_rows == 1) {
                $row = $result->fetch_assoc();

                if (password_verify($password, $row['password'])) {

                    $_SESSION['emailAddressTxt'] = $row['email'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['customer_ID'] = $row['costumer_id'];
                    $systemMessage = "Successfully CUSTOMER logged in";
                    $loginStatus = true;
                    if(!empty($_SESSION['customer_ID'])) {
                        header('location: index.php');
                    }
                    
                } else {
                    $errors[] = "Invalid Password";
                }
            } else {    
                $errors[] = "Invalid email or password";
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
    <title>Retro Clouds PH | Login</title>
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="shortcut icon" href="./assets/Favicon_Retro.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/Component.css">
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

        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Tourney:ital,wght@0,100..900;1,100..900&display=swap');

        .retro_clouds_h1 {
            font-family: "Tourney", sans-serif;
            background: linear-gradient(90deg, rgba(51, 252, 255, 1) 30%, rgba(255, 0, 138, 1) 71%, rgba(255, 80, 176, 1) 100%);
            background-clip: text;
            color: transparent;
        }

        .oswald {
            font-family: "Oswald", sans-serif;
        }

        .poppins {
            font-family: "Poppins", sans-serif;
        }

        .bebas-neue {
            font-family: "Bebas Neue", sans-serif;
        }

        #loginPopup {
            display: flex !important;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Full height */
            background-color: rgba(0, 0, 0, 0.5);
            /* Optional: To add a background overlay */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1;
        }

        #registerPopup {
            display: none !important;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Full height */
            background-color: rgba(0, 0, 0, 0.5);
            /* Optional: To add a background overlay */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1;
        }

        #navigation {
            z-index: 0;
        }
    </style>
</head>

<body class="bg-[#1A1D3B]">
    <!-- NAVIGATION -->
    <?php
    define('SOURCE_PATH', './assets/Retro_Clouds_VS.jpg');
    include("./config/Navigation.php");
    $_SESSION['customerID'] = $customerID ?? "";
    ?>

    <div id="loginPopup" class="w-full h-full items-center justify-center fixed top-0 z-10" style="display: block; background-image:linear-gradient(rgba(0,0,0,0.70), rgba(0,0,0,0.70)), url('./assets/img_divider_three.png'); background-size:cover; background-position:center;">
        <div class="w-[350px] max-w-[350px] h-auto rounded-lg bg-[#1A1D3B] border-2 p-4 lg:w-[400px] lg:max-w-[400px]">
            <div class='flex items-center justify-between p-3 gap-2'>
                <img src="./assets/Retro_Clouds_VS.jpg" class="h-auto w-[50px] rounded-full mix-blend-lighten">
                <h1 class="retro_clouds_h1 uppercase font-bold text-2xl">Retro Clouds</h1>
            </div>

            <div class="py-5">
                <h1 class="text-[#FF1695] text-2xl font-bold poppins text-center">LOG-IN</h1>
            </div>


            <div class="w-full flex flex-col ">
                <span class="text-center text-[#00ff00]"><?php echo $systemMessage; ?></span>
                <ul>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($errors)) :
                        foreach ($errors as $error) :
                    ?>
                            <li class="w-full flex flex-col"><span class="text-red-600 text-base font-bold poppins text-center"><?php echo $error; ?></span></li>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>

            <form method="post" id="loginForm" class="flex flex-col items-center gap-4 py-7 px-4">
                <div class=" w-full flex flex-col items-start">
                    <h1 class="text-[#33FCFF] text-sm poppins">Email</h1>
                    <input type="text" id="emailAddressTxt" name="emailAddressTxt" class="w-full h-10 border-2 border-[#33FCFF] rounded-sm py-2 px-4" value="<?php echo isset($emailAddressTxt) ? htmlspecialchars($emailAddressTxt) : ''; ?>">
                </div>

                <div class=" w-full flex flex-col items-start">
                    <h1 class="text-[#33FCFF] text-sm poppins">Password</h1>
                    <input type="password" id="passwordTxt" name="passwordTxt" class="w-full h-10 border-2 border-[#33FCFF] rounded-sm py-2 px-4">
                </div>

                <div class="w-full flex flex-col items-start">
                    <input type="submit" name="loginBtn" class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#008F99] flex items-center justify-center gap-1 rounded-sm border border-white py-2 px-7 w-full cursor-pointer" value="LOGIN">
                    <button type="button" name="loginBtn" class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#008F99] items-center justify-center gap-1 rounded-sm border border-white py-2 px-7 w-full cursor-pointer hidden" value="BACK">BACK</button>
                </div>

                <h1 class="text-[#FF1695] text-sm poppins font-bold">Don't have an account?&nbsp;&nbsp;&nbsp; <a href="Register-Page.php" id="open-register-modal" class="text-[#33FCFF] underline cursor-pointer">Register</a></h1>
            </form>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/d870978cd1.js" crossorigin="anonymous"></script>
    <!-- Ionic Icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>


</html>