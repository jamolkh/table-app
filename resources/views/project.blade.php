<x-app-layout>
    <x-slot name="header">
                {{__('Все затраты')}}
    </x-slot>

    <div class="flex justify-center my-5">
        @if ($fixedCosts)
        <x-table :fixedCosts="$fixedCosts" :variableCosts="$variableCosts" :project="$project" />
        @endif
        {{-- {{dd($month_costs)}} --}}
    </div>
</x-app-layout>
