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
  <title>Sign Up</title>
</head>

<body>
  <div class="flex flex-col justify-center items-center h-screen bg-green-400">
    <h1 class="text-4xl font-bold my-1">Register</h1>
    <form action="controllers/signup.php" method="POST">
      <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 ">
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="nama_depan">
              Nama Depan
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" type="text" name="nama_depan" id="nama_depan" required placeholder="Bagus">
          </div>
          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="nama_belakang">
              Nama Belakang
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" name="nama_belakang" id="nama_belakang" required placeholder="Faqih">
          </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-full px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="username">
              Username
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="text" name="username" id="username" required placeholder="Michael Asep">
          </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-full px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">
              Email
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="email" name="email" id="email" required placeholder="example@gmail.com">
          </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
          <div class="md:w-full px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="password">
              Password
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" type="password" name="password" id="password" required placeholder="**********">
          </div>
        </div>
        <div class="-mx-3 md:flex mb-2">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="usia">
              Usia
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="number" name="usia" id="usia" required placeholder="20">
          </div>
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="alamat">
              Alamat
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" name="alamat" id="alamat" required placeholder="jl. kebahagiaan">
          </div>
          <div class="md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="kota_lahir">
              Kota Lahir
            </label>
            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" type="text" name="kota_lahir" id="kota_lahir" required placeholder="Kota Bandung">
          </div>
        </div>
        <div class="flex justify-between mt-5 items-center">
          <p class="font-semibold">Alredy Have An Account ? <a href="signin.php" class="text-green-500 hover:underline">Sign in</a></p>
          <button type="submit" name="signup" class="uppercase px-8 py-2 border border-green-600 text-green-600 max-w-max shadow-sm hover:shadow-lg hover:border-green-50 hover:bg-green-500 hover:text-green-50">Sign Up
          </button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>