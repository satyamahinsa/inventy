<!-- Sidebar -->
<div id="sidebar" class="w-64 bg-amber-800 fixed h-screen p-6 z-10 top-0 left-0 flex flex-col justify-between transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="flex flex-col">
        <div class="flex items-center justify-between mb-8">
            <a href="/" class="text-white font-bold text-2xl">
                <i class="fas fa-wave-square"></i> Inventy
            </a>
            {{-- <button onclick="closeNav()" class="text-white focus:outline-none">
                <i class="fas fa-arrow-left"></i>
            </button> --}}
        </div>
        <nav class="space-y-4">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 text-white hover:bg-amber-700 p-3 rounded">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="" class="flex items-center space-x-3 text-white hover:bg-amber-700 p-3 rounded">
                <i class="fas fa-box"></i>
                <span>Produk</span>
            </a>
            <a href="{{ route('transactions.index') }}" class="flex items-center space-x-3 text-white hover:bg-amber-700 p-3 rounded">
                <i class="fas fa-exchange-alt"></i>
                <span>Transaksi</span>
            </a>
            <a href="{{ route('digital-report.index') }}" class="flex items-center space-x-3 text-white hover:bg-amber-700 p-3 rounded">
                <i class="fas fa-chart-line"></i>
                <span>Digital Report</span>
            </a>
        </nav>
    </div>
    <div class="mt-auto">
        <a href="#" class="flex items-center space-x-3 text-white hover:bg-amber-700 p-3 rounded">
            <i class="fas fa-moon"></i>
            <span>Dark Mode</span>
        </a>
        <a href="#" class="flex items-center space-x-3 text-white hover:bg-amber-700 p-3 rounded">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
        </a>
        <a href="#" class="flex items-center space-x-3 text-white hover:bg-amber-700 p-3 rounded">
            <i class="fas fa-sign-out-alt"></i>
            <span>Log Out</span>
        </a>
    </div>
</div>
