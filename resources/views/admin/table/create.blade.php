<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="flex justify-end">
            <a href="{{ route('admin.table.index') }}" class=" bg-black text-white px-4 hover:bg-blue-600 rounded-lg">Show Table</a>
           </div>
        </div>
    </div>

    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
        <form enctype="multipart/form-data" action="{{ route('admin.table.store') }}" method="POST">
            @csrf
          <div class="sm:col-span-6">
            <label for="name" class="block text-sm font-medium text-gray-700"> Table Name </label>
            <div class="mt-1">
              <input type="text" id="name"   name="name" class="@error('name') border-red-600 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border  rounded-md py-2 px-3 text-base leading-normal  sm:text-sm sm:leading-5" />
              @error('name')
              <span class="alert alert-danger text-red-600">{{ $message }}</span>
            @enderror
            </div>
          </div>
          <div class="sm:col-span-6">
            <label for="guest_number" class="block text-sm font-medium text-gray-700"> Table Guest Number </label>
            <div class="mt-1">
              <input type="number" id="guest_number"   name="guest_number" class="@error('guest_number') border-red-600 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border  rounded-md py-2 px-3 text-base leading-normal  sm:text-sm sm:leading-5" />
              @error('guest_number')
              <span class="alert alert-danger text-red-600">{{ $message }}</span>
            @enderror
            </div>
          </div>
          <div class="sm:col-span-6 pt-5">
            <label for="location" class="block text-sm font-medium text-gray-700">Table Location</label>
            <div class="mt-1">
            <select name="location" id="location" class="w-full">
                @foreach (App\Enums\TableLocation::cases() as $location)
                <option value="{{ $location->value }}">
                    {{ $location->name }}
                </option>
                @endforeach

            </select>
            </div>
          </div>
          <div class="sm:col-span-6 pt-5">
            <label for="status" class="block text-sm font-medium text-gray-700">Table Status</label>
            <div class="mt-1">
            <select name="status" id="status" class="w-full">
                @foreach (App\Enums\TableStatus::cases() as $status)
                <option value="{{ $status->value }}">
                    {{ $status->name }}
                </option>
                @endforeach

            </select>
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
