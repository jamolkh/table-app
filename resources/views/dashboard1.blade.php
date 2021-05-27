<x-app-layout>
    <x-slot name="header">

            {{ __('Dashboard') }}

    </x-slot>
    <div class="">
        <table class="shadow-lg bg-white">
            <thead>
            <tr>
            <th class="bg-blue-100 border text-left px-8 py-4">Должность</th>
            <th class="bg-blue-100 border text-left px-8 py-4">Плановый показатель</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($variableCosts as $variableCost)
            <tr>
            <td class="border px-8 py-4">{{$variableCost->name}}</td>
            <td class="border px-2 py-2">{{$variableCost->amount}} сум</td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
