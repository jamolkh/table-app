<x-app-layout>
    <x-slot name="header">
                {{$costs->first()->type}}
    </x-slot>

    <div class="flex justify-center my-5">
        <x-table :costs="$costs" />

    </div>
</x-app-layout>
