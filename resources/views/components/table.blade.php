<div class="flex flex-col items-center">
    <h1 class="text-4xl justify-items-center"> @if($fixedCosts->contains('type', 'fixed'))Постоянные затраты@endif </h1>
    <div class="flex flex-col ">
        <div class="relative">

            <a class="flex" href="{{route('form')}}">
                <i class="fa fa-plus-circle fa-2x absolute right-0 py-0 cursor-pointer" aria-hidden="true"></i>
            </a>
            <a href="{{route('project.edit', ['project'=>$project])}}">
                <i class="fas fa-edit fa-2x absolute right-10 py-0 cursor-pointer"></i>
            </a>
            <table class="shadow-lg bg-white table-fixed">
                <thead>
                <tr>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/5">Должность</th>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/5">Плановый показатель</th>
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

        <div class="relative">
            <a href="{{route('form')}}">
                <i class="fa fa-plus-circle fa-2x absolute right-0 py-2 cursor-pointer" aria-hidden="true"></i>
            </a>
            <table class="shadow-lg bg-white table-fixed">
                <thead>
                <tr>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/5">Постоянные затраты</th>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/5">Плановый показатель</th>
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
        </div>

    </div>
</div>
