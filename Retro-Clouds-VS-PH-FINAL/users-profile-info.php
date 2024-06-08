<?php
if (!isset($_SESSION)) {
    // Start the session
    session_start();
}
require "config/config.php";
$fname = $_POST['fname'] ?? "";
$lname = $_POST['lname'] ?? "";
$contact = $_POST['contact'] ?? "";
$submit = $_POST['submit'] ?? false;
$fname = filter_var($fname, FILTER_SANITIZE_STRING);
$lname = filter_var($lname, FILTER_SANITIZE_STRING);
$contact = filter_var($contact, FILTER_SANITIZE_NUMBER_INT);

if(!empty($fname) || !empty($lname) || !empty($contact)) {
    if (!empty($fname)) {
        $updateFName = "UPDATE customer_tbl SET fname = '$fname' WHERE costumer_id = '{$_SESSION['customer_ID']}'";
        mysqli_query($conn, $updateFName);
        $_SESSION['message'] = "USERS PROFILE HAS BEEN UDPATED!";
    }
    if (!empty($lname)) {
        $updateLName = "UPDATE customer_tbl SET lname = '$lname' WHERE costumer_id = '{$_SESSION['customer_ID']}'";
        mysqli_query($conn, $updateLName);
        $_SESSION['message'] = "USERS PROFILE HAS BEEN UDPATED!";
    }
    if (!empty($contact)) {
        $updateContact = "UPDATE customer_tbl SET contact_num = '$contact' WHERE costumer_id = '{$_SESSION['customer_ID']}'";
        mysqli_query($conn, $updateContact);
        $_SESSION['message'] = "USERS PROFILE HAS BEEN UDPATED!";
    }
} else if($submit) {
    $_SESSION['message'] = "NO CHANGES HAS BEEN MADE!";
    $submit = false;
}

$getUserInfos = "SELECT * FROM `customer_tbl` WHERE `costumer_id` = '{$_SESSION['customer_ID']}'";
$getUserInfosResult = mysqli_query($conn, $getUserInfos);
$getUserInfosRow = mysqli_fetch_assoc($getUserInfosResult);
?>
<h1
    class=" text-[#fafafa] font-bold text-base uppercase w-full iphone:text-lg sm:text-xl lg:text-2xl lg:font-black laptopxxl:col-span-2">
    USER INFORMATION</h1>
<h1
    class=" text-[#fafafa] font-bold text-base uppercase w-full iphone:text-lg sm:text-xl lg:text-2xl lg:font-black laptopxxl:col-span-2"><?php
    $_SESSION['message'] = $_SESSION['message'] ?? "";
    echo $_SESSION['message'];
    $_SESSION['message'] = "";
    ?></h1>
<div
    class="bg-[#33FCFF] text-[#FF1695] rounded-sm flex items-center justify-start p-3 w-full sm:px-6 lg:p-2 laptopxxl:col-span-2">
    <label
        class=" text-[#FF1695] text-xs font-semibold w-[70%] sm:text-base md:text-base lg:text-base lg:w-[60%] xl:w-[80%] laptopxxl:hidden 2xl:w-[45%]">Email:</label>
    <input type="email" name="" value="<?php echo $getUserInfosRow['email'] ?>"
        class="w-full p-1 bg-transparent border-b border-[#fafafa] outline-none text-xs texts font-medium sm:text-base md:text-lg lg:text-base"
        placeholder="" autocomplete="off" disabled>
</div>

<div
    class="bg-[#33FCFF] text-[#FF1695] rounded-sm flex items-center justify-start p-3 w-full sm:px-6 lg:p-2 laptopxxl:col-span-1">
    <label
        class=" text-[#FF1695] text-xs font-semibold w-[70%] sm:text-base md:text-lg lg:text-base lg:w-[60%] xl:w-[80%] laptopxxl:hidden 2xl:w-[45%]">First
        Name:</label>
    <input type="text" name="" id="fname"
        class="w-full p-1  bg-transparent border-b border-[#fafafa] outline-none text-xs texts font-medium sm:text-base md:text-lg lg:text-base"
        placeholder="<?php echo $getUserInfosRow['fname'] ?>" autocomplete="off">
</div>

<div
    class="bg-[#33FCFF] text-[#FF1695] rounded-sm flex items-center justify-start p-3 w-full sm:px-6 lg:p-2 laptopxxl:col-span-1">
    <label
        class=" text-[#FF1695] text-xs font-semibold w-[70%] sm:text-base md:text-lg lg:text-base lg:w-[60%] xl:w-[80%] laptopxxl:hidden 2xl:w-[45%]">Last
        Name:</label>
    <input type="text" name="" id="lname"
        class="w-full p-1 bg-transparent border-b border-[#fafafa] outline-none text-xs texts font-medium sm:text-base md:text-lg lg:text-base"
        placeholder="<?php echo $getUserInfosRow['lname'] ?>" autocomplete="off">
</div>

<div class="bg-[#33FCFF] text-[#FF1695] rounded-sm flex items-center justify-start p-3 w-full sm:px-6 lg:p-2">
    <label
        class=" text-[#FF1695] text-xs font-semibold w-[70%] sm:text-base md:text-lg lg:text-base lg:w-[60%] xl:w-[80%] laptopxxl:hidden 2xl:w-[45%]">Contact
        Number:</label>
    <input type="number" name="" id="contact"
        class="w-full p-1 bg-transparent border-b border-[#fafafa] outline-none text-xs texts font-medium sm:text-base md:text-lg lg:text-base"
        placeholder="<?php echo $getUserInfosRow['contact_num'] ?>" autocomplete="off">
</div>

<div class="bg-[#33FCFF] text-[#FF1695] rounded-sm flex items-center justify-start p-3 w-full sm:px-6 lg:p-2">
    <label
        class="  text-xs font-semibold w-[70%] sm:text-base md:text-lg lg:text-base lg:w-[60%] xl:w-[80%] laptopxxl:hidden 2xl:w-[45%]">Birthdate:</label>
    <input type="text" name="" min="<?php echo date('Y-m-d'); ?>"
        max="<?php echo date('Y-m-d', strtotime('+365 days')); ?>"
        class="w-full p-1 bg-transparent border-b border-[#fafafa] outline-none text-xs texts font-medium sm:text-base md:text-lg xl:text-base"
        disabled id="datePicker" value="<?php echo $getUserInfosRow['birthday'] ?>">
</div>

<input type="submit" id="update-profile" name="edit" value="Update Profile"
    class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#33FCFF] flex items-center justify-center gap-1 rounded-sm w-full border border-white py-2 cursor-pointer uppercase laptopxxl:col-span-2">
<script>
    $(document).ready(function () {
        $('#update-profile').click(function (e) {
            const fname = document.getElementById('fname').value;
            const lname = document.getElementById('lname').value;
            const contact = document.getElementById('contact').value;

            console.log("CLICKED");
            $('#users-info-section').load('users-profile-info.php', { fname: fname, lname: lname, contact: contact, submit: true });
        });
    });
</script>