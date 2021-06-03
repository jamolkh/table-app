<x-app-layout>
    <x-slot name="header">
                {{__('Все затраты')}}
    </x-slot>

    <div class="flex justify-center my-5 flex-col  text-xs  items-center relative">

        <a class="flex z-50" href="{{route('cost.create', ['project'=>$project])}}">
            <i class="fa fa-plus-circle fa-2x absolute right-0 py-0 cursor-pointer" aria-hidden="true"></i>
        </a>
        <a class="z-50" href="{{route('project.edit', ['project'=>$project])}}">
            <i class="fas fa-edit fa-2x absolute right-10 py-0 cursor-pointer"></i>
        </a>


        @if ($variableCosts->first())

        <x-table :costs="$variableCosts" :project="$project"  >
            <x-slot name="header">
                Переменные Затраты
            </x-slot>
        </x-table>
        @endif
        @if ($fixedCosts->first())
        <x-table :costs="$fixedCosts" :project="$project"  >
            <x-slot name="header">
                Постоянные Затраты
            </x-slot>
        </x-table>
        @endif
        <h1 class="ml-5 text-2xl">Всего Затрат</h1>
            <table class="shadow-lg bg-white table-fixed">
                <thead>
                <tr>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">Постоянные Затраты</th>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">Плановый показатель</th>
                @for ($i = 1; $i <=$project->term; $i++)
                <th class="bg-blue-100 border text-left px-8 py-4">Месяц {{$i}}</th>
                @endfor
                </tr>
                </thead>
                <tbody>

                <tr>


                <td class="border px-8 py-4">Постоянные Затраты</td>
                <td class="border px-2 py-2">{{$fixedCosts->sum('amount') + $variableCosts->sum('amount')}} сум</td>
                @for ($i = 1; $i <=$project->term; $i++)
                <td class="border px-2 py-2">{{\App\Models\MonthCost::all()->where('month_order', $i)->sum('amount')}}</td>
                @endfor
                </tr>

                </tbody>
        </table>

        <h1 class="ml-5 text-2xl">Обьем выполненных работ</h1>
            <table class="shadow-lg bg-white table-fixed">
                <thead>
                <tr>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">Количество выполненных заказов</th>
                @for ($i = 1; $i <=$project->term; $i++)
                <th class="bg-blue-100 border text-left px-8 py-4">Месяц {{$i}}</th>
                @endfor
                </tr>
                </thead>
                <tbody>

                <tr>


                <td class="border px-8 py-4">Количество выполненных заказов</td>
                <td class="border px-2 py-2">{{$fixedCosts->sum('amount') + $variableCosts->sum('amount')}} сум</td>
                @for ($i = 1; $i <=$project->term; $i++)
                <td class="border px-2 py-2">{{\App\Models\MonthCost::all()->where('month_order', $i)->sum('amount')}}</td>
                @endfor
                </tr>

                </tbody>
        </table>




    </div>
</x-app-layout>
