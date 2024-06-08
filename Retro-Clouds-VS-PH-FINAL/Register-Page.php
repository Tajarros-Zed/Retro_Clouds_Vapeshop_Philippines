<?php 
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        session_start();
        require("./config/config.php");
        
        $_SESSION['firstnameTxt'] = $_POST['firstnameTxt'] ?? '';
        $_SESSION['lastnameTxt'] = $_POST['lastnameTxt'] ?? '';
        $_SESSION['emailTxt'] = $_POST['emailTxt'] ?? '';
        $_SESSION['birthdateTxt'] = $_POST['birthdateTxt'] ?? '';
        $_SESSION['passwordTxt'] = $_POST['passwordTxt'] ?? '';
        $_SESSION['confirmPasswordTxt'] = $_POST['confirmPasswordTxt'] ?? '';
        $systemMessage = "";
        $errors = [];
        
        function calculateAge($birthdate)
        {
            $birthDate = new DateTime($birthdate);
            $currentDate = new DateTime();
            $age = $currentDate->diff($birthDate)->y;
            return $age;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_SESSION['firstnameTxt'])) {
                $errors[] = "Please enter first name";
            }
        
            if (empty($_SESSION['lastnameTxt'])) {
                $errors[] = "Please enter last name";
            }
        
            if (empty($_SESSION['emailTxt'])) {
                $errors[] = "Please enter email";
            } else if (!filter_var($_SESSION['emailTxt'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format";
            }
        
            if (empty($_SESSION['birthdateTxt'])) {
                $errors[] = "Please enter birthdate";
            } else if (calculateAge($_SESSION['birthdateTxt']) < 18) {
                $errors[] = "You must be at least 18 years old to register";
            }
        
            if (empty($_SESSION['passwordTxt'])) {
                $errors[] = "Please enter password";
            } else if ($_SESSION['passwordTxt'] != $_SESSION['confirmPasswordTxt']) {
                $errors[] = "Passwords do not match";
            }
        
            if (empty($errors)) {
                $email = $_SESSION['emailTxt'];
                $emailCheckQuery = $conn->prepare("SELECT COUNT(*) as count FROM customer_tbl WHERE email = ?");
                $emailCheckQuery->bind_param("s", $email);
                $emailCheckQuery->execute();
        
                $result = $emailCheckQuery->get_result();
                if ($result === false) {
                    die("Execute failed: (" . $emailCheckQuery->errno . ") " . $emailCheckQuery->error);
                }
        
                $row = $result->fetch_assoc();
                if ($row['count'] > 0) {
                    $errors[] = "Email already taken";
                } else {
                    $firstname = ucwords($_SESSION['firstnameTxt']);
                    $lastname = ucwords($_SESSION['lastnameTxt']);
                    $birthdate = $_SESSION['birthdateTxt'];
                    $passwordHash = password_hash($_SESSION['passwordTxt'], PASSWORD_DEFAULT);
        
                    $sql = $conn->prepare("INSERT INTO customer_tbl (fname, lname, email, birthday, password) VALUES (?, ?, ?, ?, ?)");
                    $sql->bind_param("sssss", $firstname, $lastname, $email, $birthdate, $passwordHash);
        
                    try {
                        if ($sql->execute()) {
                            $systemMessage = "Registered successfully";
        
                            $_SESSION['firstnameTxt'] = "";
                            $_SESSION['lastnameTxt'] = "";
                            $_SESSION['emailTxt'] = "";
                            $_SESSION['birthdateTxt'] = "";
                            $_SESSION['passwordTxt'] = "";
                            $_SESSION['confirmPasswordTxt'] = "";
                        } else {
                            $errors[] = "Error: " . $sql->error;
                        }
                    } catch (mysqli_sql_exception $e) {
                        $errors[] = "Error: " . $e->getMessage();
                    }

                    header("Location: ./Login-Page.php");
                }
            }
        }


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
    <script src="https://cdn.tailwindcss.com"></script>
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
            background: linear-gradient(90deg, rgba(51,252,255,1) 30%, rgba(255,0,138,1) 71%, rgba(255,80,176,1) 100%);
            background-clip: text;
            color: transparent;
        }
        .oswald { font-family: "Oswald", sans-serif; }
        .poppins { font-family: "Poppins", sans-serif; }
        .bebas-neue { font-family: "Bebas Neue", sans-serif; }


        
        #registerPopup {
            display: flex !important;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full height */
            background-color: rgba(0, 0, 0, 0.5); /* Optional: To add a background overlay */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1;
        }


</style>




    </style>
</head>

