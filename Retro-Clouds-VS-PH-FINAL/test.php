<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./styles/output.css">
</head>
<body>
    <h1 class="bg-rose-500">Background Testing</h1>
    <?php 

      $hash = password_hash("admin123",PASSWORD_DEFAULT);
      echo"<h1> $hash</h1>";
    ?>
</body>
</html>


/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.{html,js,php}",
    "./admin/*.{html,js,php}",
    "./config/*.{html,js,php}",
    "./faqs.php",
    "./about.php",
    "./checkout.php",
    "./catalog.php",
    "./testimonials.php",
    "./users-profile.php",
    "./admin/inventory.php",
    "./admin/management.php",
    "./admin/sales.php",
    "./admin/users-profile.php",
    "./admin/users.php",
    "./config/sidebar-cart.php",
    "./process_payment.php",
  ],
  theme: {
    extend: {
      screens: {
        "mobilemd": "375px",
        "mobilelg": "425px",
        "iphone": "500px",
        "laptopxxl": "1400px",
      },
    },
  },
  plugins: [],
}

