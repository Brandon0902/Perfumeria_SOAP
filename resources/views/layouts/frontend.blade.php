<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LEONMEE</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-...tu-integridad-aquí..." crossorigin="anonymous">
    <link rel="icon" href="{{ asset('images/lion.png') }}">
</head>
<body>
    <div>
        <header class="mb-16">
            <nav class="text-white bg-gradient-to-r from-blue-500 to-purple-500 flex justify-between items-center hover:bg-gradient-to-r hover:from-purple-500 hover:to-blue-500 transition duration-300 ease-in-out rounded-none shadow-lg p-4 md:p-6">
                <div class="flex flex-col sm:flex-row">
                    <h1 class="text-2xl font-bold text-gray-800 hidden md:block">LEONMEE</h1>
                    <a class="mt-3 hover:underline sm:mx-3 sm:mt-0" href="{{ route('products.list')}}">Inicio</a>
                    <a class="mt-3 hover:underline sm:mx-3 sm:mt-0" href="{{ route('orders.list')}}">Pedidos</a>
                    <a class="mt-3 hover:underline sm:mx-3 sm:mt-0" href="/empresa">Nuestra Marca</a> 
                </div>
                <div class="flex items-center">
                    <a href="{{ route('cart.list') }}" class="flex items-center mr-4">
                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        {{ Cart::getTotalQuantity()}}
                    </a>
                    <a href="{{ route('profile.show') }}" class="mx-4 text-gray-600 focus:outline-none">
                        <i class="fas fa-user"></i>
                    </a>
                    <span class="text-gray-600">{{ auth()->user()->name }}</span>
                </div>
            </nav>
        </header>
        
        <main class="my-8">
            @yield('content')
        </main>

        <footer class="bg-gradient-to-r from-blue-500 to-purple-500 text-white py-4">
            <div class="container mx-auto flex justify-center items-center">
                <a href="#" class="mr-4 text-xl"><i class="fab fa-facebook"></i></a>
                <a href="#" class="mr-4 text-xl"><i class="fab fa-twitter"></i></a>
                <a href="#" class="mr-4 text-xl"><i class="fab fa-instagram"></i></a>
                <a href="#" class="mr-4 text-xl"><i class="fab fa-whatsapp"></i></a>
            </div>
            <div class="text-center mt-2">Derechos Reservados a LEONMEE</div>
        </footer>
    </div>
</body>
</html>
