<x-app-layout>

    <x-slot name="header">
        {{'Добавить Работы'}}
</x-slot>


<div class="w-full max-w-xs container mx-auto"  >
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="{{route('job.store', ['project'=>$project])}}">
        @csrf
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="Название">
          Название
        </label>
        <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Название Проекта">
      </div>
      <div class="mb-6">
        <label  class="block text-gray-700 text-sm font-bold mb-2" for="Сумма">
          Сумма
        </label>
        <input name="amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Плановый Показатель">
      </div>
      <div class="flex items-center justify-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Добавить
        </button>
      </div>
    </form>

  </div>
</x-app-layout>
