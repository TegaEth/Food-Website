<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recipes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased">
    <!-- Hero Section -->
    <div class="flex flex-col items-center justify-center w-full px-5 py-12 mx-auto text-center max-w-7xl md:px-10 md:py-12">
        <a href='/'>
            <h1 class="mb-4 text-6xl font-bold text-black md:text-8xl">
                Nikkey Olori
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-yellow-500">Cooks!</span>
            </h1>
        </a>
        <p class="max-w-lg mb-6 text-lg text-gray-400 sm:text-2xl md:text-3xl">
        Discover flavors, embrace creativity, and master the art of cooking with Nikkey.
        </p>
    </div>

    <!-- Recipes Section -->
    <section id="recipes" class="mt-12">
        <div class="container px-6 mx-auto">
            <h2 class="mb-8 text-4xl font-bold text-gray-800">Recipes</h2>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($dishes as $dish)
                <div class="overflow-hidden transition-shadow duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl">
                    <!-- Image Section -->
                    <div class="relative group">
                        <img src="{{$dish->image}}" alt="Recipe Image" class="object-cover w-full h-48 transition duration-300 group-hover:opacity-70">
                        <!-- Name Overlay on Hover -->
                        <div class="absolute inset-0 flex items-center justify-center transition duration-300 bg-black bg-opacity-0 group-hover:bg-opacity-70">
                            <a href="{{ url('/recipe/' . $dish->id) }}">
                                <h3 class="text-2xl font-bold text-white transition duration-300 opacity-0 group-hover:opacity-100">
                                    {{$dish->name}}
                                </h3>
                            </a>
                        </div>
                    </div>
                    <!-- Content Section -->
                    <div class="p-4 bg-white">
                        <a href="#"><h1 class="mb-2 text-2xl font-bold text-black">{{ $dish->name }}</h1></a>
                        <p class="text-sm text-gray-600">
                            {{ \Illuminate\Support\Str::limit($dish->description, 100) }} <!-- Limit description to 100 characters -->
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    </div>
</body>
</html>