<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="mx-auto max-w-2xl px-6 lg:max-w-7xl lg:px-8">
            <div class="mx-5 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-semibold text-gray-900">Edit Transaksi</h1>
                <p class="text-gray-600">Silakan edit informasi transaksi Anda di bawah ini.</p>
                </div>
                <div class="flex space-x-2">
                    <button type="submit" form="editTransactionForm" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Simpan
                    </button>
                </div>
            </div>

            <form id="editTransactionForm" action="/transactions/{{ $transaction->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mt-3 grid gap-4 sm:mt-5 lg:grid-cols-3 lg:grid-rows-2">
                    <div class="relative lg:row-start-1 w-full">
                        <div class="absolute inset-px rounded-tl-[2rem] rounded-bl-[2rem] bg-white max-lg:rounded-t-[2rem]"></div>
                        <div class="mt-5 mb-5 relative flex flex-col justify-between h-auto overflow-hidden rounded-tl-[2rem] rounded-bl-[2rem] rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-t-[calc(2rem+1px)]">
                            <div class="px-4 pt-3 sm:px-5 sm:pt-3 flex-1">
                                <label class="text-lg/7 font-medium tracking-tight text-gray-950 max-lg:text-center">ID Transaksi</label>
                                <input type="text" name="transaction_id" value="{{ $transaction->id }}" class="block mt-2 w-full text-sm/6 text-gray-600 max-lg:text-center border rounded px-3 py-2 bg-gray-200" readonly>
                            </div>
                            <div class="px-4 pt-3 sm:px-5 sm:pt-3 flex-1">
                                <label class="text-lg/7 font-medium tracking-tight text-gray-950 max-lg:text-center">Tanggal Pembelian</label>
                                <input type="date" name="created_at" value="{{ $transaction->created_at->format('Y-m-d') }}" class="block mt-2 w-full text-sm/6 text-gray-600 max-lg:text-center border rounded px-3 py-2 bg-gray-200" readonly>
                            </div>
                            <div class="px-4 pt-3 sm:px-5 sm:pt-3 flex-1">
                                <label class="text-lg/7 font-medium tracking-tight text-gray-950 max-lg:text-center">Nama Lengkap</label>
                                <input type="text" name="user_name" value="{{ $transaction->user->name }}" class="block mt-2 w-full text-sm/6 text-gray-600 max-lg:text-center border rounded px-3 py-2 bg-gray-200" readonly>
                            </div>
                            <div class="px-4 pt-3 sm:px-5 sm:pt-3 flex-1">
                                <label class="text-lg/7 font-medium tracking-tight text-gray-950 max-lg:text-center">Alamat Email</label>
                                <input type="email" name="user_email" value="{{ $transaction->user->email }}" class="block mt-2 w-full text-sm/6 text-gray-600 max-lg:text-center border rounded px-3 py-2 bg-gray-200" readonly>
                            </div>
                        </div>
                        <div class="pointer-events-none absolute inset-px rounded-tl-[2rem] rounded-bl-[2rem] shadow ring-1 ring-black/5 max-lg:rounded-t-[2rem]"></div>
                    </div>

                    <div class="relative lg:row-start-2 w-full">
                        <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-t-[2rem]"></div>
                        <div class="mt-3 mb-5 relative flex flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-t-[calc(2rem+1px)]">
                            <div class="px-4 pt-3 sm:px-5 sm:pt-3">
                                <label class="text-lg/7 font-medium tracking-tight text-gray-950 max-lg:text-center">Status</label>
                                <select name="status" class="block mt-2 text-sm px-3 py-1 rounded-full border bg-gray-100 w-full">
                                    <option value="completed" {{ $transaction->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="canceled" {{ $transaction->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                </select>
                            </div>
                            <div class="px-4 pt-3 sm:px-5 sm:pt-3">
                                <label class="text-lg/7 font-medium tracking-tight text-gray-950 max-lg:text-center">Alamat Tujuan</label>
                                <textarea name="alamat-tujuan" rows="8" cols="40" class="block mt-2 w-full text-sm/6 text-gray-600 max-lg:text-center border rounded px-3 py-2 bg-white">{{ $transaction->destination_address }}</textarea>
                            </div>
                        </div>
                        <div class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-t-[2rem]"></div>
                    </div>

                    <div class="relative lg:row-start-1 lg:col-start-2 lg:col-span-2 w-full">
                        <div class="absolute inset-px rounded-lg bg-white"></div>
                        <div class="mt-3 mb-5 relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)]">
                            <div class="px-4 pt-3 sm:px-5 sm:pt-3">
                                <label class="block mt-2 text-lg/7 font-medium tracking-tight text-gray-950 max-lg:text-center">Layanan Pengiriman</label>
                                <input type="text" name="shipping_service" value="{{ $transaction->shipping_service }}" class="block mt-2 w-full text-sm/6 text-gray-600 max-lg:text-center border rounded px-3 py-2 bg-gray-200" readonly>
                            </div>
                            <div class="px-4 pt-3 sm:px-5 sm:pt-3">
                                <label class="block mt-2 text-lg/7 font-medium tracking-tight text-gray-950 max-lg:text-center">Lacak Pengiriman</label>
                                <div id="map" class="mt-4 mx-5 h-48"></div>
                            </div>
                        </div>
                        <div class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5"></div>
                    </div>

                    <div class="relative lg:row-start-2 lg:col-start-2 lg:col-span-2 w-full">
                        <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-b-[2rem] lg:rounded-r-[2rem]"></div>
                        <div class="mt-3 mb-5 relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-b-[calc(2rem+1px)]">
                            <div class="px-4 pt-3 sm:px-5 sm:pt-3">
                                <label class="block mt-2 text-lg/7 font-medium tracking-tight text-gray-950 max-lg:text-center">Total Harga</label>
                                <input type="text" name="total_price" value="Rp {{ number_format($transaction->total_price) }}" class="block mt-2 w-full text-sm/6 text-gray-600 max-lg:text-center border rounded px-3 py-2 bg-gray-200" readonly>
                            </div>
                            <div class="px-4 pt-3 sm:px-5 sm:pt-3">
                                <label class="block mt-2 text-lg/7 font-medium tracking-tight text-gray-950 max-lg:text-center">Daftar Produk</label>
                                <div class="mt-2 overflow-x-auto">
                                    <div class="flex space-x-4">
                                        <div class="bg-white border rounded-lg shadow-md p-4 min-w-[150px]">
                                            <img src="https://picsum.photos/id/{{ $transaction->id }}/100/100" alt="Produk 1" class="w-full">
                                            <h3 class="font-semibold text-gray-800">Produk 1</h3>
                                            <p class="text-gray-600">Harga: Rp {{ number_format($transaction->total_price, 2) }}</p>
                                            <p class="text-gray-600">Jumlah: 3</p>
                                        </div>
                                        <div class="bg-white border rounded-lg shadow-md p-4 min-w-[150px]">
                                            <img src="https://picsum.photos/id/{{ $transaction->id }}/100/100" alt="Produk 1" class="w-full">
                                            <h3 class="font-semibold text-gray-800">Produk 1</h3>
                                            <p class="text-gray-600">Harga: Rp {{ number_format($transaction->total_price, 2) }}</p>
                                            <p class="text-gray-600">Jumlah: 3</p>
                                        </div>
                                        <div class="bg-white border rounded-lg shadow-md p-4 min-w-[150px]">
                                            <img src="https://picsum.photos/id/{{ $transaction->id }}/100/100" alt="Produk 1" class="w-full">
                                            <h3 class="font-semibold text-gray-800">Produk 1</h3>
                                            <p class="text-gray-600">Harga: Rp {{ number_format($transaction->total_price, 2) }}</p>
                                            <p class="text-gray-600">Jumlah: 3</p>
                                        </div>
                                        <div class="bg-white border rounded-lg shadow-md p-4 min-w-[150px]">
                                            <img src="https://picsum.photos/id/{{ $transaction->id }}/100/100" alt="Produk 1" class="w-full">
                                            <h3 class="font-semibold text-gray-800">Produk 1</h3>
                                            <p class="text-gray-600">Harga: Rp {{ number_format($transaction->total_price, 2) }}</p>
                                            <p class="text-gray-600">Jumlah: 3</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-b-[2rem]"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([-7.2575, 112.7521], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 15,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        const transaction = @json($transaction);
        const deliveryCoordinates = [transaction.latitude, transaction.longitude];
        const marker = L.marker(deliveryCoordinates)
            .addTo(map)
            .bindPopup(`Dalam Perjalanan: ${transaction.destination_address}`)
            .openPopup();

        map.setView(deliveryCoordinates, 10)
    </script>
</body>
</html>
