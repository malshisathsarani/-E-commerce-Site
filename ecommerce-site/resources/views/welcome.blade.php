<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce Store</title>
    <!-- Add Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-2xl p-8 max-w-md w-full mx-4">
        <div class="text-center mb-8">
            <!-- Shopping cart icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <h1 class="text-3xl font-bold text-gray-900">Welcome to Our E-commerce Store</h1>
            <p class="mt-2 text-gray-600">Please login or register to continue shopping</p>
        </div>
        <div class="flex flex-col space-y-4">
            <a href="{{ route('login') }}" class="inline-flex justify-center items-center px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition duration-150 ease-in-out">
                <span>Login</span>
                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14" />
                </svg>
            </a>
            <a href="{{ route('register') }}" class="inline-flex justify-center items-center px-4 py-3 bg-white hover:bg-gray-50 text-gray-700 font-medium rounded-md border border-gray-300 transition duration-150 ease-in-out">
                <span>Register</span>
                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </a>
        </div>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-500">By using our services, you agree to our and Privacy Policy</a></p>
        </div>
    </div>
</body>
</html>