<div class="flex flex-col items-center text-xs">
    <h1 class="text-4xl justify-items-center"> @if($project->costs->contains('type', 'fixed'))Постоянные затраты@endif </h1>
    <div class="flex flex-col ">
        <div class="relative">

            <a class="flex" href="{{route('cost.create', ['project'=>$project])}}">
                <i class="fa fa-plus-circle fa-2x absolute right-0 py-0 cursor-pointer" aria-hidden="true"></i>
            </a>
            <a href="{{route('project.edit', ['project'=>$project])}}">
                <i class="fas fa-edit fa-2x absolute right-10 py-0 cursor-pointer"></i>
            </a>
            <table class="shadow-lg bg-white table-fixed">
                <thead>
                <tr>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">Переменные Затраты</th>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">Плановый показатель</th>
                @for ($i = 1; $i <=$project->term; $i++)
                <th class="bg-blue-100 border text-left px-8 py-4">Месяц {{$i}}</th>
                @endfor
                </tr>
                </thead>
                <tbody>

                    @foreach ($variableCosts as $cost)
                <tr>
                <td class="border px-8 py-4">{{$cost->name}}</td>
                <td class="border px-2 py-2">{{$cost->amount}} сум</td>
                    @foreach ($cost->month_costs as $month_cost)
                    <td class="border px-2 py-2"> {{$month_cost->amount}} сум</td>
                    @endforeach

                </tr>
                    @endforeach
                </tbody>
            </table>

            <h1 class="ml-5 text-5xl">Всего</h1>
            <table class="shadow-lg bg-white table-fixed">
                <thead>
                <tr>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">Переменные Затраты</th>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">Плановый показатель</th>
                @for ($i = 1; $i <=$project->term; $i++)
                <th class="bg-blue-100 border text-left px-8 py-4">Месяц {{$i}}</th>
                @endfor
                </tr>
                </thead>
                <tbody>
                    @php
                        $month_cost_sum = \App\Models\MonthCost::all()
                    @endphp
                    {{dd(\App\Models\Cost::where('type', 'variable')->pluck('id'))}}
                <tr>
                <td class="border px-8 py-4">Переменные Затраты</td>
                <td class="border px-2 py-2">{{$variableCosts->sum('amount')}} сум</td>
                @for ($i = 1; $i <=$project->term; $i++)
                <td class="border px-2 py-2">{{$month_cost_sum->where('month_order', $i)->sum('amount')}}</td>
                @endfor
                </tr>

                </tbody>
            </table>
        </div>

        <div class="relative">
            <a href="{{route('form')}}">
                <i class="fa fa-plus-circle fa-2x absolute right-0 py-2 cursor-pointer" aria-hidden="true"></i>
            </a>
            <table class="shadow-lg bg-white table-fixed">
                <thead>
                <tr>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">Постоянные затраты</th>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">Плановый показатель</th>
                @for ($i = 1; $i <=$project->term; $i++)
                <th class="bg-blue-100 border text-left px-8 py-4">Месяц {{$i}}</th>
                @endfor
                </tr>
                </thead>
                <tbody>

                    @foreach ($fixedCosts as $cost)
                <tr>
                <td class="border px-8 py-4">{{$cost->name}}</td>
                <td class="border px-2 py-2">{{$cost->amount}} сум</td>
                    @foreach ($cost->month_costs as $month_cost)
                    <td class="border px-2 py-2"> {{$month_cost->amount}} сум</td>
                    @endforeach

                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
