@extends('admin.dashboard_admin')

@section('admin_content')
<div class="m-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <table id="dataTable" class="w-full text-sm text-center text-gray-500 dark:text-gray-400 border-collapse">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 border-b">Title</th>
                        <th scope="col" class="px-6 py-3 border-b">Image</th>
                        <th scope="col" class="px-6 py-3 border-b"></th>
                        <th scope="col" class="px-6 py-3 border-b"><a href="/carouselform" class="bg-coklat hover:bg-krem hover:text-coklat text-white font-bold py-2 px-4 rounded">Tambah</a></th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Dynamic content will be inserted here -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        fetchData();
    });

    function fetchData() {
        fetch('http://127.0.0.1:8000/api/carousel')
            .then(response => response.json())
            .then(data => populateTable(data.data))
            .catch(error => console.error('Error fetching data:', error));
    }

    function populateTable(data) {
        const tableBody = document.getElementById('tableBody');
        tableBody.innerHTML = '';

        data.forEach(item => {
            const row = document.createElement('tr');
            row.className = 'bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600';

            // Construct the image URL
            const imageUrl = item.image ? `http://127.0.0.1:8000/storage/image/${item.image}` : '';

            row.innerHTML = `
                <td class="px-6 py-4 w-64 border-b">${item.title}</td>
                <td class="px-6 py-4 border-b">${imageUrl ? `<img src="${imageUrl}" alt="${item.title}" class="w-full h-64 object-cover mx-auto">` : 'No Image'}</td>
                <td class="px-6 py-4 text-right border-b"><a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="editItem(${item.id})">Edit</a></td>
                <td class="px-6 py-4 text-right border-b"><a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="deleteItem(${item.id})">Delete</a></td>
            `;

            tableBody.appendChild(row);
        });
    }

    function editItem(id) {
        window.location.href = `/carousel/${id}`;
    }

    function deleteItem(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const token = localStorage.getItem('authToken'); // Ambil token dari local storage atau cookie

                fetch(`http://127.0.0.1:8000/api/dashboard/carousel/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}` // Gunakan token autentikasi di sini
                    },
                    body: JSON.stringify({
                        _token: token // Jika diperlukan untuk CSRF protection
                    })
                })
                .then(response => {
                    if (response.ok) {
                        console.log('Item deleted with ID:', id);
                        Swal.fire('Deleted!', 'Your item has been deleted.', 'success');
                        // Hapus baris dari tabel setelah penghapusan berhasil
                        const row = document.querySelector(`#tableBody tr[data-id="${id}"]`);
                        if (row) {
                            row.remove();
                        }
                        // Memuat ulang data setelah menghapus item
                        fetchData(); // Memanggil kembali fetchData untuk memperbarui tabel
                    } else {
                        console.error('Error deleting item with ID:', id);
                        Swal.fire('Failed!', 'There was an error deleting the item.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error deleting item:', error);
                    Swal.fire('Failed!', 'There was an error deleting the item.', 'error');
                });
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info');
            }
        });
    }
</script>
@endsection
