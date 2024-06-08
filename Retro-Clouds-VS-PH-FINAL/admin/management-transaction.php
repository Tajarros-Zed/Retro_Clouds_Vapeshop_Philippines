<?php
require "../config/config.php";
$getYearRange = "SELECT 
    DATE_FORMAT(transaction_date, '%Y') AS order_year,
    MIN(DATE_FORMAT(transaction_date, '%Y')) AS min_year,
    MAX(DATE_FORMAT(transaction_date, '%Y')) AS max_year
    FROM transaction_tbl";
$yearRange = mysqli_query($conn, $getYearRange);
$yearRangeRow = mysqli_fetch_assoc($yearRange);
$transactionID = $_POST['transactionID'] ?? "";
$status = $_POST['status'] ?? "";

if(!empty($transactionID) && !empty($status)) {
    $updateSelectedTransactionStatus = "UPDATE transaction_tbl SET status_id='$status' WHERE transaction_id = $transactionID";
    mysqli_query($conn, $updateSelectedTransactionStatus);
}
?>
<div
    class="bg-[#FF1695] rounded-lg border-2 border-cyan-400 w-full max-w-full h-[90vh] flex flex-col items-center justify-center mt-8 gap-4 sm:p-4 lg:h-[129vh] lg:max-h-[129vh] xl:h-[135vh] xl:max-h-[135vh] 2xl:h-[80vh] 2xl:max-h-[80vh]">
    <div
        class="w-full flex items-center justify-between flex-col lg:max-w-full lg:flex-row 2xl:max-w-full 2xl:flex-row">
        <h1
            class="text-[#fafafa] text-xl font-bold poppins p-2 text-center w-full lg:text-2xl lg:flex lg:justify-start lg:items-center lg:gap-2 2xl:text-2xl 2xl:text-left 2xl:flex 2xl:justify-start 2xl:items-center 2xl:gap-4">
            <span class="hidden lg:flex 2xl:text-2xl 2xl:items-center 2xl:justify-center"><i
                    class="fa-solid fa-bag-shopping"></i></span>TRANSACTION DIRECTORY
        </h1>
        <div class="w-full">
            <div <?php
            $searchMonth = $_POST['month'] ?? "";
            $searchYear = $_POST['year'] ?? "";
            ?>
                class="bg-[#33FCFF] text-[#FF1695] flex items-center gap-4 justify-start p-3 w-full rounded-sm sm:px-6 lg:p-2 xl:p-2 2xl:rounded-lg 2xl:px-4">
                <label
                    class="headings text-[#FF1695] text-xs font-semibold hidden w-[40%] sm:text-base md:text-lg lg:text-base xl:w-[50%] 2xl:w-[45%]">SEARCH</label>
                <select name="" id="month-search"
                    class="w-full ouline-none bg-gradient-to-b from-[#FF1695] to-[#33FCFF] border border-[#fafafa] rounded-sm p-2 setPoppins text-white text-center text-sm outline-none uppercase font-semibold lg:text-lg">
                    <option style="color: black" value="">Month</option>
                    <option style="color: black" value="1" <?php echo ($searchMonth == 1) ? "selected" : "" ?>>January
                    </option>
                    <option style="color: black" value="2" <?php echo ($searchMonth == 2) ? "selected" : "" ?>>February
                    </option>
                    <option style="color: black" value="3" <?php echo ($searchMonth == 3) ? "selected" : "" ?>>March
                    </option>
                    <option style="color: black" value="4" <?php echo ($searchMonth == 4) ? "selected" : "" ?>>April
                    </option>
                    <option style="color: black" value="5" <?php echo ($searchMonth == 5) ? "selected" : "" ?>>May
                    </option>
                    <option style="color: black" value="6" <?php echo ($searchMonth == 6) ? "selected" : "" ?>>June
                    </option>
                    <option style="color: black" value="7" <?php echo ($searchMonth == 7) ? "selected" : "" ?>>July
                    </option>
                    <option style="color: black" value="8" <?php echo ($searchMonth == 8) ? "selected" : "" ?>>August
                    </option>
                    <option style="color: black" value="9" <?php echo ($searchMonth == 9) ? "selected" : "" ?>>September
                    </option>
                    <option style="color: black" value="10" <?php echo ($searchMonth == 10) ? "selected" : "" ?>>October
                    </option>
                    <option style="color: black" value="11" <?php echo ($searchMonth == 11) ? "selected" : "" ?>>November
                    </option>
                    <option style="color: black" value="12" <?php echo ($searchMonth == 12) ? "selected" : "" ?>>December
                    </option>
                </select>
                <select name="" id="year-search"
                    class="w-full ouline-none bg-gradient-to-b from-[#FF1695] to-[#33FCFF] border border-[#fafafa] rounded-sm p-2 setPoppins text-white text-center text-sm uppercase font-semibold lg:text-lg">
                    <option style="color: black" value="" selected>Year</option>
                    <?php
                    for ($x = $yearRangeRow['min_year']; $x <= $yearRangeRow['max_year']; $x++) {
                        ?>
                        <option style='color: black' value='<?php echo $x ?>' <?php echo ($searchYear == $x) ? "selected" : "" ?>><?php echo $x ?></option>
                        <?php
                    }
                    ?>
                </select>
                <!-- <input id="search-value" value="<?php /*echo $searchString*/ ?>" type="text" name=""
                    class="w-full p-1 bg-transparent outline-none border-b border-[#FF1695] text-xs texts font-bold mobilelg:text-sm sm:text-base md:text-lg lg:text-base xl:text-base"
                    placeholder="Search transaction..." autocomplete="off"> -->
                <!-- <div id="transaction-search"
                    class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#33FCFF] flex items-center justify-center text-[8px] gap-1 rounded-full w-[50%] border border-[#33FCFF] py-1 cursor-pointer uppercase mobilelg:px-2 mobilelg:text-xs lg:w-1/3 lg:py-2 lg:rounded-sm lg:text-base">
                    SEARCH
                </div> -->
            </div>
        </div>
    </div>

    <div
        class="w-full h-[90%] flex items-center justify-center overflow-x-scroll overflow-y-scroll relative 2xl:h-full">
        <table class="table-auto border-2 border-white w-full absolute top-0">
            <thead>
                <tr class="border-[#fafafa] bg-[#33FCFF] text-[#FF1695]">
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Transac. ID</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Customer Name</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Email Address</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Mobile Number</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Shipping Address</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Transac. Date</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Overall Total</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Delivery Selected</th>
                    <th
                        class="px-4 py-1 border-2 border-white text-xs xl:text-sm xl:p-4 2xl:font-bold 2xl:uppercase 2xl:py-4 2xl:px-6">
                        Status</th>
                </tr>
            </thead>
            <tbody class="text-[#fafafa]">
                <?php
                require "../config/config.php";
                $searchFilter = "WHERE DATE_FORMAT(transaction_date, '%m') LIKE '%$searchMonth%' AND DATE_FORMAT(transaction_date, '%Y') LIKE '%$searchYear%'";
                $selectAlltransactions = "SELECT * FROM transaction_tbl JOIN customer_tbl ON transaction_tbl.customer_id = customer_tbl.costumer_id JOIN delivery_modes ON transaction_tbl.delivery_id = delivery_modes.delivery_id JOIN transaction_status_tbl ON transaction_tbl.status_id = transaction_status_tbl.status_id $searchFilter ORDER BY transaction_date DESC, transaction_id ASC";
                $countAlltransactions = "SELECT COUNT(transaction_id) AS count FROM transaction_tbl";
                $alltransactions = mysqli_query($conn, $selectAlltransactions);
                ini_set("display_errors", 0);
                $count = 10;
                while ($transactionRow = mysqli_fetch_assoc($alltransactions)) {
                    $total = number_format($transactionRow['sub_total'] + $transactionRow['shipping_fee'], 2);
                    $customerName = $transactionRow['fname'] . ' ' . $transactionRow['lname'];
                    ?>
                    <tr>
                        <td class='text-center border-2 border-white xl:text-sm xl:px-2'>
                            <?php echo $transactionRow['transaction_id'] ?></td>
                        <td class='text-center border-2 border-white xl:text-sm xl:px-2'><?php echo $customerName ?></td>
                        <td class='text-center border-2 border-white xl:text-sm xl:px-2'>
                            <?php echo $transactionRow['email'] ?></td>
                        <td class='text-center border-2 border-white xl:text-sm xl:px-2'>
                            <?php echo $transactionRow['mobile_number'] ?></td>
                        <td class='text-center border-2 border-white xl:text-sm xl:px-2'>
                            <?php echo $transactionRow['shipping_address'] ?></td>
                        <td class='text-center border-2 border-white xl:text-sm xl:px-2'>
                            <?php echo $transactionRow['transaction_date'] ?></td>
                        <td class='text-center border-2 border-white xl:text-sm xl:px-2'>₱ <?php echo $total ?></td>
                        <td class='text-center border-2 border-white xl:text-sm xl:px-2'>
                            <?php echo $transactionRow['delivery_name'] ?></td>
                        <td class='text-center border-2 border-white xl:text-sm xl:px-2'>
                            <select id="<?php echo $transactionRow['transaction_id'] ?>" class="status-update ouline-none bg-gradient-to-b from-[#FF1695] to-[#33FCFF] border border-[#33FCFF] outline-none rounded-sm p-2 setPoppins text-white text-center text-sm uppercase font-semibold">
                                <option style="color: black" value='1' <?php echo ($transactionRow['status_id'] == 1) ? "selected" : "" ?>>PENDING</>
                                <option style="color: black" value='2' <?php echo ($transactionRow['status_id'] == 2) ? "selected" : "" ?>>PROCESSING</>
                                <option style="color: black" value='3' <?php echo ($transactionRow['status_id'] == 3) ? "selected" : "" ?>>OUT FOR DELIVERY</>
                                <option style="color: black" value='4' <?php echo ($transactionRow['status_id'] == 4) ? "selected" : "" ?>>DELIVERED</>
                            </select>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <h1 class="text-[#fafafa] text-base font-bold poppins p-2 text-center w-full 2xl:text-lg">TOTAL TRANSACTION COUNT :
        <?php
        echo mysqli_fetch_assoc(mysqli_query($conn, $countAlltransactions))['count'];
        ?>
    </h1>
</div>
<script>
    $(document).ready(function () {
        $('#month-search').change(function (e) {
            const month = document.getElementById('month-search').value;
            const year = document.getElementById('year-search').value;
            $('#transactions-section').load('management-transaction.php', { month: month, year: year });
        });
        $('#year-search').change(function (e) {
            const month = document.getElementById('month-search').value;
            const year = document.getElementById('year-search').value;
            $('#transactions-section').load('management-transaction.php', { month: month, year: year });
        });
        $('.status-update').change(function (e) {
            const transactionID = e.currentTarget.id;
            const status = e.currentTarget.value;
            const month = document.getElementById('month-search').value;
            const year = document.getElementById('year-search').value;
            $('#transactions-section').load('management-transaction.php', { month: month, year: year, transactionID: transactionID, status: status });
        });
    });
</script>