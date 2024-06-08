/** @type {import('tailwindcss').Config} */
module.exports = {
  important: true,
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

