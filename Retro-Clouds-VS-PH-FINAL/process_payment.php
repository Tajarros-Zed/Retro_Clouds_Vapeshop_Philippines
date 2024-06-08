<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Link</title>
    <link rel="shortcut icon" href="./assets/Favicon_Retro.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/Component.css">
    <style>
        .customShadow {
            transition: all 300ms linear;
        }

        .customShadow:hover {
            box-shadow: 0 0 25px #33FCFF;
        }

        .customInvalid {
            box-shadow: 0 0 25px #33FCFF;
        }
    </style>
</head>

<body class="bg-rose-500">
    <div class='w-full max-w-full h-[100vh] max-h-[100vh] flex items-center justify-center text-center flex-col bg-[#1A1D3B]'>
        <?php
        session_start();
        require("./config/config.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $amount = $_POST['amount'] * 100; // Convert PHP to centavos
            $description = $_POST['description'] ?? "";
            $remarks = $_POST['remarks'];
            // $_SESSION['mobileNumber'] = $_POST['mobileNumberTxt'];
            // $_SESSION['shippingAddress'] = "{$_POST['addressLineOneTxt']}-{$_POST['addressLineTwoTxt']}-{$_POST['addressLineThreeTxt']}";
            // $_SESSION['deliverySelection'] = $_POST['deliverySelectionLst'] ?? "";
            $customer_id = $_SESSION['customer_ID'];
            $shippingAddress = $_POST['address1'] . " " . $_POST['address2'] . " " . $_POST['address3'];
            $mobileNumber = $_POST['mobileNumber'];
            $deliverySelection = $_POST['deliverySelection'];
            $subTotal = $_POST['subTotal'];
            $shippingFee = $_POST['shippingFee'];

            //  $sql="INSERT INTO `transaction_tbl`(`customer_id`, `shipping_address`, `mobile_number`, `sub_total`, `shipping_fee`, `delivery_id`) 
            //                             VALUES ('{$_SESSION['customerID']}','{$_SESSION['shippingAddress']}','{$_SESSION['mobileNumber']}','{$_SESSION['subTotal']}','{$_SESSION['shippingFee']}','{$_SESSION['deliverySelection']}');";
            //  $conn -> query($sql);

            $newTransaction = "INSERT INTO transaction_tbl (customer_id, shipping_address, mobile_number, sub_total, shipping_fee, delivery_id) VALUES ('$customer_id','$shippingAddress','$mobileNumber','$subTotal','$shippingFee','$deliverySelection')";
            mysqli_query($conn, $newTransaction);

            $getTransactionLatest = "SELECT * FROM transaction_tbl ORDER BY transaction_id DESC LIMIT 1";
            $getTransactionLatestQuery = mysqli_query($conn, $getTransactionLatest);
            $getTransactionLatestRow = mysqli_fetch_assoc($getTransactionLatestQuery);
            $transactionID = $getTransactionLatestRow['transaction_id'];

            $getAllCartOfCustomer = "SELECT * FROM cart_tbl WHERE customer_id = '$customer_id'";
            $getAllCartOfCustomerQuery = mysqli_query($conn, $getAllCartOfCustomer);
            while ($getAllCartOfCustomerRow = mysqli_fetch_assoc($getAllCartOfCustomerQuery)) {
                $productQuantity = $getAllCartOfCustomerRow['product_quantity'];
                $productId = $getAllCartOfCustomerRow['product_id'];
                $insertIntoOrder = "INSERT INTO orders (transaction_id, product_id, product_quantity) VALUES ('$transactionID', '$productId', $productQuantity)";
                $sqlUpdateStockCount = "UPDATE inventory_tbl 
                                        SET total_stock =total_stock-$productQuantity
                                        WHERE item_id=$productId";
                mysqli_query($conn, $insertIntoOrder);
                mysqli_query($conn, $sqlUpdateStockCount);
            }
            $deleteAllCartOfCustomer = "DELETE FROM cart_tbl WHERE customer_id = '$customer_id'";
            mysqli_query($conn, $deleteAllCartOfCustomer);

            function createPayMongoLink($amount, $description, $remarks)
            {
                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://api.paymongo.com/v1/links",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode([
                        'data' => [
                            'attributes' => [
                                'amount' => $amount,
                                'description' => $description,
                                'remarks' => $remarks,
                            ]
                        ]
                    ]),
                    CURLOPT_HTTPHEADER => [
                        "accept: application/json",
                        "authorization: Basic c2tfdGVzdF95bmpZQjNjNUpFUll0YlFBVFh4VGFheHY6",
                        "content-type: application/json"
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    return "cURL Error #:" . $err;
                } else {
                    return $response;
                }
            }

            $response = createPayMongoLink($amount, $description, $remarks);
            $responseData = json_decode($response, true);

            if (isset($responseData['data']['attributes']['checkout_url'])) {
                $checkoutUrl = $responseData['data']['attributes']['checkout_url'];
                file_get_contents($checkoutUrl);
                echo "<span class='text-[#FF1695] setPoppins font-bold text-4xl uppercase flex items-center justify-center'>Payment link created successfully.</span><br><a href='$checkoutUrl' target='_blank' class='customShadow p-4 setPoppins text-center font-bold text-lg bg-[#33FCFF] text-[#1A1D3B] uppercase rounded-sm'>Click here to pay</a>
        ";
            } else {
                echo "
                <span class='text-[#FF1695] setPoppins font-bold text-4xl uppercase flex items-center justify-center'>Error creating payment link:</span><br><a href='index.php' class='customInvalid p-4 setPoppins text-center font-bold text-lg bg-[#33FCFF] text-[#1A1D3B] uppercase rounded-sm'>$response;</a>
        ";
            }
        } else {
            echo "<span class='text-[#FF1695] setPoppins font-bold text-4xl uppercase flex items-center justify-center'>Admin Message:</span><br><a href='index.php' class='customInvalid p-4 setPoppins text-center font-bold text-lg bg-[#33FCFF] text-[#1A1D3B] uppercase rounded-sm'>Invalid request.</a>";
        }
        ?>
    </div>
</body>

</html>