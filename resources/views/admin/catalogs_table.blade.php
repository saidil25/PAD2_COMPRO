@extends('admin.dashboard_admin')

@section('admin_content')
<div class="m-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden py-3"> 
        <form class="max-w-lg mx-auto" id="search-form">
            <div class="flex flex-col sm:flex-row">
                <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <button id="dropdown-button" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-t-lg sm:rounded-t-none sm:rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                    <span id="dropdown-button-text">All categories</span>
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 absolute mt-10">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button" id="category-dropdown">
                        <!-- Dynamic categories will be inserted here -->
                    </ul>
                </div>
                <div class="relative w-full mt-2 sm:mt-0">
                    <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-b-lg sm:rounded-b-none sm:rounded-r-lg border-gray-300 focus:ring-coklat focus:border-coklat" placeholder="Search....." required />
                    <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-coklat rounded-r-lg border border-coklat hover:bg-coklat focus:ring-4 focus:outline-none focus:ring-coklat">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-hidden mt-3">
        <div class="p-6 overflow-x-auto">
            <table id="dataTable" class="w-full text-sm text-center text-gray-500 dark:text-gray-400 border-collapse">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 border-b">Title</th>
                        <th scope="col" class="px-6 py-3 border-b">Category</th>
                        <th scope="col" class="px-6 py-3 border-b ">Image</th>
                        <th scope="col" class="px-3 py-3 border-b"></th>
                        <th scope="col" class="px-6 py-3 border-b"><a href="/catalogform" class="bg-coklat hover:bg-krem hover:text-coklat text-white font-bold py-2 px-4 rounded">Tambah</a></th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Dynamic content will be inserted here -->
                </tbody>
            </table>
            <nav aria-label="Page navigation example" id="pagination-nav" class="my-4 flex justify-center">
                <ul class="inline-flex -space-x-px text-sm items-center">
                    <!-- Pagination buttons will be inserted here -->
                </ul>
            </nav>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const BASE_URL = "{{ config('app.base_url') }}";
    document.addEventListener('DOMContentLoaded', () => {
        initializeCategories();
        fetchData();

        // Add event listener for dropdown button
        const dropdownButton = document.getElementById('dropdown-button');
        const dropdownMenu = document.getElementById('dropdown');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Add event listener for search form
        const searchForm = document.getElementById('search-form');
        searchForm.addEventListener('submit', async (event) => {
            event.preventDefault();
            const searchQuery = document.getElementById('search-dropdown').value;
            await fetchData(null, searchQuery);
        });
    });

    async function fetchCategories() {
        const response = await fetch(`${BASE_URL}/api/categories`);
        const data = await response.json();
        return data.data;
    }

   async function fetchData(category = null, searchQuery = '', page = 1, limit = 10) {
    const token = localStorage.getItem('authToken'); 
    let url = `${BASE_URL}/api/dashboard/catalogs?page=${page}&limit=${limit}`;
    if (category) {
        url = `${BASE_URL}/api/admin/filter?category=${category}&page=${page}&limit=${limit}`;
    }
    if (searchQuery) {
        url = `${BASE_URL}/api/admin/search?title=${encodeURIComponent(searchQuery)}&page=${page}&limit=${limit}`;
    }

    try {
        const response = await fetch(url, {
            headers: {
                'Authorization': `Bearer ${token}`
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();

        if (!data.meta) {
            throw new Error('Response does not contain pagination meta data');
        }

        populateTable(data.data);
        setupPagination(data.meta);
    } catch (error) {
        console.error('Fetch data error:', error);
    }
}

    async function initializeCategories() {
        const categories = await fetchCategories();
        const dropdown = document.getElementById('category-dropdown');
        dropdown.innerHTML = ''; // Clear existing buttons

        const allButton = document.createElement('li');
        allButton.innerHTML = `<button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="handleCategoryClick(null, 'All categories')">All categories</button>`;
        dropdown.appendChild(allButton);

        categories.forEach(category => {
            const li = document.createElement('li');
            li.innerHTML = `<button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" onclick="handleCategoryClick('${category.name}', '${category.name}')">${category.name}</button>`;
            dropdown.appendChild(li);
        });
    }

    function handleCategoryClick(category, categoryName) {
        fetchData(category);
        document.getElementById('dropdown-button-text').textContent = categoryName;
        document.getElementById('dropdown').classList.add('hidden');
    }

    function populateTable(data) {
        const tableBody = document.getElementById('tableBody');
        tableBody.innerHTML = '';

        data.forEach(item => {
            const row = document.createElement('tr');
            row.className = 'bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600';
            row.setAttribute('data-id', item.id); // Store item ID as data attribute

            // Construct the image URL
            const imageUrl = item.image ? `${BASE_URL}/storage/image/${item.image}` : '';

            row.innerHTML = `
                <td class="px-6 py-4 border-b">${item.title}</td>
                <td class="px-6 py-4 border-b">${item.category.name}</td>
                <td class="px-6 py-4 border-b">${imageUrl ? `<img src="${imageUrl}" alt="${item.title}" class="w-full max-w-xs h-auto mx-auto">` : 'No Image'}</td>
                <td class="px-6 py-4 text-right border-b"><a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="editItem(${item.id})">Edit</a></td>
                <td class="px-6 py-4 text-right border-b"><a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="deleteItem(${item.id})">Delete</a></td>
            `;

            tableBody.appendChild(row);
        });
    }

    function setupPagination(meta) {
        const paginationNav = document.getElementById('pagination-nav');
        const paginationUl = paginationNav.querySelector('ul');
        paginationUl.innerHTML = ''; // Clear existing pagination buttons

        // Generate Previous button
        if (meta.current_page > 1) {
            const li = document.createElement('li');
            li.innerHTML = `
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-page="${meta.current_page - 1}">&laquo; Previous</a>
            `;
            li.addEventListener('click', (event) => {
                event.preventDefault();
                const page = event.target.getAttribute('data-page');
                fetchData(null, '', page);
            });
            paginationUl.appendChild(li);
        }

        // Generate page numbers
        for (let i = 1; i <= meta.last_page; i++) {
            const li = document.createElement('li');
            li.innerHTML = `
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight ${meta.current_page === i ? 'text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'}" data-page="${i}">${i}</a>
            `;
            li.addEventListener('click', (event) => {
                event.preventDefault();
                const page = event.target.getAttribute('data-page');
                fetchData(null, '', page);
            });
            paginationUl.appendChild(li);
        }

        // Generate Next button
        if (meta.current_page < meta.last_page) {
            const li = document.createElement('li');
            li.innerHTML = `
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-page="${meta.current_page + 1}">Next &raquo;</a>
            `;
            li.addEventListener('click', (event) => {
                event.preventDefault();
                const page = event.target.getAttribute('data-page');
                fetchData(null, '', page);
            });
            paginationUl.appendChild(li);
        }
    }

    function editItem(id) {
        window.location.href = `/catalogs/${id}`;
    }

    function deleteItem(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            
        }).then((result) => {
            if (result.isConfirmed) {
                const token = localStorage.getItem('authToken'); 

                fetch(`${BASE_URL}/api/dashboard/catalogs/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}` 
                    },
                    body: JSON.stringify({
                        _token: token 
                    })
                })
                .then(response => {
                    if (response.ok) {
                        console.log('Item deleted with ID:', id);
                        const row = document.querySelector(`#tableBody tr[data-id="${id}"]`);
                        if (row) {
                            row.remove();
                        }
                        fetchData(); 
                        Swal.fire(
                            'Deleted!',
                            'Your item has been deleted.',
                            'success'
                        )
                    } else {
                        console.error('Error deleting item with ID:', id);
                        Swal.fire(
                            'Error!',
                            'There was an error deleting the item.',
                            'error'
                        )
                    }
                })
                .catch(error => {
                    console.error('Error deleting item:', error);
                    Swal.fire(
                        'Error!',
                        'There was an error deleting the item.',
                        'error'
                    )
                });
            }
        })
    }
</script>

@endsection
