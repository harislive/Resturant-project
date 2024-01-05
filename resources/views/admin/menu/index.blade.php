<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="flex justify-end">
            <a href="{{ route('admin.menu.create') }}"
            class=" bg-black text-white px-4 hover:bg-green-500  rounded-lg">Create Menu</a>
           </div>
        </div>
    </div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menu as $collect)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $collect->name }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   <img src="{{ Storage::url($collect->image) }}" class="w-16 h-16 rounded">
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $collect->price }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $collect->description }}
                </th>
                <td class="m-4 p-4 flex space-x-2">
                    <a href="{{ route('admin.menu.edit',$collect->id) }}"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('admin.menu.destroy',$collect->id) }}" method="post" onsubmit="return confirm('Are You Sure?')">
                        @csrf
                        @method('delete')
                        <button type="submit"
                        class="font-medium text-red-600 dark:text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>



</x-admin-layout>
