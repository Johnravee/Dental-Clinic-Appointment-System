<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Verify Your Email Address') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="h-screen bg-gray-100">
    <div class="max-w-md mx-auto p-6 bg-gray rounded-md shadow-md">
        <h2 class="text-2xl font-bold mb-4">{{ __('Verify Your Email Address') }}</h2>
        <p class="text-gray-600 mb-6">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Resend Verification Email') }}
            </button>
        </form>
    </div>
</body>
</html>