<body class="bg-[#1A1D3B]">
    <!-- NAVIGATION -->
    <?php

        $_SESSION['customerID'] = $customerID??"";
        define('SOURCE_PATH', './assets/Retro_Clouds_VS.jpg');
        include("./config/Navigation.php");
    ?>

    <div id="registerPopup" class="w-full h-full items-center justify-center fixed top-10 z-50" style="display: block; background-image:linear-gradient(rgba(0,0,0,0.70), rgba(0,0,0,0.70)), url('./assets/img_divider_three.png'); background-size:cover; background-position:center;">>
        <div class="w-[300px] max-w-[300px] h-auto mt-12 rounded-md bg-[#1A1D3B] border-2 flex flex-col items-center justify-center flex-wrap mobilemd:mt-16 sm:w-[340px] sm:max-w-[340px] lg:w-[450px] lg:max-w-[450px]">
            <div class='flex items-center justify-center py-3 gap-2'>
                <img src="./assets/Retro_Clouds_VS.jpg" class="h-auto w-[50px] rounded-full mix-blend-lighten">
                <h1 class="retro_clouds_h1 uppercase font-bold text-2xl">Retro Clouds</h1>
            </div>

            <div class="py-0 md:py-5">
                <h1 class="text-[#FF1695] text-2xl font-bold poppins text-center">REGISTER</h1>
            </div>
            <span style="color:greenyellow; font-weight:bold"><?php echo $systemMessage; ?></span>

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($errors)) : ?>
                <div>
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><span style="color: red; font-weight:bold"><?php echo $error; ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <form method="post" class="flex flex-col items-center gap-4 py-7 px-6">
                    <div class="flex w-full gap-2">
                        <div class=" w-full flex flex-col items-start">
                            <h1 class="text-[#33FCFF] text-xs poppins">Firstname</h1>
                            <input type="text" name="firstnameTxt" class="w-full h-10 border-2 border-[#33FCFF] rounded-md py-2 px-4" value="<?php echo isset($_SESSION['firstnameTxt']) ? htmlspecialchars($_SESSION['firstnameTxt']) : ''; ?>">
                        </div>
                        <div class=" w-full flex flex-col items-start">
                            <h1 class="text-[#33FCFF] text-xs poppins">Lastname</h1>
                            <input type="text" name="lastnameTxt" class="w-full h-10 border-2 border-[#33FCFF] rounded-md py-2 px-4" value="<?php echo isset($_SESSION['lastnameTxt']) ? htmlspecialchars($_SESSION['lastnameTxt']) : ''; ?>">
                        </div>
                    </div>
                    <div class=" w-full flex flex-col items-start">
                        <h1 class="text-[#33FCFF] text-xs poppins">Email</h1>
                        <input type="text" name="emailTxt" class="w-full h-10 border-2 border-[#33FCFF] rounded-md py-2 px-4" value="<?php echo isset($_SESSION['emailTxt']) ? htmlspecialchars($_SESSION['emailTxt']) : ''; ?>">
                    </div>

                    <div class="w-full flex flex-col items-start">
                        <h1 class="text-[#33FCFF] text-xs poppins">Birthdate</h1>
                        <input type="date" name="birthdateTxt" class="w-full h-10 border-2 border-[#33FCFF] rounded-md py-2 px-4" value="<?php echo isset($_SESSION['birthdateTxt']) ? htmlspecialchars($_SESSION['birthdateTxt']) : ''; ?>">
                    </div>

                    <div class="grid grid-cols-2 w-full gap-4">
                        <div class=" w-full flex flex-col items-start">
                            <h1 class="text-[#33FCFF] text-xs poppins">Password</h1>
                            <input type="password" name="passwordTxt" class="w-full h-10 border-2 border-[#33FCFF] rounded-md py-2 px-4">
                        </div>

                        <div class=" w-full flex flex-col items-start">
                            <h1 class="text-[#33FCFF] text-xs poppins">Confirm Password</h1>
                            <input type="password" name="confirmPasswordTxt" class="w-full h-10 border-2 border-[#33FCFF] rounded-md py-2 px-4">
                        </div>
                    </div>

                    <input type="submit" name="submitBtn" class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#008F99] flex items-center justify-center gap-1 rounded-sm border border-white py-2 px-7 w-full cursor-pointer uppercase" value="Register">

                    <h1 class="text-[#FF1695] text-sm poppins font-bold">Already have an account? <a href="Login-Page.php" class="text-[#33FCFF] underline cursor-pointer">Log-in</a></h1>
                </form>
            </div>
        </div>


    <?php
        if(!empty($_SESSION['customerID'])) {
            header("Location: index.php");
        }

    ?>
    <script src="https://kit.fontawesome.com/d870978cd1.js" crossorigin="anonymous"></script>
    <!-- Ionic Icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>