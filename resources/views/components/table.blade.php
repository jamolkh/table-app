

        <div class="relative">
            <div class="flex justify-center"><h1 class="text-2xl">{{$header}}</h1></div>

            <table class="shadow-lg bg-white table-fixed">
                <thead>
                <tr>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">{{$header}}</th>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">Плановый показатель</th>
                @for ($i = 1; $i <=$project->term; $i++)
                <th class="bg-blue-100 border text-left px-8 py-4">Месяц {{$i}}</th>
                @endfor
                </tr>
                </thead>
                <tbody>

                    @foreach ($costs as $cost)
                <tr class="">

                <td class="relative border px-8 py-4">
                    <form class="absolute left-0 top-0 " method="POST" action="{{route('delete.costs', ['project' => $project, 'cost' => $cost])}}">
                        @csrf
                        @method('DELETE')
                    <button><i class="fas fa-minus-circle fa-2x absolute left-2 text-red-500 cursor-pointer"></i></button>
                </form><span class = "mx-1">{{$cost->name}}</span></td>
                <td class="border px-2 py-2">{{$cost->amount_format()}} сум</td>
                    @foreach ($cost->month_costs as $month_cost)

                    <td class="border px-2 py-2"> {{$month_cost->amount_format()}} сум</td>
                    @endforeach
                </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-center"><h1 class="ml-5 text-2xl">Всего {{$header}}</h1></h1></div>

            <table class="shadow-lg bg-white table-fixed">
                <thead>
                <tr>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">{{$header}}</th>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">Плановый показатель</th>
                @for ($i = 1; $i <=$project->term; $i++)
                <th class="bg-blue-100 border text-left px-8 py-4">Месяц {{$i}}</th>
                @endfor
                </tr>
                </thead>
                <tbody>
                <tr>
                <td class="border px-8 py-4">{{$header}}</td>

                    @if ($costs->first()->getRawOriginal('type') === 'variable')
                    <td class="border px-2 py-2">{{number_format($project->total_costs()->first()->total_variable_cost)}} сум</td>
                    @else
                    <td class="border px-2 py-2">{{number_format($project->total_costs()->first()->total_fixed_cost)}} сум</td>
                    @endif


                @for ($i = 1; $i <=$project->term; $i++)
                <td class="border px-2 py-2">{{number_format($project->costs()->first()->month_total_variable_cost($costs->first()->getRawOriginal('type'),$i, $project))}} сум</td>
                @endfor
                </tr>

                </tbody>
            </table>
        </div>
        {{--  --}}
