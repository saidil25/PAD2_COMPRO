@extends('admin.dashboard_admin')

@section('admin_content')
    <h1 class="text-3xl font-bold text-coklat mb-2 text-center">Carousel Form</h1>
    <div class="w-full h-auto mt-10 flex flex-col items-center p-6 justify-center bg-white border border-gray-200 rounded-lg shadow">
        <form action="http://127.0.0.1:8000/dashboard/carousel" method="POST" enctype="multipart/form-data" class="w-full" id="carousel-form">
            @csrf
            <!-- Hidden input for carousel ID -->
            <input type="hidden" id="carousel-id" name="carousel_id" value="{{ isset($carousel) ? $carousel->id : '' }}">
            <!-- Image Dropzone and Preview -->
            <div class="flex items-center justify-center w-full mb-4">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-677 h-72 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <img id="preview-image" src="../img/no-image.png" alt="Preview Image" class="w-430 h-52 mb-4 object-cover object-center rounded-lg border border-gray-300">
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG, Max file 2MB</p>
                    </div>
                    <input id="dropzone-file" name="file" type="file" accept="image/png, image/jpeg, image/gif" class="hidden">
                </label>
            </div>
            <!-- Title Field -->
            <div class="mb-6">
                <label for="carousel-title" class="block mb-2 text-xl font-bold text-coklat">Input Description</label>
                <input type="text" id="carousel-title" name="title" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-coklat focus:border-coklat" required>
            </div>
            
            <button type="submit" class="text-krem bg-coklat hover:bg-cokmud hover:text-krem h-11 w-48 font-bold rounded-full text-15 shadow-l px-5 py-2.5 text-center me-2 mb-2">Submit</button>
        </form>
    </div>

    <script>
   document.addEventListener('DOMContentLoaded', function () {
    const getAuthToken = () => {
        return localStorage.getItem('authToken');
    };

    // Preview image functionality
    const dropzone = document.getElementById('dropzone-file');
    const previewImage = document.getElementById('preview-image');

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

    // If editing, populate the form with existing carousel data
    const carouselId = '{{ isset($carousel) ? $carousel->id : '' }}';
    if (carouselId) {
        fetch(`http://127.0.0.1:8000/api/dashboard/carousel/${carouselId}`, {
            headers: {
                'Authorization': `Bearer ${getAuthToken()}`
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(carouselData => {
            if (carouselData.data) {
                const currentCarousel = carouselData.data;
                document.getElementById('carousel-title').value = currentCarousel.title;
                previewImage.src = currentCarousel.image ? `{{ asset('storage/image/') }}/${currentCarousel.image}` : '#';
            } else {
                console.error('Data carousel tidak ditemukan');
            }
        })
        .catch(error => console.error('Error saat mengambil data carousel:', error.message));
    }

    // Form submission
    document.getElementById('carousel-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        const carouselId = document.getElementById('carousel-id').value;

        let url = 'http://127.0.0.1:8000/api/dashboard/carousel';
        let method = 'POST';

        if (carouselId) {
            url += `/${carouselId}`;
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
                title: 'Berhasil!',
                text: 'Data berhasil disimpan!',
            }).then(() => {
                window.location.href = '/carouseltable'; // Redirect to carousel table after successful submission
            });
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: `<a href="#">Why do I have this issue?</a>`
            });
        });
    });
});


    </script>
@endsection
