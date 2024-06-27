@extends('admin.dashboard_admin')

@section('admin_content')
<h1 class="text-3xl font-bold text-coklat mb-2 text-center">Catalog Form</h1>
    <div class="w-full h-auto mt-10 flex flex-col items-center p-6 justify-center bg-white border border-gray-200 rounded-lg shadow">
        <form action="{{ isset($catalog) ? url('/dashboard/catalogs/' . $catalog->id) : url('/dashboard/catalogs') }}" method="POST" enctype="multipart/form-data" class="w-full" id="catalog-form">
            @csrf
            @isset($catalog)
                @method('PUT')
                <input type="hidden" id="catalog-id" name="catalog_id" value="{{ $catalog->id }}">
            @endisset

            <!-- Title Field -->
            <div class="mb-6">
                <label for="product-title" class="block mb-2 text-xl font-bold text-coklat">Input Title</label>
                <input type="text" id="product-title" name="title" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-coklat focus:border-coklat" required>
            </div>
            
            <!-- Category Select -->
            <div class="mb-6">
                <label for="category-select" class="block mb-2 text-xl font-bold text-coklat">Pilih Kategori</label>
                <select id="category-select" name="category_id" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-coklat focus:border-coklat">
                    <!-- Options will be dynamically added here -->
                </select>
            </div>
            
            <!-- Image Dropzone and Preview -->
            <div class="flex items-center justify-center w-full mb-4">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-677 h-72 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <img id="preview-image" src="#" alt="Preview Image" class="w-64 h-48 mb-4 object-cover object-center rounded-lg border border-gray-300">
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" name="file" type="file" accept="image/png, image/jpeg, image/gif" class="hidden">
                </label>
            </div>
            
            <!-- Description Field -->
            <div class="mb-6">
                <label for="product-description" class="block mb-2 text-xl font-bold text-coklat">Input Description</label>
                <textarea id="product-description" name="description" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-coklat focus:border-coklat"></textarea>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="text-krem bg-coklat hover:bg-cokmud hover:text-krem h-11 w-48 font-bold rounded-full text-15 shadow-l px-5 py-2.5 text-center me-2 mb-2">Submit</button>
        </form>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    const getAuthToken = () => localStorage.getItem('authToken');

    // Fetch categories and populate select options
    fetch('http://127.0.0.1:8000/api/categories', {
        headers: {
            'Authorization': `Bearer ${getAuthToken()}`
        }
    })
    .then(response => response.json())
    .then(responseData => {
        if (Array.isArray(responseData.data)) {
            const categories = responseData.data;
            const categorySelect = document.getElementById('category-select');

            categories.forEach(category => {
                const option = document.createElement('option');
                option.value = category.id;
                option.textContent = category.name;
                categorySelect.appendChild(option);
            });

            // If editing, set selected category based on catalog data
            const catalogId = '{{ isset($catalog) ? $catalog->id : '' }}';
            if (catalogId) {
                fetch(`http://127.0.0.1:8000/api/catalogs/${catalogId}`, {
                    headers: {
                        'Authorization': `Bearer ${getAuthToken()}`
                    }
                })
                .then(response => response.json())
                .then(catalogData => {
                    if (catalogData.data) {
                        const currentCatalog = catalogData.data;
                        document.getElementById('product-title').value = currentCatalog.title;
                        document.getElementById('product-description').value = currentCatalog.description;
                        categorySelect.value = currentCatalog.category_id.toString();
                        document.getElementById('preview-image').src = currentCatalog.image ? `{{ asset('storage/image/') }}/${currentCatalog.image}` : '#';

                        // Update catalog-id input value
                        const catalogIdInput = document.getElementById('catalog-id');
                        if (catalogIdInput) {
                            catalogIdInput.value = catalogId;
                        } else {
                            console.error('Element with ID "catalog-id" not found.');
                        }
                    } else {
                        console.error('Data katalog tidak ditemukan');
                    }
                })
                .catch(error => console.error('Error saat mengambil data katalog:', error));
            }
        } else {
            console.error('Response data.data bukan array:', responseData.data);
        }
    })
    .catch(error => console.error('Error saat mengambil kategori:', error));

    // Preview image functionality
    const dropzone = document.getElementById('dropzone-file');
    const previewImage = document.getElementById('preview-image');

    if (dropzone) {
        dropzone.addEventListener('change', () => {
            const file = dropzone.files[0];
            if (file) {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => {
                    previewImage.src = reader.result;
                };
            } else {
                previewImage.src = "#";
            }
        });
    } else {
        console.error('Element with ID "dropzone-file" not found.');
    }

    // Form submission
    const catalogForm = document.getElementById('catalog-form');
    if (catalogForm) {
        catalogForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            const catalogId = document.getElementById('catalog-id') ? document.getElementById('catalog-id').value : null;
            const categorySelect = document.getElementById('category-select');
            const categoryName = categorySelect.options[categorySelect.selectedIndex].text;

            formData.append('category', categoryName);

            let url = 'http://127.0.0.1:8000/api/dashboard/catalogs';
            let method = 'POST';

            if (catalogId) {
                url += `/${catalogId}`;
                method = 'POST'; // Changed to POST for simplicity in handling PUT requests with FormData
                formData.append('_method', 'PUT'); // Laravel's way to spoof PUT request
            }

            fetch(url, {
                method: method,
                headers: {
                    'Authorization': `Bearer ${getAuthToken()}`,
                    'Accept': 'application/json'
                },
                body: formData,
            })
            .then(async response => {
                const contentType = response.headers.get('content-type');
                const text = await response.text();

                if (!response.ok) {
                    throw new Error(`Respon jaringan tidak berhasil: ${text}`);
                }

                if (contentType && contentType.includes('application/json')) {
                    return JSON.parse(text);
                } else {
                    throw new Error(`Diharapkan JSON, dapatkan ${contentType}: ${text}`);
                }
            })
            .then(data => {
                console.log('Sukses:', data);
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: catalogId ? 'Data berhasil diperbarui!' : 'Data berhasil disimpan!',
                }).then(() => {
                    window.location.href = '/catalogtable';
                });
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: `Error menyimpan data: ${error.message}`,
                    footer: '<a href="#">Why do I have this issue?</a>'
                });
            });
        });
    } else {
        console.error('Element with ID "catalog-form" not found.');
    }
});


    </script>
@endsection
