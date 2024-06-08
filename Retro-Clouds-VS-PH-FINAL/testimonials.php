<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials | Retro Clouds PH</title>
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/testimonials.css">
    <link rel="shortcut icon" href="./assets/Favicon_Retro.png" type="image/x-icon">
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
    </style>
</head>

<body class="bg-[#1A1D3B] select-none" id="scroll-top">
    <?php
    session_start();
    require("./config/database.php");
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME); //PROCEDURAL

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $_SESSION['customerID'] = $_SESSION['customerID'] ?? "";
    define('SOURCE_PATH', './assets/Retro_Clouds_VS.jpg');
    include("./config/Navigation.php");
    include("./config/sidebar-cart.php");
    ?>
    <div class="w-full h-[150vh] bg-gradient-to-t from-[#FF1695] to-transparent flex flex-col items-center justify-start gap-4 md:h-[90vh] md:max-h-[90vh] lg:px-12 xl:px-14 laptopxxl:h-[95vh] laptopxxl:max-h-[95vh] laptopxxl:px-28 laptopxxl:gap-6 2xl:px-32">
        <div class="w-full h-[25%] flex flex-col justify-end px-4 mobilemd:px-6 sm:h-[40vh] sm:max-h-[40vh] sm:px-8 md:px-10 2xl:px-0">
            <p class="poppins text-[#FF1695] font-semibold uppercase iphone:text-lg">Testimonials</p>
            <p class="text-[#fafafa] text-3xl font-bold iphone:text-4xl">WHAT OUR CUSTOMER SAYS</p>
        </div>

        <div class="w-full h-[100%] flex flex-col justify-around gap-4 px-4 mobilemd:px-6 sm:h-auto sm:px-8 md:grid md:grid-cols-2 md:h-[90vh] md:max-h-[90vh] md:px-10 lg:px-0 laptopxxl:gap-y-8 laptopxxl:gap-x-20 laptopxxl:h-screen laptopxxl:max-h-screen">
            <div class="bg-[#1A1D3B] w-full h-1/5 rounded-lg border border-[#33FCFF] p-4 iphone:h-1/4 sm:h-full laptopxxl:p-4">
                <div class="w-full text-[#FF1695] text-xl font-semibold flex flex-col items-center justify-center h-1/2">
                    <?php
                    $sql = "SELECT * FROM feedback_tbl WHERE feedback_id = 1";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)) {
                        $row = mysqli_fetch_array($result);
                        $d = strtotime($row["reg_date"]);
                        $date = date("F j, Y", $d);
                    ?>
                        <h1 class="poppins text-xs font-medium text-center iphone:text-lg sm:text-xl md:text-base"><?php echo "\"" . ucfirst($row['customer_feedback']) . "\""; ?></h1>
                </div>
                <div class="gap-4 text-[#fafafa] text-xl font-semibold flex items-center justify-evenly h-1/2">
                    <div class="bg-transparent w-[40px] h-[40px] flex items-center justify-center iphone:w-[70px] iphone:h-[70px] sm:w-[60px] sm:h-[60px]"><img src="./assets/testimonial_two.jpg" class="h-auto w-full rounded-full border border-[#FF1695]"></div>

                    <div class="w-[70%] flex flex-col items-start justify-start gap-2 text-xs sm:gap-0">
                        <div class="w-full flex items-center justify-between">
                            <p class="poppins font-semibold iphone:text-lg md:text-sm"><?php echo $row['name']; ?></p>
                            <p class="poppins font-semibold iphone:text-lg md:text-sm">Customer</p>
                        </div>
                        <p class="poppins font-semibold text-base sm:text-sm"><?php echo $date; ?></p>
                    <?php }
                    ?>
                    </div>
                </div>
            </div>
            <div class="bg-[#1A1D3B] w-full h-1/5 rounded-lg border border-[#33FCFF] p-4 iphone:h-1/4 sm:h-full laptopxxl:p-4">
                <div class="text-[#FF1695] text-xl font-semibold flex flex-col items-center justify-center h-1/2">
                    <?php
                    $sql = "SELECT * FROM feedback_tbl WHERE feedback_id = 2";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)) {
                        $row = mysqli_fetch_array($result);
                        $d = strtotime($row["reg_date"]);
                        $date = date("F j, Y", $d);
                    ?>
                        <h1 class="poppins text-xs font-medium text-center iphone:text-lg sm:text-xl md:text-base"><?php echo "\"" . ucfirst($row['customer_feedback']) . "\""; ?></h1>
                </div>
                <div class="gap-4 text-[#fafafa] text-xl font-semibold flex items-center justify-evenly h-1/2">
                    <div class="bg-transparent w-[40px] h-[40px] flex items-center justify-center iphone:w-[70px] iphone:h-[70px] sm:w-[60px] sm:h-[60px]"><img src="./assets/testimonial_three.jpg" class="h-auto w-full rounded-full border border-[#FF1695]"></div>
                    <div class="w-[70%] flex flex-col items-start justify-start gap-2 text-xs">
                        <div class="w-full flex items-center justify-between">
                            <p class="poppins font-semibold iphone:text-lg md:text-sm"><?php echo $row['name']; ?></p>
                            <p class="poppins font-semibold iphone:text-lg md:text-sm">Customer</p>
                        </div>
                        <p class="poppins font-semibold text-base sm:text-sm"><?php echo $date; ?></p>
                    <?php }
                    ?>
                    </div>
                </div>
            </div>
            <div class="bg-[#1A1D3B] w-full h-1/5 rounded-lg border border-[#33FCFF] p-4 iphone:h-1/4 sm:h-full laptopxxl:p-4">
                <div class="text-[#FF1695] text-xl font-semibold flex flex-col items-center justify-center h-1/2">
                    <?php
                    $sql = "SELECT * FROM feedback_tbl WHERE feedback_id = 3";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)) {
                        $row = mysqli_fetch_array($result);
                        $d = strtotime($row["reg_date"]);
                        $date = date("F j, Y", $d);
                    ?>
                        <h1 class="poppins text-xs font-medium text-center iphone:text-lg sm:text-xl md:text-base"><?php echo "\"" . ucfirst($row['customer_feedback']) . "\""; ?></h1>
                </div>
                <div class="gap-4 text-[#fafafa] text-xl font-semibold flex items-center justify-evenly h-1/2">
                    <div class="bg-transparent w-[40px] h-[40px] flex items-center justify-center iphone:w-[70px] iphone:h-[70px] sm:w-[60px] sm:h-[60px]"><img src="./assets/testimonial_four.jpg" class="h-auto w-full rounded-full border border-[#FF1695]"></div>
                    <div class="w-[70%] flex flex-col items-start justify-start gap-2 text-xs">
                        <div class="w-full flex items-center justify-between">
                            <p class="poppins font-semibold iphone:text-lg md:text-sm"><?php echo $row['name']; ?></p>
                            <p class="poppins font-semibold iphone:text-lg md:text-sm">Customer</p>
                        </div>
                        <p class="poppins font-semibold text-base sm:text-sm"><?php echo $date; ?></p>
                    <?php }
                    ?>
                    </div>
                </div>
            </div>
            <div class="bg-[#1A1D3B] w-full h-1/5 rounded-lg border border-[#33FCFF] p-4 iphone:h-1/4 sm:h-full laptopxxl:p-4">
                <div class="text-[#FF1695] text-xl font-semibold flex flex-col items-center justify-center h-1/2">
                    <?php
                    $sql = "SELECT * FROM feedback_tbl WHERE feedback_id = 4";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)) {
                        $row = mysqli_fetch_array($result);
                        $d = strtotime($row["reg_date"]);
                        $date = date("F j, Y", $d);
                    ?>
                        <h1 class="poppins text-xs font-medium text-center iphone:text-lg sm:text-xl md:text-base"><?php echo "\"" . ucfirst($row['customer_feedback']) . "\""; ?></h1>
                </div>
                <div class="gap-4 text-[#fafafa] text-xl font-semibold flex items-center justify-evenly h-1/2">
                    <div class="bg-transparent w-[40px] h-[40px] flex items-center justify-center iphone:w-[70px] iphone:h-[70px] sm:w-[60px] sm:h-[60px]"><img src="./assets/testimonial_one.jpg" class="h-auto w-full rounded-full border border-[#FF1695]"></div>
                    <div class="w-[70%] flex flex-col items-start justify-start gap-2 text-xs">
                        <div class="w-full flex items-center justify-between">
                            <p class="poppins font-semibold iphone:text-lg md:text-sm"><?php echo $row['name']; ?></p>
                            <p class="poppins font-semibold iphone:text-lg md:text-sm">Customer</p>
                        </div>
                        <p class="poppins font-semibold text-base sm:text-sm"><?php echo $date; ?></p>
                    <?php }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full h-auto flex flex-col items-center justify-start gap-3 bg-gradient-to-b from-[#FF1695] via-transparent to-transparent px-4 mobilemd:px-6 iphone:gap-6 sm:px-8 md:px-10 lg:grid lg:grid-cols-2 lg:py-20 lg:px-12 xl:px-14 laptopxxl:px-[6.5rem] laptopxxl:gap-20">
        <div class="w-full h-[55vh] flex flex-col items-start justify-end gap-4 sm:h-[50vh] sm:max-h-[50vh] lg:h-[40vh] lg:max-h-[40vh] xl:px-14 laptopxxl:items-start laptopxxl:justify-start laptopxxl:place-content-center laptopxxl:place-items-start">
            <p class="text-[#33FCFF] uppercase text-xl poppins laptopxxl:text-2xl font-bold">Our Journey</p>
            <p class="text-[#fafafa] text-3xl font-bold poppins uppercase">trusted by our customer since 2000</p>
            <p class="text-[#fafafa] text-sm  poppins">At Retro Clouds, we've been dedicated to providing top-quality vaping products and exceptional customer service.</p>
            <a href="./catalog.php">
                <div class="bg-gradient-to-b from-[#FF1695] to-[#008F99] flex items-center justify-center gap-1 rounded-full border border-white py-2 px-7">
                    <i class="fa-solid fa-bag-shopping text-white"></i>
                    <h1 class="text-white oswald iphone:font-bold">SHOP NOW</h1>
                </div>
            </a>
        </div>

        <div class="w-full h-[100vh] grid grid-cols-1 grid-rows-4 gap-5 px-0 iphone:grid iphone:grid-cols-2 iphone:grid-rows-2 iphone:h-[50vh] lg:h-[40vh] xl:pr-14 2xl:place-content-center 2xl:place-items-center">
            <div class="w-full 2xl:w-[80%] h-full bg-gradient-to-b from-[#FF1695] to-[#ff169649] rounded-2xl border border-cyan-300 text-white flex flex-col text-xl justify-center items-center poppins font-medium text-center p-2">
                <?php
                $sql = "SELECT * FROM customer_tbl";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($result);


                ?>
                <p class="w-[90%] text-2xl sm:text-4xl laptopxxl:text-5xl font-bold"><?php echo $rows; ?></p>
                <p class="w-[90%]">Customers</p>
            </div>
            <div class="w-full 2xl:w-[80%] h-full bg-gradient-to-b from-[#FF1695] to-[#ff169649] rounded-2xl border border-cyan-300 text-white flex flex-col text-xl justify-center items-center poppins font-medium text-center p-2">
                <?php
                //$sql = "SELECT * FROM sales_tbl";
                //$result = mysqli_query($conn,$sql);
                //$rows = mysqli_num_rows($result);


                $sql = "SELECT SUM(product_quantity) AS total_quantity_sold FROM orders";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $totalQuantitySold = $row['total_quantity_sold'];
                $dataHolder = $totalQuantitySold % 100;
                if ($dataHolder <= 0 || $totalQuantitySold < 100) {
                    $soldByTens = $totalQuantitySold;
                } else {
                    $quantitySold = floor($totalQuantitySold / 100);
                    $soldByTens = $quantitySold * 100 . "<span class='absolute top-0 text-2xl laptopxxl:text-3xl'>+</span>";
                }

                ?>
                <p class="w-[90%] text-2xl font-bold relative sm:text-4xl laptopxxl:text-5xl"><?php echo $soldByTens; ?></p>
                <p class="w-[90%]">Sold Products</p>
            </div>
            <div class="w-full 2xl:w-[80%] h-full bg-gradient-to-b from-[#FF1695] to-[#ff169649] rounded-2xl border border-cyan-300 text-white flex flex-col text-xl justify-center items-center poppins font-medium text-center p-2">
                <?php
                $sql = "SELECT * FROM brands";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($result);
                ?>
                <p class="w-[90%] text-2xl sm:text-4xl laptopxxl:text-5xl font-bold"><?php echo $rows; ?></p>
                <p class="w-[90%]">Total Brands</p>
            </div>
            <div class="w-full 2xl:w-[80%] h-full bg-gradient-to-b from-[#FF1695] to-[#ff169649] rounded-2xl border border-cyan-300 text-white flex flex-col text-xl justify-center items-center poppins font-medium text-center p-2">
                <p class="w-[90%] text-2xl sm:text-4xl laptopxxl:text-5xl font-bold">7</p>
                <p class="w-[90%]">Payment Options</p>
            </div>
        </div>
    </div>

    <div class="w-full h-[50vh] flex items-end justify-end">
        <div class="w-full h-[70%] testimonial"></div>
    </div>

    <div class="h-[140vh] w-full forms-testimonials-img flex justify-center px-4 mobilemd:px-6 iphone:h-[120vh] sm:px-8 md:px-10 lg:h-[70vh] lg:max-h-[70vh] lg:py-0 lg:pb-12 lg:px-12 lg:justify-start xl:pb-14 xl:px-14 laptopxxl:px-26 laptopxxl:pb-16">
        <div class="h-full w-full grid grid-cols-1 grid-rows-2 gap-4 lg:grid-cols-2 lg:grid-rows-1 lg:justify-center">
            <div class="rounded-b-xl bg-gradient-to-b from-[#33FCFF] to-[#1F9799] flex flex-col items-center gap-4 lg:w-[80%] lg:p-4">
                <form action="" method="post" class="w-[90%] h-full flex flex-col items-center justify-center gap-3">
                    <div class="w-full h-1/5 flex items-center justify-center gap-3">

                        <img src="./assets/Retro_Clouds_VS.jpg" class="h-auto w-[30%] rounded-full iphone:w-[80px] lg:w-[100px] laptopxxl:w-[80px]">

                        <div class="w-[70%] h-auto">
                            <p class="text-[#FF1695] uppercase font-medium text-sm poppins laptopxxl:text-base">FEEDBACK FORM</p>
                            <p class="text-[#fafafa] uppercase font-bold text-lg poppins line leading-6 laptopxxl:text-2xl">How was your experiencece</p>
                        </div>
                    </div>
                    <div class="text-[#fafafa] poppins w-full max-w-full">
                        <p>Name</p>
                        <input type="text" name="feedbackName" class="w-full text-[#fafafa] text-lg bg-gradient-to-r rounded-2xl drop-shadow-[3px_3px_0_#fafafa] from-[#FF1695] to-[#990D5A] iphone:px-4 lg:py-1 laptopxxl:py-1">
                    </div>
                    <div class="text-[#fafafa] poppins w-full max-w-full">
                        <p>Email</p>
                        <input type="email" name="feedbackEmail"  class="w-full text-[#fafafa] text-lg bg-gradient-to-r rounded-2xl drop-shadow-[3px_3px_0_#fafafa] from-[#FF1695] to-[#990D5A] iphone:px-4 lg:py-1 laptopxxl:py-1">
                    </div>
                    <div class="text-[#fafafa] poppins w-full">
                        <p>Comments</p>
                        <textarea name="feedbackComments" class="w-full text-[#fafafa] text-lg bg-gradient-to-r rounded-2xl drop-shadow-[3px_3px_0_#fafafa] from-[#FF1695] to-[#990D5A] resize-none iphone:px-4 laptopxxl:py-2"></textarea>
                    </div>
                    <button type="submit" name="sendFeedbackBtn" class="bg-gradient-to-b from-[#FF1695] to-[#008F99] flex items-start justify-start gap-1 rounded-sm border border-white py-2 px-7">
                        <h1 class="text-white font-bold">SEND FEEDBACK</h1>
                    </button>
                    <?php
                    if (isset($_POST['sendFeedbackBtn'])) {
                        if (empty($_POST['feedbackName']) || empty($_POST['feedbackEmail']) || empty($_POST['feedbackComments'])) {
                            echo "<script>window.alert('Please fill all the fields')</script>";
                        } else {
                            $sql = "INSERT INTO feedback_tbl (name, customer_email, customer_feedback) VALUES ('{$_POST['feedbackName']}', '{$_POST  ['feedbackEmail']}', '{$_POST['feedbackComments']}')";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                echo "<script>alert('Thank you for your feedback!')</script>";
                                session_destroy();
                            } else {
                                echo "<script>alert('Something went wrong!')</script>";
                            }
                        }
                    }
                    ?>
                </form>
            </div>
            <div class="w-full flex flex-col justify-center gap-3 px-4 iphone:gap-6">
                <h1 class="retro_clouds_h1 uppercase font-bold text-3xl iphone:text-4xl">Retro Clouds</h1>
                <p class="text-[#fafafa] text-3xl font-bold oswald uppercase iphone:text-5xl">"Life is all about creating the perfect vape cloud."</p>
                <p class="text-white text-lg poppins">We value your feedback! Share your thoughts and help us enhance your vaping experience. Your insights make all the difference. </p>
            </div>
        </div>
    </div>

    <?php
    require("./config/Footer.php");
    define('SOURCE_FOOTER', './assets/Retro_Clouds_VS.jpg');
    footer();
    ?>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d870978cd1.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>