  <label for="select-vehicle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleciona o veículo</label>
  <select id="select-vehicle" name="vehicle_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
  value="{{ $drivingLesson->vehicle_id ?? ''}}"
  >
    @foreach ($vehicles as $vehicle)
        <option value="{{ $vehicle->id }}">{{ $vehicle->license_plate }}</option>
    @endforeach
  </select>
