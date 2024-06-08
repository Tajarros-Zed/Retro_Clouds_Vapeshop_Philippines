<?php
if (!isset($_SESSION)) {
    // Start the session
    session_start();
}
require "config/config.php";
$newPass = $_POST['newPass'] ?? "";
$oldPass = $_POST['oldPass'] ?? "";
$newPassRetype = $_POST['newPassRetype'] ?? "";
$submit = $_POST['submit'] ?? false;

// $oldPass = password_verify($password_to_check, $hashed_password_from_db);
// $newPass = password_hash($password, PASSWORD_DEFAULT);

if(!empty($newPass) && !empty($oldPass) && !empty($newPassRetype)) {
    $checkOldPass = "SELECT * FROM `customer_tbl` WHERE `costumer_id` = '{$_SESSION['customer_ID']}'";
    $checkOldPassResult = mysqli_query($conn, $checkOldPass);
    $checkOldPassRow = mysqli_fetch_assoc($checkOldPassResult);
    if(!password_verify($oldPass, $checkOldPassRow['password'])) {
        $_SESSION['message'] = "INCORRECT OLD PASSWORD!";
    } else if($newPass != $newPassRetype) {
        $_SESSION['message'] = "NEW PASSWORD DOES NOT MATCH!";
    } else {
        $newPass = password_hash($newPass, PASSWORD_DEFAULT);
        $updatePass = "UPDATE `customer_tbl` SET `password` = '$newPass' WHERE `costumer_id` = '{$_SESSION['customer_ID']}'";
        $updatePassResult = mysqli_query($conn, $updatePass);
        if($updatePassResult) {
            $_SESSION['message'] = "PASSWORD CHANGED SUCCESSFULLY!";
        } else {
            $_SESSION['message'] = "PASSWORD CHANGE FAILED!";
        }
    }
} else if($submit) {
    $_SESSION['message'] = "PLEASE FILL ALL FIELDS!";
    $submit = false;
}

$getUserInfos = "SELECT * FROM `customer_tbl` WHERE `costumer_id` = '{$_SESSION['customer_ID']}'";
$getUserInfosResult = mysqli_query($conn, $getUserInfos);
$getUserInfosRow = mysqli_fetch_assoc($getUserInfosResult);
?>
<h1
    class=" text-[#fafafa] font-bold text-base w-full iphone:text-lg sm:text-2xl md:text-4xl lg:text-2xl lg:font-black uppercase laptopxxl:col-span-2">
    change password</h1>
    <h1
    class=" text-[#fafafa] font-bold text-base w-full iphone:text-lg sm:text-2xl md:text-4xl lg:text-2xl lg:font-black uppercase laptopxxl:col-span-2">
    <?php
    $_SESSION['message'] = $_SESSION['message'] ?? "";
    echo $_SESSION['message'];
    $_SESSION['message'] = "";
    ?>
</h1>

<div
    class="bg-[#33FCFF] text-[#FF1695] rounded-sm flex items-center justify-start p-3 w-full sm:px-6 lg:px-4 xl:p-2 laptopxxl:col-span-2">
    <label
        class=" text-[#FF1695] text-xs font-semibold w-[70%] sm:text-base md:text-lg lg:text-sm lg:w-[60%] xl:w-[80%] laptopxxl:hidden 2xl:w-[45%]">Old
        Password:</label>
    <input type="password" name="" id="oldPass"
        class="w-full p-1  bg-transparent border-b border-[#fafafa] outline-none text-xs texts font-medium sm:text-base md:text-lg lg:text-base"
        placeholder="Old password..." autocomplete="off">
</div>

<div class="bg-[#33FCFF] text-[#FF1695] rounded-sm flex items-center justify-start p-3 w-full sm:px-6 lg:px-4 xl:p-2">
    <label
        class=" text-[#FF1695] text-xs font-semibold w-[70%] sm:text-base md:text-lg lg:text-sm lg:w-[60%] xl:w-[80%] laptopxxl:hidden 2xl:w-[45%]">New
        Password:</label>
    <input type="password" name="" id="newPass"
        class="w-full p-1 bg-transparent border-b border-[#fafafa] outline-none text-xs texts font-medium sm:text-base md:text-lg lg:text-base"
        placeholder="New password..." autocomplete="off">
</div>

<div class="bg-[#33FCFF] text-[#FF1695] rounded-sm flex items-center justify-start p-3 w-full sm:px-6 lg:px-4 xl:p-2">
    <label
        class=" text-[#FF1695] text-xs font-semibold w-[70%] sm:text-base md:text-lg lg:text-sm lg:w-[60%] xl:w-[80%] laptopxxl:hidden 2xl:w-[45%]">Confirm
        New Password:</label>
    <input type="password" name="" id="newPassRetype"
        class="w-full p-1 bg-transparent border-b border-[#fafafa] outline-none text-xs texts font-medium sm:text-base md:text-lg lg:text-base"
        placeholder="Retype new password..." autocomplete="off">
</div>

<input type="submit" name="edit" value="CHANGE PASSWORD" id="update-password"
    class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#33FCFF] flex items-center justify-center gap-1 rounded-sm w-full border border-white py-3 cursor-pointer laptopxxl:col-span-2">

<div class="w-full flex items-center justify-center p-3 sm:px-6 lg:px-4 lg:flex-col xl:p-2 laptopxxl:col-span-2">
    <label
        class="text-[#fafafa] text-xs font-semibold w-full flex items-center justify-center sm:text-lg md:text-xl lg:text-base lg:flex-row">
        Forgot your password? &nbsp;<a href="" class="underline text-[#33FCFF]"> Email us
            here</a></label>
</div>
<script>
    $(document).ready(function () {
        $('#update-password').click(function (e) {
            const oldPass = document.getElementById('oldPass').value;
            const newPass = document.getElementById('newPass').value;
            const newPassRetype = document.getElementById('newPassRetype').value;

            $('#users-password-section').load('users-profile-password.php', { oldPass: oldPass, newPass: newPass, newPassRetype: newPassRetype, submit: true});
        });
    });
</script>