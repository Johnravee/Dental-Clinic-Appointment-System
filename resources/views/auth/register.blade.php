<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
   <div class="flex justify-center items-center bg-slate-50 h-screen">
        <div class="text-slate-600 p-8 rounded-lg shadow-lg w-96">
            <div class="h-64 flex justify-center item-center" >
                <img src="{{asset('images/logo.png')}}" alt="">
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                 <div class="mb-4">
                    <label for="email" class="block text-md font-medium text-slate-600">Name</label>
                    <input
                    id="name"
                    type="text"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm p-2 focus:border-purple-800 focus:ring-indigo-500"
                    name="name"
                    required
                    />
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-md font-medium text-slate-600">Email</label>
                    <input
                    id="email"
                    type="email"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm p-2 focus:border-purple-800 focus:ring-indigo-500"
                    name="email"
                    required
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
                    autocomplete="current-password"
                    />
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-md font-medium text-slate-600">Confirm Password</label>
                   <input
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm p-2 focus:border-purple-800 focus:ring-indigo-500"
                    name="password_confirmation"
                    required
                    autocomplete="current-password"
                    />
                </div>

                 @error('password_confirmation')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
                @if($errors->has('password'))
                    <div class="text-red-500 text-sm">{{ $errors->first('password') }}</div>
                @endif

                <div class="flex items-center mb-4">
                    <input type="checkbox" id="show_password" onclick="togglePassword()" class="w-4 h-4 text-purple-600 bg-gray-100 rounded border-gray-300 focus:ring-purple-500">
                    <label for="show_password" class="ml-2 text-sm text-gray-500 hover:text-gray-800 cursor-pointer">  Show Password</label>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <button type="submit" class=" w-52 ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:bg-green-500">Register</button>
                </div>
            </form>

             @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

        </div>
    </div>

    <script>
        function togglePassword() {
            var x = document.getElementById("password");
            var y = document.getElementById("password_confirmation");
            if (x.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }
    </script>
</body>
</html>