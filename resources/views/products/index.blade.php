<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('styleProduct/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <form action="{{ route('products.index') }}" method="GET" class="flex items-center mb-4" id="searchForm">
            <input type="text" name="search" placeholder="Cari produk..." class="border rounded p-2"
                value="{{ request('search') }}">
            <button type="submit" class="ml-2 bg-blue-500 text-white rounded p-2">Cari</button>
        </form>

        <div class="flex flex-wrap gap-4 mb-6 border-b-2 pb-4">
            <a href="{{ route('products.index') }}" 
               class="border border-gray-400 rounded p-2 bg-white hover:bg-blue-500 hover:text-white">
                Semua Kategori ({{ $totalProducts }})
            </a>
            @foreach ($categories as $category)
                <a href="{{ route('products.index', ['category' => $category->id]) }}" 
                   class="border border-gray-400 rounded p-2 bg-white hover:bg-blue-500 hover:text-white">
                    {{ $category->name }} ({{ $category->products_count }})
                </a>
            @endforeach
        </div>

        @if (session('success'))
            <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if ($products->isEmpty())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4">
                <p>Maaf, tidak ada produk yang tersedia untuk kategori dan pencarian yang Anda pilih.</p>
            </div>
        @else

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-60 object-cover rounded mb-10">
                    <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                    <p class="text-gray-700">{{ $product->description }}</p>
                    <p class="text-gray-900 font-bold">Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-gray-600">Stok: {{ $product->stock }}</p>
                    <form action="{{ route('products.addToCart', $product->id) }}" method="POST" class="add-to-cart-form">
                        @csrf
                        <div class="flex items-center mt-4">
                            <input type="number" name="quantity" min="1" max="{{ $product->stock }}"
                                value="1" class="border rounded p-2 w-16">
                            <button type="submit" class="ml-2 bg-blue-500 text-white py-2 px-4 rounded flex items-center add-to-cart">
                                <i class="fas fa-shopping-cart mr-2"></i>
                                Tambah
                            </button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>        
            </div>
        @endif
    </div>

    <div class="cart" id="cart">
        <a href="{{ route('cart.index') }}" class="text-white flex items-center justify-center w-full h-full relative">
            <i class="fas fa-shopping-cart"></i>
            <span id="cart-count" class="cart-count">{{ $cartCount }}</span>
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.add-to-cart-form').on('submit', function(event) {
            event.preventDefault(); 
            const form = $(this);
            const quantity = form.find('input[name="quantity"]').val();

            $.post(form.attr('action'), {
                _token: '{{ csrf_token() }}',
                quantity: quantity
            }).done(function() {
                // Jika berhasil, tampilkan SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Produk Ditambahkan',
                    text: 'Produk telah berhasil ditambahkan ke keranjang!',
                    showConfirmButton: true,
                    timer: 3000 
                });


                const currentCount = parseInt($('#cart-count').text());
                $('#cart-count').text(currentCount + parseInt(quantity));
            }).fail(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan saat menambahkan produk!',
                });
            });
        });
    });
    </script>

</body>

</html>