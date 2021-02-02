<?php
include 'session.php';
include 'controllers/connection.php';
include 'controllers/index.php';
include 'controllers/post.php';
date_default_timezone_set("Asia/Bangkok");
foreach ($qUsers as $data) {
  $id = $data['id_user'];
  $email = $data['email'];
  $username = $data['username'];
  $photoUser = $data['photo'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/tailwind.css" rel="stylesheet">
  <style>
    .modal {
      transition: opacity 0.25s ease;
    }

    body.modal-active {
      overflow-x: hidden;
      overflow-y: visible !important;
    }
  </style>
  <title>Home</title>

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
            <a href="home.php" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
          </div>
        </div>
        <div class="ml-4 flex items-center md:ml-6">
          <p class="text-white font-semibold"><?= $username ?></p>
          <div class="ml-3 relative">
            <div>
              <button class="max-w-xs bg-white rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" onclick="showMenuProfile()">
                <?php if ($photoUser == null) : ?>
                  <img class="h-8 w-8 rounded-full" src="images/profile.png" alt="<?= $username ?>">
                <?php else : ?>
                  <img class="h-8 w-8 rounded-full" src="<?= $photoUser ?>" alt="<?= $username ?>">
                <?php endif; ?>
              </button>
            </div>

            <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" id="iconProfile">
              <a href="biodata.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>
              <a href="controllers/logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- END NAVBAR -->

  <!-- CONTENT -->
  <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 ">

    <?php if ($qPost->rowCount()  == 0) : ?>
      <div class="flex justify-center h-screen items-center">
        <button class="modal-open bg-transparent border border-gray-200 hover:border-green-900 text-gray-50 hover:text-green-900 font-bold py-2 px-4 rounded-full">Add New Post</button>
      </div>
    <?php else : ?>
      <div class="flex justify-center ">
        <button class="modal-open bg-transparent border border-gray-200 hover:border-green-900 text-gray-50 hover:text-green-900 font-bold py-2 px-4 rounded-full">Add New Post</button>
      </div>
    <?php endif; ?>
    <!-- Modal -->
    <div class="modal z-50 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
      <!-- overlay -->
      <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

      <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <!-- Esc -->
        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
          <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
          </svg>
          <span class="text-sm">(Esc)</span>
        </div>
        <div class="modal-content py-4 text-left px-6">
          <!--Title Modal-->

          <div class="modal-content py-4 text-left px-6">
            <!--Title Modal-->
            <div class="flex justify-between items-center pb-3">
              <p class="text-2xl font-bold">Create Post</p>
              <div class="modal-close cursor-pointer z-50">
                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                  <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
              </div>
            </div>

            <!--Body Modal-->
            <form action="controllers/add_post.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $id ?>">
              <textarea id="post" name="post" rows="5" cols="50" required class="bg-gray-100 " placeholder="Post everything your mind"></textarea>
              <br>
              <label for="gambar_post">Gambar : </label>
              <input type="file" name="gambar_post" id="gambar_post" accept="image/x-png,image/jpg,image/jpeg">
              <input type="hidden" name="tgl_post_dibuat" value="<?= date("Y-m-d H:i:s") ?>">
              <br>
              <!--Footer Modal-->
              <div class="flex justify-end pt-2">
                <button type="submit" name="posting" class="px-4 bg-green-500 p-3 rounded-lg text-white hover:bg-green-900">Post</button>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
    <!-- End Modal -->

    <?php foreach ($qPost as $data) : ?>
      <?php
      $username = $data['username'];
      $idPost = $data['id_post'];
      $photo = $data['photo'];
      $idUser = $data['id_user'];
      $post = $data['post'];
      $gambarPost = $data['gambar_post'];
      $tgl = $data['tgl_post_dibuat'];

      ?>
      <!-- POST -->
      <section class="text-gray-200 mt-10 ">
        <div class="max-w-6xl mx-auto px-5 mb-20 ">
          <div class="flex sm:-m-4 ">
            <div class="md:w-1/2 md:mb-0">

              <div class="rounded bg-green-900 p-4 flex-col  ">
                <div class="flex items-center">
                  <div class="flex items-center space-x-4">
                    <?php if ($photo == null) : ?>
                      <img class="w-16 h-16 rounded-full" src="images/profile.png" alt="<?= $username ?>">
                    <?php else : ?>
                      <img class="w-16 h-16 rounded-full bg-white" src="<?= $photo ?>" alt="<?= $username ?>">
                    <?php endif; ?>
                  </div>
                  <h2 class=" m-5 text-xl title-font font-medium mb-3"><?= $username ?></h2>
                </div>

                <!-- POSTINGAN -->
                <div class="flex-grow mt-5 relative">
                  <p class="leading-relaxed text-sm text-justify font-bold"><?= $post ?></p>
                  <?php if ($gambarPost != null) : ?>
                    <img src="<?= $gambarPost ?>" alt="image post">
                  <?php endif; ?>
                  <p class="absolute -right-0 font-thin"><?= $tgl ?></p>
                </div>
                <!-- END POSTINGAN -->
                <!-- Detail Post -->
                <div class="flex-grow mt-8 grid grid-cols-12 gap-4">

                  <div class="col-span-6 flex justify-center ">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" fill="white">
                      <path d="M20 15c0 .552-.448 1-1 1s-1-.448-1-1 .448-1 1-1 1 .448 1 1m-3 0c0 .552-.448 1-1 1s-1-.448-1-1 .448-1 1-1 1 .448 1 1m-3 0c0 .552-.448 1-1 1s-1-.448-1-1 .448-1 1-1 1 .448 1 1m5.415 4.946c-1 .256-1.989.482-3.324.482-3.465 0-7.091-2.065-7.091-5.423 0-3.128 3.14-5.672 7-5.672 3.844 0 7 2.542 7 5.672 0 1.591-.646 2.527-1.481 3.527l.839 2.686-2.943-1.272zm-13.373-3.375l-4.389 1.896 1.256-4.012c-1.121-1.341-1.909-2.665-1.909-4.699 0-4.277 4.262-7.756 9.5-7.756 5.018 0 9.128 3.194 9.467 7.222-1.19-.566-2.551-.889-3.967-.889-4.199 0-8 2.797-8 6.672 0 .712.147 1.4.411 2.049-.953-.126-1.546-.272-2.369-.483m17.958-1.566c0-2.172-1.199-4.015-3.002-5.21l.002-.039c0-5.086-4.988-8.756-10.5-8.756-5.546 0-10.5 3.698-10.5 8.756 0 1.794.646 3.556 1.791 4.922l-1.744 5.572 6.078-2.625c.982.253 1.932.407 2.85.489 1.317 1.953 3.876 3.314 7.116 3.314 1.019 0 2.105-.135 3.242-.428l4.631 2-1.328-4.245c.871-1.042 1.364-2.384 1.364-3.75" />
                    </svg><?= getJumlahKomen($conn, $idPost) ?>

                  </div>

                  <div class="col-span-6 flex justify-center">


                    <?php
                    try {
                      $sql = "SELECT `suka`,`id_like` FROM `like_post` WHERE `id_user` = ? AND `id_post` = ?";
                      $qLike = $conn->prepare($sql);
                      $qLike->execute([$id, $idPost]);
                      foreach ($qLike as $likeData) {
                        $idLike = $likeData['id_like'];
                      }
                    } catch (PDOException $err) {
                      die($err->getMessage());
                    }
                    ?>

                    <?php if ($qLike->rowCount() == 0) : ?>

                      <form action="controllers/like.php" method="POST">
                        <input type="hidden" name="id_user" value="<?= $id ?>">
                        <input type="hidden" name="id_post" value="<?= $idPost ?>">
                        <button type="submit" name="like">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                            <path d="M15.43 8.814c.808-3.283 1.252-8.814-2.197-8.814-1.861 0-2.35 1.668-2.833 3.329-1.971 6.788-5.314 7.342-8.4 7.743v9.928c3.503 0 5.584.729 8.169 1.842 1.257.541 3.053 1.158 5.336 1.158 2.538 0 4.295-.997 5.009-3.686.5-1.877 1.486-7.25 1.486-8.25 0-1.649-1.168-2.446-2.594-2.507-1.21-.051-2.87-.277-3.976-.743zm3.718 4.321l-1.394.167s-.609 1.109.141 1.115c0 0 .201.01 1.069-.027 1.082-.046 1.051 1.469.004 1.563l-1.761.099c-.734.094-.656 1.203.141 1.172 0 0 .686-.017 1.143-.041 1.068-.056 1.016 1.429.04 1.551-.424.053-1.745.115-1.745.115-.811.072-.706 1.235.109 1.141l.771-.031c.822-.074 1.003.825-.292 1.661-1.567.881-4.685.131-6.416-.614-2.238-.965-4.437-1.934-6.958-2.006v-6c3.263-.749 6.329-2.254 8.321-9.113.898-3.092 1.679-1.931 1.679.574 0 2.071-.49 3.786-.921 5.533 1.061.543 3.371 1.402 6.12 1.556 1.055.059 1.025 1.455-.051 1.585z" />

                          </svg><span><?= getJumlahLike($conn, $idPost) ?></span></button>
                        <button type="submit" name="unlike"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                            <path d="M19.406 14.442c1.426-.06 2.594-.858 2.594-2.506 0-1-.986-6.373-1.486-8.25-.714-2.689-2.471-3.686-5.009-3.686-2.283 0-4.079.617-5.336 1.158-2.585 1.113-4.665 1.842-8.169 1.842v9.928c3.086.401 6.43.956 8.4 7.744.483 1.66.972 3.328 2.833 3.328 3.448 0 3.005-5.531 2.196-8.814 1.107-.466 2.767-.692 3.977-.744zm-.207-1.992c-2.749.154-5.06 1.013-6.12 1.556.431 1.747.921 3.462.921 5.533 0 2.505-.781 3.666-1.679.574-1.993-6.859-5.057-8.364-8.321-9.113v-6c2.521-.072 4.72-1.041 6.959-2.005 1.731-.745 4.849-1.495 6.416-.614 1.295.836 1.114 1.734.292 1.661l-.771-.032c-.815-.094-.92 1.068-.109 1.141 0 0 1.321.062 1.745.115.976.123 1.028 1.607-.04 1.551-.457-.024-1.143-.041-1.143-.041-.797-.031-.875 1.078-.141 1.172 0 0 .714.005 1.761.099s1.078 1.609-.004 1.563c-.868-.037-1.069-.027-1.069-.027-.75.005-.874 1.028-.141 1.115l1.394.167c1.075.13 1.105 1.526.05 1.585z" />
                          </svg>
                          <?= getJumlahUnlike($conn, $idPost) ?></button>
                      </form>
                    <?php else :  ?>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                        <path d="M15.43 8.814c.808-3.283 1.252-8.814-2.197-8.814-1.861 0-2.35 1.668-2.833 3.329-1.971 6.788-5.314 7.342-8.4 7.743v9.928c3.503 0 5.584.729 8.169 1.842 1.257.541 3.053 1.158 5.336 1.158 2.538 0 4.295-.997 5.009-3.686.5-1.877 1.486-7.25 1.486-8.25 0-1.649-1.168-2.446-2.594-2.507-1.21-.051-2.87-.277-3.976-.743zm3.718 4.321l-1.394.167s-.609 1.109.141 1.115c0 0 .201.01 1.069-.027 1.082-.046 1.051 1.469.004 1.563l-1.761.099c-.734.094-.656 1.203.141 1.172 0 0 .686-.017 1.143-.041 1.068-.056 1.016 1.429.04 1.551-.424.053-1.745.115-1.745.115-.811.072-.706 1.235.109 1.141l.771-.031c.822-.074 1.003.825-.292 1.661-1.567.881-4.685.131-6.416-.614-2.238-.965-4.437-1.934-6.958-2.006v-6c3.263-.749 6.329-2.254 8.321-9.113.898-3.092 1.679-1.931 1.679.574 0 2.071-.49 3.786-.921 5.533 1.061.543 3.371 1.402 6.12 1.556 1.055.059 1.025 1.455-.051 1.585z" />
                      </svg><?= getJumlahLike($conn, $idPost) ?>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
                        <path d="M19.406 14.442c1.426-.06 2.594-.858 2.594-2.506 0-1-.986-6.373-1.486-8.25-.714-2.689-2.471-3.686-5.009-3.686-2.283 0-4.079.617-5.336 1.158-2.585 1.113-4.665 1.842-8.169 1.842v9.928c3.086.401 6.43.956 8.4 7.744.483 1.66.972 3.328 2.833 3.328 3.448 0 3.005-5.531 2.196-8.814 1.107-.466 2.767-.692 3.977-.744zm-.207-1.992c-2.749.154-5.06 1.013-6.12 1.556.431 1.747.921 3.462.921 5.533 0 2.505-.781 3.666-1.679.574-1.993-6.859-5.057-8.364-8.321-9.113v-6c2.521-.072 4.72-1.041 6.959-2.005 1.731-.745 4.849-1.495 6.416-.614 1.295.836 1.114 1.734.292 1.661l-.771-.032c-.815-.094-.92 1.068-.109 1.141 0 0 1.321.062 1.745.115.976.123 1.028 1.607-.04 1.551-.457-.024-1.143-.041-1.143-.041-.797-.031-.875 1.078-.141 1.172 0 0 .714.005 1.761.099s1.078 1.609-.004 1.563c-.868-.037-1.069-.027-1.069-.027-.75.005-.874 1.028-.141 1.115l1.394.167c1.075.13 1.105 1.526.05 1.585z" />
                      </svg>
                      <?= getJumlahUnlike($conn, $idPost) ?>
                    <?php endif; ?>


                  </div>
                </div>
                <!-- End Detail Post -->
                <!-- Form comment -->
                <div class="flex justify-center">
                  <form class="flex  mt-8 mb-4" action="controllers/add_comment.php" method="POST">
                    <input type="hidden" name="id_post" value="<?= $idPost ?>">
                    <input type="hidden" name="id_user" value="<?= $id ?>">
                    <input class="rounded-l-lg  border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white" placeholder="Comment here" type="text" name="komen" id="komen" autocomplete="off" required />
                    <button class="px-2 rounded-r-lg bg-gray-400  text-gray-800 font-bold px-2 uppercase border-gray-500 border-t border-b border-r" type="submit" name="add_comment">Comment</button>
                  </form>
                </div>
              </div>
              <?php if ($id == $idUser) : ?>
                <div class="float-right">
                  <form action="controllers/delete_post.php" method="POST">
                    <input type="hidden" name="id_post" value="<?= $idPost ?>">
                    <input type="hidden" name="gambar_post" value="<?= $gambarPost ?>">
                    <button type="submit" name="delete_post"><img src="https://img.icons8.com/fluent-systems-regular/24/000000/trash.png" /></button>
                  </form>
                </div>
              <?php endif; ?>

            </div>
            <!-- Comment -->
            <div class="container mx-auto max-w-sm flex flex-col justify-center items-center">
              <?php
              try {
                $sql = "SELECT u.username,k.komentar, b.photo
              FROM `users` u 
              JOIN `komentar_post` k
              JOIN `biodata` b
              WHERE u.id_user = k.id_user AND k.id_post = ?  AND u.id_user = b.id_user
              ORDER BY `id_comment` ASC";
                $query = $conn->prepare($sql);
                $query->execute([$idPost]);
              } catch (PDOException $err) {
                die($err->getMessage());
              }
              ?>
              <?php foreach ($query as $dataKomen) : ?>
                <?php
                $username = $dataKomen['username'];
                $komentar = $dataKomen['komentar'];
                $photoKomen = $dataKomen['photo'];
                ?>
                <div class="bg-white w-full flex items-center p-2 rounded-xl shadow border my-2">
                  <div class="flex items-center space-x-4">
                    <?php if ($photoKomen == null) : ?>
                      <img class="w-16 h-16 rounded-full" src="images/profile.png" alt="<?= $username ?>">
                    <?php else : ?>
                      <img class="w-16 h-16 rounded-full" src="<?= $photoKomen ?>" alt="<?= $username ?>">
                    <?php endif; ?>

                  </div>
                  <div class="flex-grow p-3">
                    <div class="font-semibold text-gray-700">
                      <p><?= $username ?></p>
                    </div>
                    <div class="text-sm text-gray-500">
                      <p><?= $komentar ?></p>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>

            </div>
            <!-- End Comment -->
          </div>
        </div>
      <?php endforeach; ?>
      <!-- END POST -->
  </div>
  <!-- Footer -->
  <div class="bg-green-500 flex justify-center py-5">
    <p class="font-bold text-white">@Copyright by 18111097_Mohamad Fikri Abu Bakar_TIF RP 18 CIDA_UASWEB1</p>
  </div>



  <script>
    function showMenuProfile() {
      document.getElementById("iconProfile").classList.toggle('hidden');
    }
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event) {
        event.preventDefault()
        toggleModal()
      })
    }

    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)

    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }

    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
        isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
        toggleModal()
      }
    };


    function toggleModal() {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }
  </script>
</body>


</html>