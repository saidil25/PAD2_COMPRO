@extends('admin.dashboard_admin')

@section('admin_content')
<h1 class=" text-3xl font-bold text-coklat mb-2 text-center">Carousel Form</h1>
<div class="w-full h-auto mt-10 flex flex-col items-center p-6 justify-center   bg-white border border-gray-200 rounded-lg shadow">
    <h4 class="text-xl font-bold text-coklat mb-4">Input Gambar</h4>
    <div class="flex items-center justify-center w-full mb-4">
        <label for="dropzone-file" class="flex flex-col items-center justify-center w-677 h-72 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            </div>
            <input id="dropzone-file" type="file" class="hidden" />
        </label>
    </div> 

    <div class="mb-6">
    <label for="large-input" class=" text-center  block mb-2 text-xl font-bold text-coklat ">Input Keterangan</label>
    <input type="text" id="large-input" class="block w-777 p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-coklat focus:border-coklat ">
    </div>
    <button href="#" class="text-krem bg-coklat hover:bg-cokmud hover:text-krem h-11 w-48 font-bold rounded-full text-15 shadow-l px-5 py-2.5 text-center me-2 mb-2">Submit</button>
</div>

<!-- Script untuk menampilkan preview gambar -->
<script>
    const dropzone = document.getElementById('dropzone-file');
    const previewContainer = document.getElementById('preview-container');
    const previewImage = document.getElementById('preview-image');

    dropzone.addEventListener('change', () => {
        const file = dropzone.files[0];
        if (file) {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => {
                previewImage.src = reader.result;
            }
        }
    });
</script>
@endsection