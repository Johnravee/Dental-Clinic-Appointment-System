<!-- resources/views/profile.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>User Profile</h1>
    </header>

    <main>
        @if($user)
            <p>Name: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Google ID: {{ $user->google_id }}dwadwadwa</p>

        @else
            <p>No user data available.</p>
        @endif
    </main>
</body>
</html>
