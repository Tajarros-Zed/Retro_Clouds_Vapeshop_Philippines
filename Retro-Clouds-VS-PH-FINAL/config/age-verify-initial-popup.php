<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGE VERIFY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="../styles/Component.css">
    <link rel="shortcut icon" href="../assets/Favicon_Retro.png" type="image/x-icon">
</head>
<body>

    <div class="w-[300px] max-w-[300px] h-auto rounded-lg bg-[#1A1D3B] border-2 p-3">
        <div class='flex items-center justify-center p-3 gap-2'>
            <img src="../assets/Retro_Clouds_VS.jpg" class="h-auto w-[50px] rounded-full mix-blend-lighten">
            <h1 class="retro_clouds_h1 uppercase font-bold text-2xl">Retro Clouds</h1>
        </div>

        <div class="py-2">
            <h1 class="text-[#FF1695] text-2xl font-bold poppins text-center">WELCOME</h1>
            <h1 class="text-[#fafafa] text-xs font-medium poppins text-center px-4 py-2">You must be of legal age to visit the site</h1>
        </div>

        <form method="post" class="flex flex-col items-center gap-4 py-1">
            <div class=" w-[80%] flex flex-col items-center">
            <h1 class="text-[#33FCFF] text-sm font-medium poppins text-center py-2">Please enter your date of birth</h1>
                <input type="date" name="" class="w-full h-10 border-4 border-[#33FCFF] rounded-lg py-2 px-4">
            </div>
            <input type="submit" name="submitBtn" class="text-white poppins font-bold bg-gradient-to-b from-[#FF1695] to-[#008F99] flex items-center justify-center gap-1 rounded-full border border-white py-2 px-7 w-[80%] cursor-pointer" value="SUBMIT">
        </form>
    </div>
</body>
</html>