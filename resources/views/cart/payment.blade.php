@extends('cart.index')

@section('content')
    <div class="container">
        <h2>Payment</h2>
        <form id="payment-form" method="POST" action="{{ route('cart.payment.process') }}">
            @csrf
            
            <button type="button" id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
        </form>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('SB-Mid-client--FLypMd_WAAnn4pe') }}"></script>
    <script>
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            // Ambil Snap Token dari server
            fetch('{{ route('cart.payment.process') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Pastikan untuk menyertakan CSRF token
                },
                body: JSON.stringify({
                    // Tambahkan data yang diperlukan di sini
                    // Misalnya: amount, first_name, last_name, email, phone
                })
            })
            .then(response => response.json())
            .then(data => {
                // Panggil Midtrans Snap dengan Snap Token
                snap.pay(data.snap_token, {
                    onSuccess: function (result) {
                        window.location.href = "{{ route('cart.payment.success') }}";
                    },
                    onPending: function (result) {
                        window.location.href = "{{ route('cart.payment.success') }}";
                    },
                    onError: function (result) {
                        window.location.href = "{{ route('cart.payment.failed') }}";
                    }
                });
            })
            .catch(error => {
                console.error('Error:', error);
                // Tindakan jika terjadi kesalahan dalam pengambilan token
            });
        });
    </script>
@endsection
