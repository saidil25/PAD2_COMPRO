@extends('user.layout_user')

@section('content')

<!-- Carousel -->
<div class="w-full h-auto">
    <div class="relative" x-data="{
            slides: [],
            currentIndex: 0,
            fetchSlides() {
                fetch(`${BASE_URL}/api/carousel`)
                    .then(response => response.json())
                    .then(data => {
                        const baseUrl = `${BASE_URL}/storage/image/`;
                        this.slides = data.data.map(slide => ({
                            url: baseUrl + slide.image,
                            title: slide.title,
                            body: slide.body || ''  // Menambahkan body jika ada, atau biarkan kosong
                        }));
                    })
                    .catch(error => console.error('Error fetching data:', error));
            },
            prevSlide() {
                this.currentIndex = (this.currentIndex === 0) ? this.slides.length - 1 : this.currentIndex - 1;
            },
            nextSlide() {
                this.currentIndex = (this.currentIndex === this.slides.length - 1) ? 0 : this.currentIndex + 1;
            },
            goToSlide(index) {
                this.currentIndex = index;
            }
        }" x-init="fetchSlides(); setInterval(() => nextSlide(), 5000);">
        <div class="mx-auto relative">
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="currentIndex === index" class="lg:w-full lg:h-81 lg:bg-cover lg:bg-center md:bg-cover md:bg-center md:h-80 md:w-full sm:bg-cover sm:bg-center sm:w-full sm:h-250 xm:bg-cover xm:bg-center xm:w-full xm:h-170 xxm:bg-cover xxm:bg-center xxm:w-full xxm:h-160" :style="'background-image: url(' + slide.url + ')'">
                    <!-- Gradien dan teks ditempatkan di bawah -->
                    <div class="lg:absolute lg:bottom-0 lg:w-full lg:h-81 md:absolute md:bottom-0 md:w-full md:h-80 sm:absolute sm:bottom-0 sm:h-250 sm:w-full xm:absolute xm:bottom-0 xm:h-170 xm:w-full xxm:absolute xxm:bottom-0 xxm:h-160 xxm:w-full flex items-end justify-center bg-gradient-to-t from-c1 via-c2">
                        <div class="text-center lg:w-1094 md:w-677 sm:w-347 xm:w-315 xxm:w-315 text-white lg:mb-10 md:mb-7 sm:mb-4 p-4">
                            <h2 class="lg:text-xl md:text-sm sm:text-10 xm:text-7 xxm:text-7 mb-2" x-text="slide.title"></h2>
                            <p class="lg:text-17 md:text-10" x-text="slide.body"></p>
                        </div>
                    </div>
                </div>
            </template>
            <div class="absolute w-32 items-center justify-center left-1/2 transform -translate-x-1/2 flex space-x-2 px-4">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="goToSlide(index)" class="flex-1 w-4 h-2 mt-2 mx-2 mb-2 rounded-full overflow-hidden transition-colors duration-200 hover:bg-c1" :class="{'bg-coklat': index === currentIndex, 'bg-opacity-50': index !== currentIndex}"></button>
                </template>
            </div>
        </div>
    </div>
</div>

