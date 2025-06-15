<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/booking.css') }}">
    @endpush

    @section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 text-center">
                    <div class="success-animation mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
                    </div>
                    <h1 class="mb-4">Payment Successful!</h1>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Booking Details</h4>
                            <div class="row">
                                <div class="col-md-6 text-start">
                                    <p><strong>Booking ID:</strong> #{{ $booking->id }}</p>
                                    <p><strong>Service:</strong> {{ $booking->service->name }}</p>
                                    <p><strong>Date:</strong> {{ $booking->appointment_date }}</p>
                                    <p><strong>Time:</strong> {{ $booking->appointment_time }}</p>
                                </div>
                                <div class="col-md-6 text-start">
                                    <p><strong>Amount Paid:</strong> {{ number_format($booking->total_price, 2) }} LKR</p>
                                    <p><strong>Transaction ID:</strong> {{ $booking->transaction_id }}</p>
                                    <p><strong>Payment Method:</strong> Credit Card</p>
                                    <p><strong>Status:</strong> <span class="badge bg-success">Confirmed</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <p>A confirmation email has been sent to {{ $booking->email }}</p>
                        <p>Please arrive 10 minutes before your scheduled appointment time.</p>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Go to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
</x-app-layout>