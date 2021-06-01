<x-app-layout>
    <x-slot name="header">
                {{__('Все затраты')}}
    </x-slot>

    <div class="flex justify-center my-5">

        @if ($project)
        <x-table-edit :project="$project"/>
        @endif
        {{-- {{dd($month_costs)}} --}}
    </div>
</x-app-layout>
