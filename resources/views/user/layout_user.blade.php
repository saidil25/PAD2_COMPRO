<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- alpine js -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!--Tailwind -->
  @vite('resources/css/app.css')
</head>
<body class="relative">
  <!--navbar-->
  <nav class="pt-9 pb-4 px-4 pl-12 fixed top-0 lg:w-full md:w-full sm:w-full xm:w-full xxm:w-full bg-white z-10">
    <div class="container flex justify-between items-center">
        <div class="flex items-center"> <!-- Mengubah class flex menjadi flex items-center -->
            <div class="md:hidden block mr-4"> <!-- Memindahkan ikon menu ke paling kiri -->
                <ion-icon id="menuIcon" name="menu" class="text-2xl cursor-pointer mt-1" onclick="toggleMenu(this)"></ion-icon>
            </div>
            <a href="#kelebihan" class="font-semibold lg:mr-6 md:mr-6">ATHAMEBEL</a> <!-- Menghapus class mr-6 -->
            <img class="hidden md:block mr-6 h-5" src="../img/Line 1.png" alt="" /> <!-- Menambah class hidden md:block -->
            <div class="hidden md:flex space-x-6"> <!-- Menambah class ml-6 untuk mengurangi jarak -->
                <a href="#" class="hover:text-coklat">Beranda</a>
                <a href="#catalog" class="hover:text-coklat">Katalog</a>
                <a href="#kontak" class="hover:text-coklat">Kontak</a>
            </div>
        </div>
    </div>
    <div id="mobileMenu" class="hidden md:hidden w-full">
        <ul class="bg-white text-center absolute left-0 right-0"> <!-- Menambahkan class absolute, left-0, dan right-0 -->
            <li class="py-2">
                <a href="#" class="block hover:text-coklat mobile-link">Beranda</a>
            </li>
            <li class="py-2">
                <a href="#catalog" class="block hover:text-coklat mobile-link">Katalog</a>
            </li>
            <li class="py-2">
                <a href="#kontak" class="block hover:text-coklat mobile-link">Kontak</a>
            </li>
        </ul>
    </div>
</nav>

<script>
    function toggleMenu(e) {
        let mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            e.name = "close";
        } else {
            mobileMenu.classList.add('hidden');
            e.name = "menu";
        }
    }

    // Menambahkan event listener pada semua link di mobile menu
    document.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', function() {
            let mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.add('hidden');
            let menuIcon = document.getElementById('menuIcon');
            if (menuIcon.name === "close") {
                menuIcon.name = "menu";
            }
        });
    });