<!-- Kelebihan -->
<div id="kelebihan" class="w-full h-auto mt-16 flex flex-col items-center justify-center">
    <h1 class="lg:text-3xl md:text-2xl sm:text-xl xm:text-xl xxm:text-sm font-bold text-coklat">KELEBIHAN ATHA MEBEL</h1>
    <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 xm:grid-cols-2 xxm:grid-cols-2  gap-5 mt-16">
    <div class="col-span-2 md:col-span-1 flex justify-center">
            <a class=" lg:w-card lg:h-card md: w-347 md:h-233 w p-6 bg-krem border border-gray-200 rounded-lg shadow flex flex-col justify-center items-center">
                <img src="../img/like icon.png" class="lg:h-7 lg:w-7 md:h-5 md:w-5 mb-2">
                <h5 class="mb-2 lg:text-xl md:text-17 sm:text-14 xm:text-12 xxm:text-12 font-semibold tracking-tight text-black dark:text-white text-center">Bisa Custom Sesuai Kebutuhan </h5>
                <p class="font-normal lg:text-17 md:text-14 sm:text-14 xm:text-10 xxm:text-10 text-black text-center">Kami memberikan pelayanan untuk menyesuaikan ukuran, warna, dan desain mebel sesuai dengan permintaan pelanggan.</p>
            </a>
        </div>

        <div class="col-span-2 md:col-span-1 flex justify-center">
            <a class=" lg:w-card lg:h-card md: w-347 md:h-233 w p-6 bg-krem border border-gray-200 rounded-lg shadow flex flex-col justify-center items-center">
                <img src="../img/like icon.png" class="lg:h-7 lg:w-7 md:h-5 md:w-5 mb-2">
                <h5 class="mb-2 lg:text-xl md:text-17 sm:text-14 xm:text-12 xxm:text-12 font-semibold tracking-tight text-black dark:text-white text-center">Harga Lebih Ekonomis</h5>
                <p class="font-normal lg:text-17 md:text-14 sm:text-14 xm:text-10 xxm:text-10 text-black text-center">Kami menawarkan harga yang lebih ekonomis dibandingkan dengan banyak kompetitor bagi konsumen yang mencari solusi mebel berkualitas dengan anggaran terbatas.</p>
            </a>
        </div>


        <div class="col-span-2 md:col-span-1 flex justify-center">
            <a class=" lg:w-card lg:h-card md: w-347 md:h-233 w p-6 bg-krem border border-gray-200 rounded-lg shadow flex flex-col justify-center items-center">
                <img src="../img/like icon.png" class="lg:h-7 lg:w-7 md:h-5 md:w-5 mb-2">
                <h5 class="mb-2 lg:text-xl md:text-17 sm:text-14 xm:text-12 xxm:text-12 font-semibold tracking-tight text-black dark:text-white text-center">Melayani Pesanan Mebel dari Bahan Kayu</h5>
                <p class="font-normal lg:text-17 md:text-14 sm:text-14 xm:text-10 xxm:text-10 text-black text-center">Kami melayani pembuatan mebel dari berbagai jenis material, termasuk kayu solid dan multiplek yang dilapisi dengan High Pressure Laminate (HPL).</p>
            </a>
        </div>


        <div class="col-span-2 md:col-span-1 flex justify-center">
            <a class=" lg:w-card lg:h-card md: w-347 md:h-233 w p-6 bg-krem border border-gray-200 rounded-lg shadow flex flex-col justify-center items-center">
                <img src="../img/like icon.png" class="lg:h-7 lg:w-7 md:h-5 md:w-5 mb-2">
                <h5 class="mb-2 lg:text-xl md:text-17 sm:text-14 xm:text-12 xxm:text-12 font-semibold tracking-tight text-black dark:text-white text-center">Pengerjaan Rapi Dikerjakan oleh Ahli di Bidangnya </h5>
                <p class="font-normal lg:text-17 md:text-14 sm:text-14 xm:text-10 xxm:text-10 text-black text-center">Kami menjamin kualitas pengerjaan yang rapi dan detail. Dengan mempekerjakan tenaga ahli yang berpengalaman dalam bidang pembuatan mebel.</p>
            </a>
        </div>

    </div>
</div>


<!-- Kategori -->
<div id="catalog" class="w-full h-auto mt-10 flex flex-col items-center justify-center bg-choco bg-opacity-50">
    <h1 class="lg:text-3xl md:text-2xl sm:text-xl xm:text-xl xxm:text-sm font-bold text-coklat mt-10">KATALOG</h1>

    <div id="category-buttons-container" class="mt-3 overflow-y-auto overflow-x-auto w-full lg:w-1094 md:w-677 sm:w-384 xm:w-247 xxm:w-247">
        <div id="category-buttons" class="flex gap-5 mt-3 sm:hidden lg:block md:block">
            <!-- Dynamic category buttons will be inserted here -->
        </div>
    </div>

    <div id="loading-spinner" class="hidden w-16 h-16 border-4 border-t-4 border-gray-200 rounded-full animate-spin mt-10"></div>

    <div id="catalog-container" class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2 xm:grid-cols-2 xxm:grid-cols-2 lg:gap-5 md:gap-5 sm:gap-5 xm:gap-3 xxm:gap-1 mt-3 opacity-0 transform scale-95 transition-all duration-700 ease-in-out">
        <!-- Dynamic content will be inserted here -->
    </div>
    <nav aria-label="Page navigation example" id="pagination-nav">
        <ul id="pagination" class="flex items-center -space-x-px h-8 text-sm">
            <!-- Dynamic pagination links will be inserted here -->
        </ul>
    </nav>
