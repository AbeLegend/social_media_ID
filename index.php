<?php
session_start();
if (isset($_SESSION['email'])) {
  header('Location: home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/tailwind.css" rel="stylesheet">
  <title>Social Media ID</title>
</head>

<body class="bg-green-400">
  <!-- NAVBAR -->
  <nav class="bg-green-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="images/icon.png" alt="social_media_ID">
          </div>
          <div class="ml-10 flex items-baseline space-x-4">
            <a href="index.php" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
          </div>
        </div>
        <div class="ml-4 flex items-center md:ml-6">
          <div class="ml-10 flex items-baseline space-x-4">
            <a href="signup.php" class="bg-green-900 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-900">Register</a>
          </div>
          <div class="ml-10 flex items-baseline space-x-4">
            <a href="signin.php" class="bg-green-900 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-gray-900">Login</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- END NAVBAR -->

  <!-- Content -->
  <div class="grid grid-cols-2">
    <div class="m-10 flex justify-center items-center">
      <img src="images/social_media_ID.jpg" width="700" height="350" alt="social_media_ID" class="rounded-lg  shadow-2xl ">
    </div>
    <div div class="m-10 flex flex-col justify-center items-center">
      <h1 class="text-gray-50 font-bold text-4xl italic "><span class="text-green-900">S</span>ocial <span class="text-green-900">M</span>edia <span class="text-green-900">ID</span></h1>

      <p class="mt-10 text-xl">Web Social Media ID ini ialah web untuk mereka yang ingin <span class="underline italic font-bold text-white">berkomunikasi</span> dengan teman-temannya.</p>

      <div class="grid grid-cols-2 mt-10">
        <div class="flex items-center mx-20 my-5">
          <div class="shadow-2xl bg-white rounded-lg mr-5">
            <img src="https://img.icons8.com/carbon-copy/100/000000/money.png" width="75" height="75">
          </div>
          <p class="font-semibold ">Gratis. <a href="detail.php" class="underline text-blue-500 italic">detail</a>
          <p>
        </div>
        <div class="flex items-center mx-20 my-5">
          <div class="shadow-2xl bg-white rounded-lg mr-5 p-2">
            <img src="https://img.icons8.com/pastel-glyph/50/000000/pencil.png" width="50" height="50" />
          </div>
          <p class="font-semibold ">Tampilan Menarik. <a href="detail.php" class="underline text-blue-500 italic">detail</a>
          <p>
        </div>
        <div class="flex items-center mx-20 my-5">
          <div class="shadow-2xl bg-white rounded-lg mr-5 p-1">
            <img src="https://img.icons8.com/ios/50/000000/collaboration-female-male.png" width="75" height="75" />
          </div>
          <p class="font-semibold ">Memudahkan Komunikasi. <a href="detail.php" class="underline text-blue-500 italic">detail</a>
          <p>
        </div>

        <div class="flex items-center mx-20 my-5 cols-span-2">
          <a href="signin.php" class="bg-green-900 hover:bg-green-700 text-white font-bold text-xl rounded-lg p-2">Mulai</a>
        </div>

      </div>
    </div>

  </div>
  <!-- End Content -->

  <!-- Footer -->
  <div class="bg-green-500 flex justify-center py-5 mt-10">
    <p class="font-bold text-white">@Copyright by 18111097_Mohamad Fikri Abu Bakar_TIF RP 18 CIDA_UASWEB1</p>
  </div>
</body>

</html>