</script>






  <!--content-->
  <div class=" mt-98">
    @yield('content')
  </div>

   <!--footer-->
  <footer class="bg-cokmud dark:bg-krem">
  <div class="container mx-auto py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-10">
      <div class="col-span-2 md:col-span-1 flex justify-center">
        <div class="lg:w-384 md:w-384 lg:mt-0 md:mt-16 sm:mt-3">
          <!-- <h2 class="text-krem lg:text-xl md:text-xl sm:text-xl xm:text-sm font-bold mb-4 xxm:text-sm uppercase">ATHAMEBEL</h2> -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.727812198709!2d110.6674645!3d-7.7123279!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a47e682513a89%3A0xadfb687e0bb28159!2sAtha%20Mebel%20Bp.%20Yunanto!5e0!3m2!1sid!2sid!4v1720849417257!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded lg:w-400 lg:h-200"></iframe>
        </div>
      </div>
      <div class="flex justify-center lg:ml-12 md:ml-12 sm:ml-0 xm:ml-0 xxm:ml-10">
        <div>
          <h2 class="text-krem lg:text-lg md:text-lg sm:text-lg xm:text-sm xxm:text-xs font-semibold mb-4 uppercase">Atha Mebel</h2>
          <ul class="text-krem">
            <li class="mb-2 lg:text-lg md:text-14 sm:text-lg xm:text-xs xxm:text-xs">
              <a href="#" class="">Jawa Tengah<br>Paesan, Mireng, Trucuk, Klaten</a>
            </li>
            <li class="mb-2 mt-3 lg:text-lg md:text-14 sm:text-lg xm:text-xs xxm:text-xs">
              <a href="#" class="">Email : athaya040716@gmail.com<br>Phone : 0895352224863</a>
            </li>
            <li class="mb-2 flex mt-3 lg:text-lg md:text-14 ">
              <a href="https://www.tiktok.com/@athamebel12" class="text-krem me-5">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="23px" height="23px"><g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M41,4h-32c-2.757,0 -5,2.243 -5,5v32c0,2.757 2.243,5 5,5h32c2.757,0 5,-2.243 5,-5v-32c0,-2.757 -2.243,-5 -5,-5zM37.006,22.323c-0.227,0.021 -0.457,0.035 -0.69,0.035c-2.623,0 -4.928,-1.349 -6.269,-3.388c0,5.349 0,11.435 0,11.537c0,4.709 -3.818,8.527 -8.527,8.527c-4.709,0 -8.527,-3.818 -8.527,-8.527c0,-4.709 3.818,-8.527 8.527,-8.527c0.178,0 0.352,0.016 0.527,0.027v4.202c-0.175,-0.021 -0.347,-0.053 -0.527,-0.053c-2.404,0 -4.352,1.948 -4.352,4.352c0,2.404 1.948,4.352 4.352,4.352c2.404,0 4.527,-1.894 4.527,-4.298c0,-0.095 0.042,-19.594 0.042,-19.594h4.016c0.378,3.591 3.277,6.425 6.901,6.685z"></path></g></g></svg>
                <span class="sr-only">Tiktok</span>
              </a>
              <a href="https://instagram.com/atha.mebel" class="text-krem me-5 lg:text-lg md:text-14">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="23px" height="23px"><g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M16,3c-7.17,0 -13,5.83 -13,13v18c0,7.17 5.83,13 13,13h18c7.17,0 13,-5.83 13,-13v-18c0,-7.17 -5.83,-13 -13,-13zM37,11c1.1,0 2,0.9 2,2c0,1.1 -0.9,2 -2,2c-1.1,0 -2,-0.9 -2,-2c0,-1.1 0.9,-2 2,-2zM25,14c6.07,0 11,4.93 11,11c0,6.07 -4.93,11 -11,11c-6.07,0 -11,-4.93 -11,-11c0,-6.07 4.93,-11 11,-11zM25,16c-4.96,0 -9,4.04 -9,9c0,4.96 4.04,9 9,9c4.96,0 9,-4.04 9,-9c0,-4.96 -4.04,-9 -9,-9z"></path></g></g></svg>
                <span class="sr-only">instagram</span>
              </a>
              <a href="https://www.facebook.com/share/U3CQZp7EWajFMrNQ/?mibextid=qi2Omg" class="text-krem lg:text-lg md:text-14">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="23px" height="23px"><g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M41,4h-32c-2.76,0 -5,2.24 -5,5v32c0,2.76 2.24,5 5,5h32c2.76,0 5,-2.24 5,-5v-32c0,-2.76 -2.24,-5 -5,-5zM37,19h-2c-2.14,0 -3,0.5 -3,2v3h5l-1,5h-4v15h-5v-15h-4v-5h4v-3c0,-4 2,-7 6,-7c2.9,0 4,1 4,1z"></path></g></g></svg>
                <span class="sr-only">Facebook</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="flex justify-center">
        <div>
          <h2 class="text-krem lg:text-lg md:text-14 sm:text-lg xm:text-sm xxm:text-xs font-semibold mb-4 uppercase">marketplace</h2>
          <ul class="text-krem font-medium lg:text-lg md:text-14 sm:text-lg xm:text-xs xxm:text-xs">
            <li class="mb-2">
              <a href="https://shopee.co.id/athaya040716" class=" hover:underline">Shopee</a>
            </li>
            <li class="mb-2">
              <a href="https://www.tokopedia.com/athamebel" class=" hover:underline">Tokopedia</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="text-center text-krem mt-8 xm:text-xs lg:text-sm md:text-sm">
      &copy; 2024 Atha Mebel - Kahasolusi
    </div>
  </div>
</footer>

</body>
</html>