</div>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50 transition-opacity duration-300">
    <div class="relative p-4 w-full max-w-2xl max-h-full transform scale-75 transition-transform duration-300">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Item Details</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal" onclick="closeModal()">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <img id="modal-image" class="w-full rounded-lg" src="" alt="">
                <h4 id="modal-title-1" class="text-lg font-medium text-gray-900 dark:text-white"></h4>
                <p id="modal-description" class="text-base text-justify text-gray-700 dark:text-gray-300"></p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button" class="text-white bg-coklat hover:bg-cokmud focus:ring-4 focus:outline-none focus:ring-cokmud font-medium rounded-lg text-sm px-5 py-2.5 text-center" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
   let currentCategory = null;
    const BASE_URL = "{{ config('app.base_url') }}";

    async function fetchCategories() {
        try {
            const response = await fetch(`${BASE_URL}/api/categories`);
            const data = await response.json();
            return data.data;
        } catch (error) {
            console.error('Error fetching categories:', error);
        }
    }

    async function fetchData(category = null, page = 1) {
        try {
            let url = `${BASE_URL}/api/catalogs?page=${page}`;
            if (category) {
                url = `${BASE_URL}/api/catalogs/filter?category=${category}&page=${page}`;
            }
            const response = await fetch(url);
            const data = await response.json();
            return data;
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    function openModal(title1, imgSrc, description) {
        const modal = document.getElementById('default-modal');
        document.getElementById('modal-image').src = imgSrc;
        document.getElementById('modal-title-1').textContent = title1;
        document.getElementById('modal-description').textContent = description;
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.add('opacity-100', 'scale-100');
            modal.classList.remove('opacity-0', 'scale-75');
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById('default-modal');
        modal.classList.add('opacity-0', 'scale-75');
        modal.classList.remove('opacity-100');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function createCard(title, image, category, description) {
        const container = document.getElementById('catalog-container');
        const button = document.createElement('button');
        button.className = 'max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 lg:h-72 lg:w-96 md:w-347 md:h-250 sm:w-247 sm:h-192 xm:w-170 xm:h-160 xxm:w-170 xxm:h-110 mb-5';
        button.onclick = () => openModal(title, `${BASE_URL}/storage/image/${image}`, description);

        button.innerHTML = `
            <a>
                <img class="rounded-t-lg lg:h-203 md:h-170 sm:h-110 lg:w-385 md:w-345 sm:w-220 xm:w-220 xm:h-90 xxm:w-220 xxm:h-60" src="${BASE_URL}/storage/image/${image}" alt="" />
            </a>
            <div class="p-5">
                <h4 class="lg:text-15 md:text-15 font-medium sm:text-sm xm:text-10 xxm:text-5 text-coklat mr-auto text-left">${category}</h4>
                <h4 class="lg:text-lg md:text-lg font-medium sm:text-sm xm:text-10 xxm:text-5 text-coklat mr-auto text-left">${title}</h4>
            </div>
        `;

        container.appendChild(button);
    }

    function setActiveButton(button) {
        const buttons = document.querySelectorAll('.filter-btn');
        buttons.forEach(btn => {
            btn.classList.remove('bg-coklat', 'text-krem');
            btn.classList.add('bg-krem', 'text-coklat');
        });
        button.classList.add('bg-coklat', 'text-krem');
        button.classList.remove('bg-krem', 'text-coklat');
    }

    async function initializeCatalog(category = null, page = 1) {
    currentCategory = category;  // Store the current category
    const container = document.getElementById('catalog-container');
    const spinner = document.getElementById('loading-spinner');

    container.classList.remove('visible');  // Hide container before fetching new items
    spinner.classList.remove('hidden');  // Show loading spinner

    await new Promise(resolve => setTimeout(resolve, 700));  // Wait for hide animation to complete

    container.innerHTML = '';  // Clear existing items
    const response = await fetchData(category, page);
    if (response && response.data && response.meta) {
        const items = response.data;
        const meta = response.meta;

        items.forEach(item => {
            createCard(item.title, item.image, item.category.name, item.description);
        });

        createPagination(meta); // Create pagination links

        setTimeout(() => {
            container.classList.add('visible');  // Show container with animation
            spinner.classList.add('hidden');  // Hide loading spinner
        }, 100);
    } else {
        console.error('Invalid response structure:', response);
        spinner.classList.add('hidden');  // Hide loading spinner if there's an error
    }
}

    function createPagination(meta) {
    console.log(meta); // Add this line to log meta information
    const paginationContainer = document.getElementById('pagination');
    paginationContainer.innerHTML = ''; // Clear existing pagination links

    const createPageLink = (url, label, active) => {
        const li = document.createElement('li');
        const a = document.createElement('a');
        a.href = "#";

        // Replace label text with icons for Next and Previous
        if (label === 'Next &raquo;') {
            a.innerHTML = '<i class="fas fa-angle-right"></i>';
        } else if (label === '&laquo; Previous') {
            a.innerHTML = '<i class="fas fa-angle-left"></i>';
        } else {
            a.innerHTML = label;
        }

        a.className = `flex items-center justify-center px-3 h-8 leading-tight ${active ? 'text-white bg-coklat border border-white' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700'} dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white`;
        if (url) {
            a.onclick = (event) => {
                event.preventDefault();
                const page = new URL(url).searchParams.get('page');
                initializeCatalog(currentCategory, parseInt(page));
            };
        } else {
            a.classList.add('cursor-not-allowed');
        }
        li.appendChild(a);
        return li;
    };

    meta.links.forEach(link => {
        const pageLink = createPageLink(link.url, link.label, link.active);
        paginationContainer.appendChild(pageLink);
    });
}


    async function initializeCategories() {
        const categories = await fetchCategories();
        const container = document.getElementById('category-buttons');
        container.innerHTML = ''; // Clear existing buttons
        categories.forEach(category => {
            const button = document.createElement('button');
            button.className = 'filter-btn text-coklat bg-krem hover:bg-coklat hover:text-krem lg:h-11 lg:w-48 md:h-31 md:w-130 font-medium rounded-full lg:text-15 md:text-12 xm:text-8 xxm:text-8  px-5 py-2.5 text-center me-2 mb-2';
            button.setAttribute('data-category', category.name);
            button.textContent = category.name;
            button.addEventListener('click', (event) => {
                const category = event.target.getAttribute('data-category');
                setActiveButton(event.target);
                initializeCatalog(category);
            });
            container.appendChild(button);
        });

        // Add the visible class after a short delay to trigger the animation
        setTimeout(() => {
            container.classList.add('visible');
        }, 100);
    }
    
    // Initialize categories and catalog on page load
    window.onload = async () => {
        await initializeCategories();
        const topPicsButton = [...document.querySelectorAll('.filter-btn')].find(btn => btn.getAttribute('data-category') === 'Top Pick');
        if (topPicsButton) {
            setActiveButton(topPicsButton);
            initializeCatalog('Top Pick');
        } else {
            await initializeCatalog();
        }
    };
</script>



<style>
#default-modal.opacity-0 {
    opacity: 0;
}
#default-modal.opacity-100 {
    opacity: 1;
}
#default-modal.scale-75 {
    transform: scale(0.75);
}
#default-modal.scale-100 {
    transform: scale(1);
}
#category-buttons {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.5s ease, transform 0.5s ease;
}
#category-buttons.visible {
    opacity: 1;
    transform: translateY(0);
}
#catalog-container {
    min-height: 350px; /* Adjust based on expected content */
    opacity: 0;
    transform: scale(0.95);
    transition: opacity 1s ease, transform 1s ease;
}
#catalog-container.visible {
    opacity: 1;
    transform: scale(1);
}
#category-buttons-container {
    white-space: nowrap;
}
#category-buttons {
    display: flex;
    gap: 5px;
    padding: 10px 0;
}
.filter-btn {
    display: inline-block;
    white-space: nowrap;
}
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.animate-spin {
    animation: spin 1s linear infinite;
}

