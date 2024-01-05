<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="flex justify-end">
            <a href="{{ route('admin.reservation.index') }}"
            class=" bg-black text-white px-4 hover:bg-blue-600 rounded-lg">Show Reservation</a>
           </div>
        </div>
    </div>

    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
        <form enctype="multipart/form-data" action="{{ route('admin.reservation.store') }}" method="POST">
            @csrf
          <div class="sm:col-span-6">
            <label for="first_name" class="block text-sm font-medium text-gray-700"> First Name </label>
            <div class="mt-1">
              <input type="text" id="first_name"   name="first_name" class="@error('first_name') border-red-600 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border  rounded-md py-2 px-3 text-base leading-normal  sm:text-sm sm:leading-5" />
              @error('first_name')
              <span class="alert alert-danger text-red-600">{{ $message }}</span>
            @enderror
            </div>
          </div>
          <div class="sm:col-span-6">
            <label for="last_name" class="block text-sm font-medium text-gray-700"> Last Name </label>
            <div class="mt-1">
              <input type="text" id="last_name"   name="last_name" class="@error('last_name') border-red-600 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border  rounded-md py-2 px-3 text-base leading-normal  sm:text-sm sm:leading-5" />
              @error('last_name')
              <span class="alert alert-danger text-red-600">{{ $message }}</span>
            @enderror
            </div>
          </div>
          <div class="sm:col-span-6">
            <label for="email" class="block text-sm font-medium text-gray-700"> email </label>
            <div class="mt-1">
              <input type="email" id="email"   name="email" class="@error('email') border-red-600 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border  rounded-md py-2 px-3 text-base leading-normal  sm:text-sm sm:leading-5" />
              @error('email')
              <span class="alert alert-danger text-red-600">{{ $message }}</span>
            @enderror
            </div>
          </div>
          <div class="sm:col-span-6">
            <label for="tel_number" class="block text-sm font-medium text-gray-700"> Tel Number </label>
            <div class="mt-1">
              <input type="number" id="tel_number"   name="tel_number" class="@error('tel_number') border-red-600 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border  rounded-md py-2 px-3 text-base leading-normal  sm:text-sm sm:leading-5" />
              @error('description')
              <span class="alert alert-danger text-red-600">{{ $message }}</span>
            @enderror
            </div>
          </div>
          <div class="sm:col-span-6">
            <label for="res_date" class="block text-sm font-medium text-gray-700"> Reservation Date </label>
            <div class="mt-1">
              <input type="datetime-local" id="res_date"   name="res_date" class="@error('res_date') border-red-600 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border  rounded-md py-2 px-3 text-base leading-normal  sm:text-sm sm:leading-5" />
                @error('res_date')
                <span class="alert alert-danger text-red-600">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="sm:col-span-6 pt-5">
            <label for="location" class="block text-sm font-medium text-gray-700">Table </label>
            <div class="mt-1">
            <select name="table_id" id="table_id" class="w-full">
                @foreach ($table as $table)
                <option value="{{ $table->id }}">
                    {{ $table->name }}({{ $table->guest_number }} Guest)
                </option>
                @endforeach

            </select>
            </div>
          </div>
          <div class="sm:col-span-6">
            <label for="guest_number" class="block text-sm font-medium text-gray-700"> Guest Number </label>
            <div class="mt-1">
              <input type="number" id="guest_number"   name="guest_number" class="@error('guest_number') border-red-600 @enderror  block w-full transition duration-150 ease-in-out appearance-none bg-white border  rounded-md py-2 px-3 text-base leading-normal  sm:text-sm sm:leading-5" />
              @error('guest_name')
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
