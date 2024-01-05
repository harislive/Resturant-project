<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
@foreach ($menu as $menu)

<div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg bg-gray-400">
    <a href="{{ route('categories.show',$menu->id) }}">
    <img class="w-full h-48" src="{{ Storage::url($menu->image) }}" alt="Image" />
    <div class="px-6 py-4 ">
        <h4 class="mb-3 text-xl font-semibold tracking-tight  text-white uppercase">{{ $menu->name }}</h4>
    <p class="leading-normal text-gray-700">{{ $menu->description }}</p>
</div>
<div class="flex items-center justify-between p-4">
    <span class="text-xl text-green-600">${{ $menu->price }}</span>
</div>
</a>
</div>

@endforeach
        </div>
    </div>
</x-guest-layout>