#loading-spinner {
    border-top-color: transparent; /* Makes only three sides visible for a spinning effect */
    border-right-color: #371206;
    border-bottom-color: #371206;
    border-left-color: #371206;
}
</style>

        

    </div>
</div>

<!--kontak-->
<div class="w-full h-auto mt-0 flex flex-col items-center justify-center">
    <img src="../img/Group 18.png" class="lg:w-777 lg:h-587 md:h-325 ml-auto lg:block md:block sm:hidden xm:hidden xxm:hidden">
    <img src="../img/Group 21.png" class="lg:w-777 lg:h-587 md:h-325 sm:h-325 ml-auto lg:hidden md:hidden sm:block xm:block xxm:block">


<div class=" lg:absolute md:absolute lg:w-384 md:w-52 sm:w-80 xm:w-auto lg:mr-120 md:mr-96" id="kontak">
    <a href="#"
        <h5 class="mb-2 lg:text-4xl md:text-20 xxm:text-xs font-bold tracking-tight text-coklat sm:ml-10 lg:ml-0 md:ml-0 lg:text-left md:text-left sm:text-justify xm:text-center xxm:text-center">Hubungi Kami Sekarang Untuk</h5>
        <h5 class="mb-2 lg:text-4xl md:text-20 xxm:text-xs font-bold tracking-tight text-coklat sm:ml-16 lg:ml-0 md:ml-0 lg:text-left md:text-left sm:text-justify xm:text-center xxm:text-center">Informasi Lebih Lanjut</h5>
    </a>
    <a href="https://wa.me/62895352224863" type="button" class="mt-5 text-krem bg-coklat font-medium rounded-lg lg:text-sm md:text-10 sm:text-8 xm:text-8 xxm:text-8 px-5 py-2.5 text-center inline-flex sm:ml-24 xm:ml-9 xxm:ml-6 lg:ml-0 md:ml-0 me-2 mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class=" lg:w-7 lg:h-7 md:w-5 md:h-5 sm:w-4 sm:h-4 xm:w-4 xm:h-4 xxm:w-4 xxm:h-4 me-2" viewBox="0 0 50 50"
        style="fill:#FFFFFF;">
        <path d="M 25 2 C 12.309534 2 2 12.309534 2 25 C 2 29.079097 3.1186875 32.88588 4.984375 36.208984 L 2.0371094 46.730469 A 1.0001 1.0001 0 0 0 3.2402344 47.970703 L 14.210938 45.251953 C 17.434629 46.972929 21.092591 48 25 48 C 37.690466 48 48 37.690466 48 25 C 48 12.309534 37.690466 2 25 2 z M 25 4 C 36.609534 4 46 13.390466 46 25 C 46 36.609534 36.609534 46 25 46 C 21.278025 46 17.792121 45.029635 14.761719 43.333984 A 1.0001 1.0001 0 0 0 14.033203 43.236328 L 4.4257812 45.617188 L 7.0019531 36.425781 A 1.0001 1.0001 0 0 0 6.9023438 35.646484 C 5.0606869 32.523592 4 28.890107 4 25 C 4 13.390466 13.390466 4 25 4 z M 16.642578 13 C 16.001539 13 15.086045 13.23849 14.333984 14.048828 C 13.882268 14.535548 12 16.369511 12 19.59375 C 12 22.955271 14.331391 25.855848 14.613281 26.228516 L 14.615234 26.228516 L 14.615234 26.230469 C 14.588494 26.195329 14.973031 26.752191 15.486328 27.419922 C 15.999626 28.087653 16.717405 28.96464 17.619141 29.914062 C 19.422612 31.812909 21.958282 34.007419 25.105469 35.349609 C 26.554789 35.966779 27.698179 36.339417 28.564453 36.611328 C 30.169845 37.115426 31.632073 37.038799 32.730469 36.876953 C 33.55263 36.755876 34.456878 36.361114 35.351562 35.794922 C 36.246248 35.22873 37.12309 34.524722 37.509766 33.455078 C 37.786772 32.688244 37.927591 31.979598 37.978516 31.396484 C 38.003976 31.104927 38.007211 30.847602 37.988281 30.609375 C 37.969311 30.371148 37.989581 30.188664 37.767578 29.824219 C 37.302009 29.059804 36.774753 29.039853 36.224609 28.767578 C 35.918939 28.616297 35.048661 28.191329 34.175781 27.775391 C 33.303883 27.35992 32.54892 26.991953 32.083984 26.826172 C 31.790239 26.720488 31.431556 26.568352 30.914062 26.626953 C 30.396569 26.685553 29.88546 27.058933 29.587891 27.5 C 29.305837 27.918069 28.170387 29.258349 27.824219 29.652344 C 27.819619 29.649544 27.849659 29.663383 27.712891 29.595703 C 27.284761 29.383815 26.761157 29.203652 25.986328 28.794922 C 25.2115 28.386192 24.242255 27.782635 23.181641 26.847656 L 23.181641 26.845703 C 21.603029 25.455949 20.497272 23.711106 20.148438 23.125 C 20.171937 23.09704 20.145643 23.130901 20.195312 23.082031 L 20.197266 23.080078 C 20.553781 22.728924 20.869739 22.309521 21.136719 22.001953 C 21.515257 21.565866 21.68231 21.181437 21.863281 20.822266 C 22.223954 20.10644 22.02313 19.318742 21.814453 18.904297 L 21.814453 18.902344 C 21.828863 18.931014 21.701572 18.650157 21.564453 18.326172 C 21.426943 18.001263 21.251663 17.580039 21.064453 17.130859 C 20.690033 16.232501 20.272027 15.224912 20.023438 14.634766 L 20.023438 14.632812 C 19.730591 13.937684 19.334395 13.436908 18.816406 13.195312 C 18.298417 12.953717 17.840778 13.022402 17.822266 13.021484 L 17.820312 13.021484 C 17.450668 13.004432 17.045038 13 16.642578 13 z M 16.642578 15 C 17.028118 15 17.408214 15.004701 17.726562 15.019531 C 18.054056 15.035851 18.033687 15.037192 17.970703 15.007812 C 17.906713 14.977972 17.993533 14.968282 18.179688 15.410156 C 18.423098 15.98801 18.84317 16.999249 19.21875 17.900391 C 19.40654 18.350961 19.582292 18.773816 19.722656 19.105469 C 19.863021 19.437122 19.939077 19.622295 20.027344 19.798828 L 20.027344 19.800781 L 20.029297 19.802734 C 20.115837 19.973483 20.108185 19.864164 20.078125 19.923828 C 19.867096 20.342656 19.838461 20.445493 19.625 20.691406 C 19.29998 21.065838 18.968453 21.483404 18.792969 21.65625 C 18.639439 21.80707 18.36242 22.042032 18.189453 22.501953 C 18.016221 22.962578 18.097073 23.59457 18.375 24.066406 C 18.745032 24.6946 19.964406 26.679307 21.859375 28.347656 C 23.05276 29.399678 24.164563 30.095933 25.052734 30.564453 C 25.940906 31.032973 26.664301 31.306607 26.826172 31.386719 C 27.210549 31.576953 27.630655 31.72467 28.119141 31.666016 C 28.607627 31.607366 29.02878 31.310979 29.296875 31.007812 L 29.298828 31.005859 C 29.655629 30.601347 30.715848 29.390728 31.224609 28.644531 C 31.246169 28.652131 31.239109 28.646231 31.408203 28.707031 L 31.408203 28.708984 L 31.410156 28.708984 C 31.487356 28.736474 32.454286 29.169267 33.316406 29.580078 C 34.178526 29.990889 35.053561 30.417875 35.337891 30.558594 C 35.748225 30.761674 35.942113 30.893881 35.992188 30.894531 C 35.995572 30.982516 35.998992 31.07786 35.986328 31.222656 C 35.951258 31.624292 35.8439 32.180225 35.628906 32.775391 C 35.523582 33.066746 34.975018 33.667661 34.283203 34.105469 C 33.591388 34.543277 32.749338 34.852514 32.4375 34.898438 C 31.499896 35.036591 30.386672 35.087027 29.164062 34.703125 C 28.316336 34.437036 27.259305 34.092596 25.890625 33.509766 C 23.114812 32.325956 20.755591 30.311513 19.070312 28.537109 C 18.227674 27.649908 17.552562 26.824019 17.072266 26.199219 C 16.592866 25.575584 16.383528 25.251054 16.208984 25.021484 L 16.207031 25.019531 C 15.897202 24.609805 14 21.970851 14 19.59375 C 14 17.077989 15.168497 16.091436 15.800781 15.410156 C 16.132721 15.052495 16.495617 15 16.642578 15 z"></path>
        </svg>
      <p class=" pt-1">Hubungi Kami</p>
        </a>
</div>

</div>

@endsection
