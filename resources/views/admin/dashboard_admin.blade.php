<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="relative">

<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg dm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full dm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-cokmud relative">
        <div class="flex justify-between items-center mb-5">
            <a href="/" class="flex items-center ps-2.5">
                <span class="self-center text-xl font-semibold whitespace-nowrap text-krem">ATHAMEBEL</span>
            </a>
            <button type="button" class="dm:hidden text-gray-400 hover:text-gray-900 hover:bg-gray-200 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"></path>
                </svg>
                <span class="sr-only">Close sidebar</span>
            </button>
        </div>
        <ul class="space-y-2 font-medium">
            <li>
                <a id="carouselButton" href="carouseltable" class="flex items-center p-2 text-krem rounded-lg  hover:text-white hover:bg-coklat group">
                    <svg class="flex-shrink-0 w-5 h-5 text-krem transition duration-75  group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Carousel</span>
                </a>
            </li>
            <li>
                <a id="catalogButton" href="catalogtable" class="flex items-center p-2 text-krem rounded-lg  hover:text-white hover:bg-coklat group">
                    <svg class="flex-shrink-0 w-5 h-5 text-krem transition duration-75  group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Catalog</span>
                </a>
            </li>
            <li>
                <a href="#" onclick="logout()" class="flex items-center p-2 text-black rounded-lg hover:text-white hover:bg-red-600 group mt-10 bg-white">
                    <svg class="flex-shrink-0 w-6 h-6 text-black transition duration-75 group-hover:text-white"
                        width="800px" height="800px"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.2929 14.2929C16.9024 14.6834 16.9024 15.3166 17.2929 15.7071C17.6834 16.0976 18.3166 16.0976 18.7071 15.7071L21.6201 12.7941C21.6351 12.7791 21.649 12.7634 21.6618 12.7472C21.7836 12.6002 21.8412 12.409 21.8345 12.2192C21.8066 11.5732 21.2992 11.049 20.6619 11.0041C20.5607 10.997 20.4561 11.0101 20.3536 11.0428C20.2506 11.0757 20.1496 11.1274 20.0572 11.1965C20.0488 11.2029 20.0404 11.2095 20.032 11.2164L17.2929 14.2929ZM17.2929 9.70711C16.9024 9.31658 16.9024 8.68342 17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289L21.7071 11.2929C22.0976 11.6834 22.0976 12.3166 21.7071 12.7071L18.7071 15.7071C18.3166 16.0976 17.6834 16.0976 17.2929 15.7071C16.9024 15.3166 16.9024 14.6834 17.2929 14.2929L18.5858 13H13C12.4477 13 12 12.5523 12 12C12 11.4477 12.4477 11 13 11H18.5858L17.2929 9.70711Z" fill="#000000"/>
                        <path d="M5 2C3.34315 2 2 3.34315 2 5V19C2 20.6569 3.34315 22 5 22H14.5C15.8807 22 17 20.8807 17 19.5V16.7326C16.8519 16.647 16.7125 16.5409 16.5858 16.4142C15.9314 15.7598 15.8253 14.7649 16.2674 14H13C11.8954 14 11 13.1046 11 12C11 10.8954 11.8954 10 13 10H16.2674C15.8253 9.23514 15.9314 8.24015 16.5858 7.58579C16.7125 7.4591 16.8519 7.35296 17 7.26738V4.5C17 3.11929 15.8807 2 14.5 2H5Z" fill="#000000"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<!--content-->
<div class="p-4 dm:ml-64">
@yield('admin_content')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const drawerToggleButton = document.querySelector('[data-drawer-toggle="logo-sidebar"]');
        const drawer = document.getElementById('logo-sidebar');
        const closeSidebarButton = drawer.querySelector('[data-drawer-toggle="logo-sidebar"]');

        drawerToggleButton.addEventListener('click', function () {
            drawer.classList.toggle('-translate-x-full');
            drawer.classList.toggle('translate-x-0');
        });

        closeSidebarButton.addEventListener('click', function () {
            drawer.classList.add('-translate-x-full');
            drawer.classList.remove('translate-x-0');
        });

        // Ambil URL saat ini
        const currentUrl = window.location.href;

        // Cek apakah URL mengandung carouseltable atau catalogtable
        if (currentUrl.includes('carouseltable')) {
            document.getElementById('carouselButton').classList.add('bg-coklat', 'text-coklat');
        } else if (currentUrl.includes('catalogtable')) {
            document.getElementById('catalogButton').classList.add('bg-coklat', 'text-coklat');
        }
    });

    function logout() {
        // Tampilkan SweetAlert untuk konfirmasi logout
        Swal.fire({
            title: "Are you sure?",
            text: "You will be logged out.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, logout",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                // Hapus token dari localStorage
                localStorage.removeItem('authToken');

                // Tampilkan SweetAlert untuk konfirmasi logout berhasil
                Swal.fire({
                    title: "Logged out!",
                    text: "You have been logged out successfully.",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    // Redirect to login page
                    window.location.href = "/login";
                });
            }
        });
    }
</script>

</body>
</html>
