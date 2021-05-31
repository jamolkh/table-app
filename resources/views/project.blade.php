<x-app-layout>
    <x-slot name="header">
                {{__('Все затраты')}}
    </x-slot>

    <div class="flex justify-center my-5">
        @if ($costs)
        <x-table :costs="$costs" />
        @endif
    </div>
</x-app-layout>
