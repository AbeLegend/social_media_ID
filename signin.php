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
  <title>Sign In</title>
</head>

<body>
  <div class="flex flex-col justify-center items-center h-screen bg-green-400">
    <h1 class="text-4xl font-bold my-1">Login</h1>
    <form action="controllers/signin.php" method="POST">
      <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 ">

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

        <div class="flex justify-between mt-5 items-center">
          <p class="font-semibold">Don'n Have An Account ? <a href="signup.php" class="text-green-500 hover:underline">Sign Up</a></p>
          <button type="submit" name="signin" class="ml-20 uppercase px-8 py-2 border border-green-600 text-green-600 max-w-max shadow-sm hover:shadow-lg hover:border-green-50 hover:bg-green-500 hover:text-green-50">Sign In
          </button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>