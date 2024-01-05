<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="flex justify-end">
            <a href="{{ route('admin.category.index') }}" class=" bg-black text-white px-4 hover:bg-blue-600 rounded-lg">Show Category</a>
           </div>
        </div>
    </div>

    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
        <form enctype="multipart/form-data" action="{{ route('admin.category.store') }}" method="POST">
            @csrf
          <div class="sm:col-span-6">
            <label for="name" class="block text-sm font-medium text-gray-700"> Category Name </label>
            <div class="mt-1">
              <input type="text" id="name"   name="name"
              class="block w-full transition duration-150 ease-in-out appearance-none bg-white border  rounded-md py-2 px-3 text-base leading-normal  sm:text-sm sm:leading-5 @error('name') border-red-600 @enderror" />
           @error('name')
                <span class="alert alert-danger text-red-600">{{ $message }}</span>
           @enderror
            </div>
          </div>
          <div class="sm:col-span-6">
            <label for="title" class="block text-sm font-medium text-gray-700"> Category Image </label>
            <div class="mt-1">
              <input type="file" id="image"  name="image"
              class="block w-full transition duration-150 ease-in-out appearance-none bg-white border rounded-md py-2 px-3 text-base leading-normal  sm:text-sm sm:leading-5 @error('image') border-red-600 @enderror" />
              @error('name')
              <span class="alert alert-danger text-red-600">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="sm:col-span-6 pt-5">
            <label for="description" class="block text-sm font-medium text-gray-700">Category Descriptions</label>
            <div class="mt-1">
              <textarea id="description" rows="3" name="description"
              class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border  rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm @error('description') border-red-600 @enderror"></textarea>
              @error('description')
                <span class="alert alert-danger text-red-600">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="sm:col-span-6 pt-5">

            <div class="mt-1">
              <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Save
              </button>
            </div>
          </div>
        </form>
      </div>



</x-admin-layout>
