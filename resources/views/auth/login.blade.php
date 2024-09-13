<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
   <div class="flex justify-center items-center bg-slate-50 h-screen">
        <div class="text-slate-600 p-8 rounded-lg shadow-lg w-96">
            <div class="h-64 flex justify-center item-center" >
                <img src="{{asset('images/logo.png')}}" alt="">
            </div>
            <form method="POST" action="{{route('formlogin')}}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-md font-medium text-slate-600">Email</label>
                    <input
                    id="email"
                    type="email"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm p-2 focus:border-purple-800 focus:ring-indigo-500"
                    name="email"
                    requireds
                    />
                    @error('email')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-4">
                    <label for="password" class="block text-md font-medium text-slate-600">Password</label>
                   <input
                    id="password"
                    type="password"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm p-2 focus:border-purple-800 focus:ring-indigo-500"
                    name="password"
                    required
                    autocomplete="current-passwords"
                    />
                     @error('password')
                        <div style="color: red;">{{ $message }}</div>
                     @enderror

                </div>
                <div class="flex items-center justify-center mt-4">
                    <button type="submit" class=" w-52 ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:bg-green-500">Login</button>
                </div>

               <a href="{{route('google-auth')}}">
                    <div class="flex items-center justify-center mt-4">
                        <button type="button" class="w-52 ml-3 inline-flex justify-center py-2 px-4 border-2 border-emerald-200 shadow-sm text-sm font-medium rounded-md text-slate-600 bg-white-600 hover:bg-gray-300 focus:outline-2 focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">
                            <svg class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0-3.87-3.13-7-7-7m0 0A7 7 0 0 0 3 10c0 3.87 3.13 7 7 7m0 0c-.59-.02-1.12-.07-1.64-.14l-1.84 1.84c-.46.46-1.05.76-1.64.14-.59-.02-1.13-.07-1.64-.14l-1.84-1.84C6.78 11.37 6 9.61 6 8c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7z"></path>
                            </svg>
                            Login with Google
                        </button>
                    </div>
                </a>
            </form>
        </div>
    </div>
</body>
</html>