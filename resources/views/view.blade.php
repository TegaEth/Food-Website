<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $dish->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="text-gray-800 bg-gray-50">
    <div class="container max-w-4xl px-6 py-12 mx-auto">
        <!-- Dish Name -->
        <div class="mb-8 text-center">
            <h1 class="text-5xl font-bold text-gray-900">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-yellow-500">
                    {{ $dish->name }}
                </span>
            </h1>
        </div>

        <!-- YouTube Video -->
        @if ($dish->youtube_link)
            <div class="mb-10">
                <div class="relative w-full" style="padding-top: 56.25%;"> <!-- Aspect Ratio 16:9 -->
                    <iframe 
                        class="absolute top-0 left-0 w-full h-full rounded-md shadow-md" 
                        src="{{ $dish->youtube_link }}" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen></iframe>
                </div>
            </div>
        @endif

        <!-- Country -->
        @if ($dish->country)
            <div class="mb-6 text-center">
                <p class="text-xl font-medium text-gray-700">
                    <span class="font-semibold text-gray-900">Country of Origin:</span> {{ $dish->country }}
                </p>
            </div>
        @endif

        <!-- Dish Image -->
        <div class="mb-8">
            <img 
                src="{{ asset('storage/' . $dish->image) }}" 
                alt="{{ $dish->name }}" 
                class="object-cover w-full rounded-lg shadow-lg"
                style="max-height: 500px;">
        </div>

        <!-- About This Dish Section -->
        <div class="mb-8">
            <h2 class="mb-4 text-3xl font-bold text-gray-900">Steps</h2>
            <div class="p-6 mx-auto prose prose-lg bg-white rounded-lg shadow-md">
                {!! \Illuminate\Support\Str::markdown($dish->description) !!}
            </div>
        </div>
    </div>
</body>
</html>