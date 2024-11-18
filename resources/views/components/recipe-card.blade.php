@props(['dish'])

<div class="overflow-hidden bg-white rounded-lg shadow-md">
    <img src="https://via.placeholder.com/300x200" alt="Recipe Image" class="object-cover w-full h-48">
    <div class="p-4">
        <h3 class="mb-2 text-xl font-bold text-gray-800">{{$dish->name}}</h3>
        <p class="text-sm text-gray-600">Brief description of the recipe goes here.</p>
    </div>
</div>