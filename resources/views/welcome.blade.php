<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recipes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: white;
            background-image: linear-gradient(rgba(0, 0, 0, 0.02) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(0, 0, 0, 0.02) 1px, transparent 1px);
            background-size: 40px 40px;
            background-attachment: fixed;
            background-position: 0 -200px; /* Start hidden */
            transition: background-position 0.5s ease-in-out;
        }

        body.scrolled {
            background-position: 0 0; /* Reveal as you scroll */
        }

        .bg-banner {
            background-image: url('/images/food.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .bg-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            inset: 0;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Hero Section -->
<div class="flex flex-col items-center justify-center w-full px-5 py-12 mx-auto text-center max-w-7xl md:px-10 md:py-12">
    <h1 class="mb-4 text-6xl font-bold text-black md:text-8xl">
        Nikkey Olori 
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-yellow-500">Cooks!</span>
    </h1>
    <p class="max-w-lg mb-6 text-lg text-gray-400 sm:text-2xl md:text-3xl">
    Discover flavors, embrace creativity, and master the art of cooking with Nikkey.
    </p>
    <a href="/recipes" class="px-8 py-4 font-semibold text-white bg-indigo-800 rounded-md">Explore Recipes</a>
</div>

<!-- Banner Section with Image Background -->
<div class="relative w-full max-w-full px-6 py-10 text-center text-white shadow-lg" style="background-image: url('/images/food.jpg'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black opacity-40"></div> <!-- Dark overlay to enhance text visibility -->
    <div class="relative z-10">
        <h2 class="mb-4 text-4xl font-bold">Your Next Culinary Adventure Awaits</h2>
        <p class="mb-6 text-lg">
            Dive into a world of flavors and explore step-by-step guides to create stunning dishes.
        </p>
        <a href="/recipes" class="px-6 py-3 font-bold text-red-500 bg-white rounded-md shadow-md hover:bg-red-100">
            Start Cooking
        </a>
    </div>
</div>

<!-- Watch Her in Action Section -->
<section id="watch-her" class="px-6 py-12 bg-gray-100">
    <div class="container mx-auto text-center">
        <h2 class="mb-8 text-4xl font-bold text-black">Watch Her in Action</h2>
        <p class="mb-6 text-lg text-gray-600">
            Follow Nikkey on her social platforms and explore her creative culinary videos.
        </p>
        <div class="flex justify-center gap-6 mb-8">
            <a href="https://www.instagram.com/nikkeyoloricooks/" target="_blank" 
               class="px-6 py-3 font-bold text-white bg-pink-500 rounded-md shadow-md hover:bg-pink-400">
               Follow on Instagram
            </a>
            <a href="https://www.youtube.com/@nikkeyoloricooks/videos" target="_blank" 
               class="px-6 py-3 font-bold text-white bg-red-500 rounded-md shadow-md hover:bg-red-400">
               Subscribe on YouTube
            </a>
        </div>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- YouTube Video 1 -->
            <iframe class="w-full rounded-md shadow-md aspect-video" 
                    src="https://www.youtube.com/embed/MUmI6zCyvhs" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
            <!-- YouTube Video 2 -->
            <iframe class="w-full rounded-md shadow-md aspect-video" 
                    src="https://www.youtube.com/embed/5TnCTFibpSQ" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
            <!-- YouTube Video 3 -->
            <iframe class="w-full rounded-md shadow-md aspect-video" 
                    src="https://www.youtube.com/embed/aFEZ5q0HOns" 
                    title="YouTube video" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
        </div>
    </div>
</section>

    <!-- Recipes Section -->
    <section id="recipes" class="mt-12 mb-12">
        <div class="container px-6 mx-auto">
            <h2 class="mb-8 text-3xl font-bold text-gray-800">Latest Recipes</h2>
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
    <!-- JavaScript -->
    <script>
        window.addEventListener('scroll', () => {
            const body = document.querySelector('body');
            if (window.scrollY > 100) {
                body.classList.add('scrolled');
            } else {
                body.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>