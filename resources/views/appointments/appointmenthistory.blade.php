<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Appointment History</title>
    <link rel="stylesheet" href="{{asset('css/history.css')}}">
</head>

<body>

     <header class="header">
        <a class="back-button" href="{{ route('dashboard') }}">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        <h1 class="header-title">Your Appointment History</h1>
    </header>



    @foreach ($appointments as $appointment)
        <div class="card">
            <h2>{{ $appointment->title }}</h2>
            <p><strong>Concern:</strong> {{ $appointment->concern }}</p>
            <p><strong>Start Date:</strong> {{ $appointment->start }}</p>
            <p class="status {{ strtolower($appointment->status) }}"><strong>Status:</strong> {{ $appointment->status }}</p>
            <p><small>Created At: {{ $appointment->created_at }}</small></p>
            <p><small>Updated At: {{ $appointment->updated_at }}</small></p>
        </div>
    @endforeach

</body>

</html>
