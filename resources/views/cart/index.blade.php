<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Menambahkan jQuery -->
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Keranjang Belanja</h1>

        @if (session('success'))
            <div class="mb-4 text-green-500">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 text-red-500">
                {{ session('error') }}
            </div>
        @endif

        @if (empty($cart))
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4">
                <p>Keranjang anda kosong, silahkan memilih produk.</p>
            </div>
        @else
            <table class="min-w-full bg-white border border-gray-300 mb-2">
                <thead>
                    <tr>
                        <th class="border-b-2 border-gray-300 px-2 py-1 text-left text-sm">Nama Produk</th>
                        <th class="border-b-2 border-gray-300 px-2 py-1 text-left text-sm">Harga</th>
                        <th class="border-b-2 border-gray-300 px-2 py-1 text-left text-sm">Kuantitas</th>
                        <th class="border-b-2 border-gray-300 px-2 py-1 text-left text-sm">Total</th>
                        <th class="border-b-2 border-gray-300 px-2 py-1 text-left text-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $grandTotal = 0; 
                    @endphp
                    @foreach ($cart as $id => $item)
                        @php
                            $subtotal = $item['price'] * $item['quantity']; 
                            $grandTotal += $subtotal; 
                        @endphp
                        <tr>
                            <td class="border-b border-gray-300 px-2 py-1 text-sm">{{ $item['name'] }}</td>
                            <td class="border-b border-gray-300 px-2 py-1 text-sm">
                                Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td class="border-b border-gray-300 px-2 py-1 text-sm">{{ $item['quantity'] }}</td>
                            <td class="border-b border-gray-300 px-2 py-1 text-sm">
                                Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                            <td class="border-b border-gray-300 px-2 py-1 text-sm">
                                <form action="{{ route('cart.remove', $id) }}" method="POST" class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="bg-gray-100 border border-gray-300 p-4 rounded mt-2 w-full mb-4"> 
                <h2 class="text-lg font-semibold mb-1">Subtotal Pembelian</h2>
                <div class="flex justify-between">
                    <span class="text-sm">Total Keseluruhan:</span>
                    <span class="font-bold">Rp{{ number_format($grandTotal, 0, ',', '.') }}</span>
                </div>
            </div>
        @endif

        <div class="mt-2 flex justify-between items-center">
            <a href="{{ route('products.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Kembali ke Produk</a>
            @if (!empty($cart))
                <a href="{{ route('cart.payment') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Lanjutkan ke Pembayaran</a>
            @endif
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.delete-form').on('submit', function(event) {
                event.preventDefault(); // Mencegah pengiriman form secepatnya
                const form = $(this); // Mendapatkan form yang di-submit

                // Tampilkan konfirmasi SweetAlert sebelum menghapus
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menghapus produk ini dari keranjang!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika konfirmasi, kirim form
                        form.off('submit').submit(); // Menghapus event handler lalu submit form

                        // Tampilkan alert berhasil dihapus setelah menghapus
                        Swal.fire({
                            title: 'Dihapus!',
                            text: 'Produk telah berhasil dihapus dari keranjang.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>
