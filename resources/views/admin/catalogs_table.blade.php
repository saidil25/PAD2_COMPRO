@extends('admin.dashboard_admin')

@section('admin_content')
<div class="m-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <table id="dataTable" class="w-full text-sm text-center text-gray-500 dark:text-gray-400 border-collapse">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 border-b">Title</th>
                        <th scope="col" class="px-6 py-3 border-b">Category</th>
                        <th scope="col" class="px-6 py-3 border-b">Image</th>
                        <th scope="col" class="px-6 py-3 border-b"><span class="sr-only">Edit</span></th>
                        <th scope="col" class="px-6 py-3 border-b"><span class="sr-only">Delete</span></th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Dynamic content will be inserted here -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        fetchData();
    });

    function fetchData() {
        fetch('http://127.0.0.1:8000/api/catalogs')
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
                <td class="px-6 py-4 border-b">${item.title}</td>
                <td class="px-6 py-4 border-b">${item.category}</td>
                <td class="px-6 py-4 border-b">${imageUrl ? `<img src="${imageUrl}" alt="${item.title}" class="w-64 h-64 object-cover mx-auto">` : 'No Image'}</td>
                <td class="px-6 py-4 text-right border-b"><a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="editItem(${item.id})">Edit</a></td>
                <td class="px-6 py-4 text-right border-b"><a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="deleteItem(${item.id})">Delete</a></td>
            `;

            tableBody.appendChild(row);
        });
    }

    function editItem(id) {
        alert('Edit item with ID: ' + id);
        // Implement edit functionality here
    }

    function deleteItem(id) {
    if (confirm('Are you sure you want to delete this item?')) {
        fetch(`http://127.0.0.1:8000/api/dashboard/carousel/${id}`, {
            method: 'DELETE',
        })
        .then(response => {
            if (response.ok) {
                console.log('Item deleted with ID:', id);
                // Hapus baris dari tabel setelah penghapusan berhasil
                const row = document.querySelector(`#tableBody tr[data-id="${id}"]`);
                if (row) {
                    row.remove();
                }
            } else {
                console.error('Error deleting item with ID:', id);
            }
        })
        .catch(error => console.error('Error deleting item:', error));
    }
}

</script>
@endsection
