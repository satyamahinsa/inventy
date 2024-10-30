<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100">
    @include('layouts.sidebar')

    <div class="container mx-auto p-6 pl-64">
        <div>
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-semibold text-gray-900">Laporan Produk</h1>
                <input id="searchInput" type="text" placeholder="Cari berdasarkan nomor transaksi" class="border border-gray-300 rounded-lg py-2 px-4" onkeyup="searchTransaction()">
            </div>
            <div class="mt-3 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6 rounded-lg w-full" role="alert">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                    </svg>
                    <p class="font-bold">Recommended Action</p>
                </div>
                <p class="mt-2 text-sm">Berdasarkan analisis data terbaru, terdapat perbedaan dalam informasi pengiriman untuk beberapa transaksi. Disarankan untuk meninjau kembali entri-entri ini untuk memastikan keakuratan dan mencegah potensi masalah.</p>
            </div>
        </div>
    
        <div class="mt-6 bg-white shadow rounded-lg">
            <table id="transactionTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Stok
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($products as $product)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $product->id }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $product->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $product->description }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Rp {{ number_format($product->price) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $product->stock }}</div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function searchTransaction() {
            let input = document.getElementById('searchInput').value.toLowerCase()
            let table = document.getElementById('transactionTable')
            let rows = table.getElementsByTagName('tr')
            
            for (let i = 1; i < rows.length; i++) {
                let idCell = rows[i].getElementsByTagName('td')[0]

                if (idCell) {
                    let idText = idCell.textContent.toLowerCase()

                    if (idText.includes(input)) {
                        rows[i].style.display = ''
                    } else {
                        rows[i].style.display = 'none'
                    }
                }
            }
        }
    </script>
</body>
</html>
