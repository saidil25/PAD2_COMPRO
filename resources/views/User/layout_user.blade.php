<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <!-- alpine js -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!--Tailwind -->
  @vite('resources/css/app.css')
</head>
<body class="relative">
  <!--navbar-->
 <nav class="pt-9 pb-4 px-4 pl-12 fixed top-0 lg:w-full md:w-full sm:w-full bg-white z-10">
    <div class="container flex justify-between items-center">
        <div class="flex items-center"> <!-- Mengubah class flex menjadi flex items-center -->
            <div class="md:hidden block mr-4"> <!-- Memindahkan ikon menu ke paling kiri -->
                <ion-icon name="menu" class="text-3xl cursor-pointer" onclick="toggleMenu(this)"></ion-icon>
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
                <a href="#" class="block hover:text-coklat">Beranda</a>
            </li>
            <li class="py-2">
                <a href="#catalog" class="block hover:text-coklat">Katalog</a>
            </li>
            <li class="py-2">
                <a href="#kontak" class="block hover:text-coklat">Kontak</a>
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
</script>




  <!--content-->
  <div class=" mt-98">
    @yield('content')
  </div>
  <!--footer-->
  <footer class="bg-cokmud dark:bg-krem">
    <div class="container mx-auto py-8">
      <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-10">
        <div class="col-span-2 md:col-span-1 flex justify-center md:ml-10">
          <div class="lg:w-384 md:w-384 lg:mt-20 md:mt-16 sm:mt-3">
            <h2 class="text-krem text-3xl font-bold mb-4 uppercase">ATHAMEBEL</h2>
            <ul class="text-krem">
              <!-- <li class="mb-2">
                <a href="" class="lg:text-lg md:text-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu.</a>
              </li> -->
            </ul>
          </div>
        </div>
        <div class="flex justify-center lg:ml-12 md:ml-12 sm:ml-0">
          <div>
            <h2 class="text-krem text-lg font-semibold mb-4 uppercase">Atha Mebel</h2>
            <ul class="text-krem">
              <li class="mb-2 lg:text-lg md:text-14">
                <a href="#" class="">Jawa Tengah<br>Paesan, Mireng, Trucuk, Klaten</a>
              </li>
              <li class="mb-2 mt-3 lg:text-lg md:text-14">
                <a href="#" class="">Email : athaya040716@gmail.com<br>Phone : 0895352224863</a>
              </li>
              <li class="mb-2 flex mt-3 lg:text-lg md:text-14">
                <a href="#" class="text-krem me-5">
                  <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                    <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                  </svg>
                  <span class="sr-only">Facebook page</span>
                </a>
                <a href="#" class="text-krem me-5 lg:text-lg md:text-14">
                  <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                    <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                  </svg>
                  <span class="sr-only">Discord community</span>
                </a>
                <a href="#" class="text-krem lg:text-lg md:text-14">
                  <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                    <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                  </svg>
                  <span class="sr-only">Twitter page</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="flex justify-center">
          <div>
            <h2 class="text-krem lg:text-lg md:text-14 font-semibold mb-4 uppercase">marketplace</h2>
            <ul class="text-krem font-medium">
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
    </div>
  </footer>
</body>
</html>
