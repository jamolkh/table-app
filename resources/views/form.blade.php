<x-app-layout>

    <x-slot name="header">
        {{'Добавить Затраты'}}
</x-slot>


<div class="w-full max-w-xs container mx-auto"  >
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="{{route('store.costs', ['project'=>$project])}}">
        @csrf
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="Название">
          Название
        </label>
        <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Название затраты">
      </div>
      <div class="mb-6">
        <label  class="block text-gray-700 text-sm font-bold mb-2" for="Сумма">
          Сумма
        </label>
        <input name="amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Сумма">
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="costs">
          Вид Затрат
        </label>
        <select name="type" class="shadow rounded w-full appearance-none text-gray-700 py-2 px-3 leading-tight focus:outline-none focus:shadow-outline">
            <option value="fixed">Постоянная затрата</option>
            <option value="variable">Переменная затрата</option>
        </select>
      </div>
      <div class="flex items-center justify-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Добавить
        </button>
      </div>
    </form>

  </div>
</x-app-layout>
