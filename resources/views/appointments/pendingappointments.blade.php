<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Pending</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/pending.css') }}">
</head>

<body>
    <header class="header">
        <a class="back-button" href="{{ route('dashboard') }}">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        <h1 class="header-title">Pending Appointments</h1>
    </header>

    <div class="wrapper">
        <div class="appointment-count">
            <p>You have <strong>{{ $appointments->count() }}</strong> pending appointment(s).</p>
        </div>
        <div class="container">
            @if($appointments->isEmpty())
                <div class="no-appointments">
                    <p>No pending appointments found.</p>
                    <p><a href="{{ route('schedule') }}" class="schedule-link">Schedule a new appointment</a></p>
                </div>
            @else
                @foreach($appointments as $appointment)
                    <form action="{{route('cancel-appointment')}}" method="post">
                        @csrf
                        <div class="appointment-card">
                            <input type="hidden" value="{{ $appointment->id }}" name="id" />
                            <input type="hidden" value="{{$appointment->start}}" name="start">
                            <h2 class="appointment-title">{{ $appointment->title }}</h2>
                            <p><strong>Concern:</strong> {{ $appointment->concern }}</p>
                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->start)->format('Y-m-d') }}</p>
                            <p><strong>Status:</strong> {{ $appointment->status }}</p>
                            <button type="submit" name="cancel" class="cancel-btn">Cancel Appointment</button>
                        </div>
                    </form>
                @endforeach
            @endif
        </div>
    </div>
</body>

</html>
