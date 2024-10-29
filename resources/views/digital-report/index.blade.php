<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-semibold text-gray-900">Digital Report</h1>
                <p class="text-gray-600">Temukan semua transaksi yang telah dilakukan dengan mudah.</p>
            </div>
        </div>
        
        <div class="mt-6 bg-white shadow rounded-lg">
            {{-- Sales Report Section --}}
            <div class="mb-12 bg-amber-300 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold mb-4">Laporan Transaksi</h2>
                    </div>
                    <div>
                        <a href="{{ route('digital-report.detail-transaction-report') }}" class="mb-4 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Detail
                        </a>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-amber-100 p-4 rounded-md shadow">
                        <div class="flex justify-between items-center">
                            <p class="text-md font-semibold">Total Penjualan</p>
                            <div class="flex items-center">
                                <i class="fas fa-arrow-up text-green-500 mr-1 text-sm"></i>
                                <span class="text-green-500 font-semibold text-sm">+4.75%</span>
                            </div>
                        </div>
                        <p class="text-2xl font-bold text-gray-800 mt-2">Rp {{ number_format($totalSales, 2) }}</p>
                    </div>
                    <div class="bg-amber-100 p-4 rounded-md shadow">
                        <div class="flex justify-between items-center">
                            <p class="text-md font-semibold">Total Transaksi</p>
                            <div class="flex items-center">
                                <i class="fas fa-arrow-down text-red-500 mr-1 text-sm"></i>
                                <span class="text-red-500 font-semibold text-sm">-1.39%</span>
                            </div>
                        </div>
                        <p class="text-2xl font-bold text-gray-800 mt-2">{{ $totalTransactions }}</p>
                    </div>
                    <div class="bg-amber-100 p-4 rounded-md shadow">
                        <div class="flex justify-between items-center">
                            <p class="text-md font-semibold">Rata-Rata Nilai</p>
                            <div class="flex items-center">
                                <i class="fas fa-arrow-up text-green-500 mr-1 text-sm"></i>
                                <span class="text-green-500 font-semibold text-sm">+3.12%</span>
                            </div>
                        </div>
                        <p class="text-2xl font-bold text-gray-800 mt-2">Rp {{ number_format($averageOrderValue, 2) }}</p>
                    </div>
                    <div class="bg-amber-100 p-4 rounded-md shadow">
                        <div class="flex justify-between items-center">
                            <p class="text-md font-semibold">Transaksi Selesai</p>
                            <div class="flex items-center">
                                <i class="fas fa-arrow-up text-green-500 mr-1 text-sm"></i>
                                <span class="text-green-500 font-semibold text-sm">+2.15%</span>
                            </div>
                        </div>
                        <p class="text-2xl font-bold text-gray-800 mt-2">{{ $completedOrders }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Products Report Section --}}
        <div class="mt-6 bg-white shadow rounded-lg">
            <div class="mb-12 bg-amber-300 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold mb-4">Laporan Produk</h2>
                    </div>
                    <div>
                        <a href="{{ route('digital-report.detail-product-report') }}" class="mb-4 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Detail
                        </a>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-amber-100 p-4 rounded-md shadow">
                        <div class="flex justify-between items-center">
                            <p class="text-md font-semibold">Produk Terjual</p>
                            <div class="flex items-center">
                                <i class="fas fa-arrow-up text-green-500 mr-1 text-sm"></i>
                                <span class="text-green-500 font-semibold text-sm">+5.25%</span>
                            </div>
                        </div>
                        <p class="text-2xl font-bold text-gray-800 mt-2">0</p>
                    </div>
                    <div class="bg-amber-100 p-4 rounded-md shadow">
                        <div class="flex justify-between items-center">
                            <p class="text-md font-semibold">Produk Terlaris</p>
                            <div class="flex items-center">
                                <i class="fas fa-arrow-up text-green-500 mr-1 text-sm"></i>
                                <span class="text-green-500 font-semibold text-sm">+5.25%</span>
                            </div>
                        </div>
                        <p class="text-2xl font-bold text-gray-800 mt-2">0</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Customers Report Section --}}
        <div class="mt-6 bg-white shadow rounded-lg">
            <div class="mb-12 bg-amber-300 p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold mb-4">Laporan Pelanggan</h2>
                    </div>
                    <div>
                        <a href="{{ route('digital-report.detail-user-report') }}" class="mb-4 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Detail
                        </a>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-amber-100 p-4 rounded-md shadow">
                        <div class="flex justify-between items-center">
                            <p class="text-md font-semibold">Total Pelanggan</p>
                            <div class="flex items-center">
                                <i class="fas fa-arrow-up text-green-500 mr-1 text-sm"></i>
                                <span class="text-green-500 font-semibold text-sm">+8.43%</span>
                            </div>
                        </div>
                        <p class="text-2xl font-bold text-gray-800 mt-2">{{ $totalCustomers }}</p>
                    </div>
                    <div class="bg-amber-100 p-4 rounded-md shadow">
                        <div class="flex justify-between items-center">
                            <p class="text-md font-semibold">Pembeli Terbanyak</p>
                            <div class="flex items-center">
                                <i class="fas fa-arrow-up text-green-500 mr-1 text-sm"></i>
                                <span class="text-green-500 font-semibold text-sm">+8.43%</span>
                            </div>
                        </div>
                        <p class="text-2xl font-bold text-gray-800 mt-2">{{ $totalCustomers }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
