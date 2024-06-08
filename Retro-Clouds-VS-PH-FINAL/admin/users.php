<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS DASHBOARD | Retro Clouds PH</title>
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="./sales.css">
    <link rel="shortcut icon" href="../assets/Favicon_Retro.png" type="image/x-icon">
    <style>
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background-color: #1A1D3B;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(#1A1D3B, #FF1695, #1A1D3B);
        }
    </style>
</head>

<body class="bg-[#1A1D3B]">
    <?php
    define('SOURCE_PATH', '../assets/Retro_Clouds_VS.jpg');
    include("./adminNav.php");
    require("../config/database.php"); 
    ini_set("display_errors", 0);

    $conn = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME); 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sqlGetAllUsers = "SELECT * FROM customer_tbl"; 
    $result1 = $conn->query($sqlGetAllUsers);
    
    if (!$result1) {
        die("Query failed: " . $conn->error);
    } 
    
    
    $disableSubmit = true;
    if(isset($_POST["searchBtn"])){
        $disableSubmit = false;
        $sqlFetchUserData= "SELECT * FROM customer_tbl WHERE email='{$_POST['userEmailTxt']}'";
        $result2 = $conn->query($sqlFetchUserData);
        if (!$result2) {
            die("Query failed: ". $conn->error);
        }
        $userdata = $result2->fetch_assoc();
        $affectedRows=$result2->num_rows;
        if($affectedRows <=0){
            echo "<script> alert('No registered user found');</script>";
        }
    } 


        if (isset($_POST["updateBtn"])) {
            $disableSubmit = true;
            $status = $_POST['userStatusLst'];
        
            
            $sqlGetUpdateUser = "UPDATE customer_tbl
                SET account_status = '$status'
                WHERE email='{$_POST['userEmailTxt']}'"; 
        
            $result3 = $conn->query($sqlGetUpdateUser);
            if (!$result3) {
                die("Query failed: " . $conn->error);
            } 
        }
    ?>


    <div class='flex items-center justify-center p-3 gap-2'>
        <img src="../assets/Retro_Clouds_VS.jpg" class="h-auto w-[50px] rounded-full mix-blend-lighten">
        <h1 class="retro_clouds_h1 uppercase font-bold text-2xl">Retro Clouds</h1>
    </div>

    <div class="w-full h-auto py-2 px-4 lg:grid lg:grid-cols-4 lg:gap-4 lg:p-6">
        <div class="w-full h-[15vh] flex flex-col justify-center items-center lg:col-span-4 laptopxxl:gap-4">
            <h1 class="text-[#fafafa] text-2xl poppins uppercase font-bold text-center lg:text-[2rem] laptopxxl:text-4xl">Users Dashboard</h1>
            <p class="text-[#33FCFF] uppercase lg:text-lg"> retro cloudes vape lounge</p>
        </div>

        <form method="post" class="w-full flex flex-1 flex-col lg:col-span-1">
                <div class="bg-[#FF1695] rounded-lg border-2 border-cyan-400  w-full max-w-full h-auto flex flex-col items-start justify-start flex-wrap px-2 py-4 mt-8 iphone:p-4 lg:p-2 xl:p-4">
                    <div class="w-full flex flex-col items-start justify-start gap-4 md:gap-6 lg:gap-4">
                        <h1 class="headings text-[#fafafa] font-bold text-lg uppercase w-full iphone:text-xl sm:text-2xl md:text-4xl lg:text-2xl lg:text-center">UPDATE USER</h1>
                        <div class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start gap-2 p-3 w-full sm:px-6 lg:p-2">
                            <label class="headings text-[#FF1695] text-sm font-bold w-[55%] sm:text-base md:text-lg lg:text-sm lg:w-[80%] xl:w-[50%] 2xl:w-[45%] laptopxxl:text-base">Email:</label>
                            <input type="email" name="userEmailTxt" class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-sm texts font-medium sm:text-base md:text-lg lg:text-sm lg:p-1 xl:text-base" placeholder="Email..." autocomplete="off" value="<?php if(isset($_POST['userEmailTxt'])){echo $userdata['email']; } else { echo " ";}   ?>">
                        </div>

                        <div class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start gap-2 p-3 w-full sm:px-6 lg:p-2">
                            <label class="headings text-[#FF1695] text-sm font-bold w-[55%] sm:text-base md:text-lg lg:text-sm lg:w-[80%] xl:w-[50%] 2xl:w-[45%] laptopxxl:text-base">First Name:</label>
                            <input type="text" name="" class="w-full p-1  bg-transparent outline-none border-b border-[#fafafa] text-sm texts font-medium sm:text-base md:text-lg lg:text-sm lg:p-1 xl:text-base" placeholder="First Name..." autocomplete="off" disabled value="<?php if(isset($_POST['userEmailTxt'])){echo ucwords($userdata['fname']); } else { echo "";}   ?>">
                        </div>

                        <div class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start gap-2 p-3 w-full sm:px-6 lg:p-2">
                            <label class="headings text-[#FF1695] text-sm font-bold w-[55%] sm:text-base md:text-lg lg:text-sm lg:w-[80%] xl:w-[50%] 2xl:w-[45%] laptopxxl:text-base">Last Name:</label>
                            <input type="text" name="" class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-sm texts font-medium sm:text-base md:text-lg lg:text-sm lg:p-1 xl:text-base" placeholder="Last Name..." autocomplete="off" disabled value="<?php if(isset($_POST['userEmailTxt'])){echo ucwords($userdata['lname']); } else { echo "";}   ?>">
                        </div>

                        <div class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start gap-2 p-3 w-full sm:px-6 lg:p-2">
                            <label class="headings text-sm font-bold w-[55%] sm:text-base md:text-lg lg:text-sm lg:w-[80%] xl:w-[50%] 2xl:w-[45%] laptopxxl:text-base">Birth Date:</label>
                            <input type="date" name="" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+365 days')); ?>" class="w-full p-1 bg-transparent outline-none border-b border-[#fafafa] text-sm texts font-medium sm:text-base md:text-lg lg:text-sm lg:p-1 xl:text-base" disabled id="datePicker" value="<?php if(isset($_POST['userEmailTxt'])){echo $userdata['birthday']; } else { echo "";}   ?>">
                        </div>

                        <div class="bg-[#33FCFF] text-[#FF1695] flex items-center rounded-sm justify-start gap-2 p-3 w-full sm:px-6 lg:p-2">
                            <label class="headings text-sm font-bold w-[55%] sm:text-base md:text-lg lg:text-sm lg:w-[80%] xl:w-[50%] 2xl:w-[45%] laptopxxl:text-base">Status:</label>
                            <select name="userStatusLst" class="w-full p-1  bg-transparent outline-none border-b border-[#fafafa] text-sm texts font-medium sm:text-base md:text-lg lg:text-sm lg:p-1 xl:text-base" <?php if ($disableSubmit) echo 'disabled'; ?>>
                                <option value="" selected>Select</option>
                                <option value="VERIFIED">VERIFIED</option>
                                <option value="DENIED">DENIED</option>
                            </select>
                        </div>

                        <div class="w-full flex gap-4 lg:flex-col 2xl:grid 2xl:grid-cols-2">
                            <input type="submit" name="searchBtn" value="Search User" class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#33FCFF] flex items-center justify-center text-sm gap-1 rounded-full w-full border border-white py-1 px-4 cursor-pointer uppercase iphone:py-2">
                            <input type="submit" name="updateBtn" value="Update User" class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#33FCFF] flex items-center justify-center text-sm gap-1 rounded-full w-full border border-white py-1 px-4 cursor-pointer uppercase iphone:py-2" <?php if ($disableSubmit) echo 'disabled'; ?>>
                        </div>

                    </div>
                </div>

            </form>

        <div class="w-full max-w-full h-auto flex flex-col items-center justify-center gap-4 lg:col-span-3">
            <div class="bg-[#FF1695] rounded-lg border-2 border-cyan-400  w-full max-w-full h-[90vh] flex flex-col items-start justify-start px-2 py-4 mt-8 gap-4 iphone:p-4 xl:p-6 2xl:p-8">
                <h1 class="text-[#fafafa] text-lg font-bold poppins lg:text-2xl lg:w-full">USERS REGISTERED</h1>
                <div class="w-full h-[90%] flex items-center justify-center overflow-x-scroll overflow-y-scroll relative iphone:overflow-x-hidden">
                    <table class="table-auto border-2 border-white w-full absolute top-0">
                        <thead>
                            <tr class="border-[#fafafa] bg-[#33FCFF] text-[#FF1695]">
                                <th class="px-2 py-1 border-2 border-white iphone:px-4 iphone:py-2 sm:text-base xl:py-3 xl:px-5 xl:font-bold 2xl:text-lg 2xl:uppercase 2xl:font-black 2xl:py-4">Full Name</th>
                                <th class="px-2 py-1 border-2 border-white iphone:px-4 iphone:py-2 sm:text-base xl:py-3 xl:px-5 xl:font-bold 2xl:text-lg 2xl:uppercase 2xl:font-black 2xl:py-4">Email</th>
                                <th class="px-2 py-1 border-2 border-white iphone:px-4 iphone:py-2 sm:text-base xl:py-3 xl:px-5 xl:font-bold 2xl:text-lg 2xl:uppercase 2xl:font-black 2xl:py-4">Birthdate</th>
                                <th class="px-2 py-1 border-2 border-white iphone:px-4 iphone:py-2 sm:text-base xl:py-3 xl:px-5 xl:font-bold 2xl:text-lg 2xl:uppercase 2xl:font-black 2xl:py-4">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-[#fafafa]">
                            <?php
                            ini_set("display_errors", 0);
                            $count = 10;
                            while ( $users = $result1 -> fetch_assoc()) {

                            ?>
                                <tr>
                                    <td class="px-2 py-1 border-2 border-white iphone:py-2 sm:text-sm xl:text-base xl:font-medium 2xl:text-lg 2xl:py-4"><?php echo ucwords($users['fname']). " " . ucwords($users['lname']);  ?></td>
                                    <td class="px-2 py-1 border-2 border-white iphone:py-2 sm:text-sm xl:text-base xl:font-medium 2xl:text-lg 2xl:py-4"><?php echo lcfirst($users['email']);  ?></td>
                                    <td class="px-2 py-1 border-2 border-white text-center iphone:py-2 sm:text-sm xl:text-base xl:font-medium 2xl:text-lg 2xl:py-4"><?php echo $users['birthday'];  ?></td>
                                    <td class="px-2 py-1 border-2 border-white text-center iphone:py-2 sm:text-sm xl:text-base xl:font-medium 2xl:text-lg 2xl:py-4"> <?php echo $users['account_status']; ?></td>
                                </tr>
                            <?php
                                $i++;
                            };
                            ?>
                        </tbody>
                    </table>
                </div>
                <h1 class="text-[#fafafa] text-base font-bold poppins iphone:text-lg lg:text-2xl">TOTAL USER COUNT : <?php echo $result1->num_rows. " USERS "; ?></h1>
            </div>
            <style>
                @media (min-width: 320px) {
                    th,
                    td {
                        padding: 2px;
                        font-size: 10px;
                    }
                }

                @media (min-width: 1024px) {
                    th,
                    td {
                        padding: 2px;
                        font-size: .7rem;
                    }
                }

                @media (min-width: 1536px) {
                    th,
                    td {
                        padding: 4px;
                        font-size: .9rem;
                    }
                }
            </style>
        </div>
    </div>
    </div>


    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d870978cd1.js" crossorigin="anonymous"></script>
</body>

</html>