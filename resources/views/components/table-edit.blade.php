<div class="flex flex-col items-center text-sm">
    <h1 class="text-4xl justify-items-center"> @if($project->costs->contains('type', 'fixed'))Постоянные затраты@endif </h1>
    <div class="flex flex-col ">
        <div class="relative">
            <form action="{{route('project.update', ['project' => $project])}}" method="POST">
                @csrf
                @method('PUT')
                <table class="shadow-lg bg-white table-fixed text-xs">
                    <thead>
                    <tr>
                    <th class="bg-blue-100 border text-left px-8 py-4 w-1/10">Переменная затрата</th>
                    <th class="bg-blue-100 border text-left px-8 py-4 w-1/10">Плановый показатель</th>
                    @for ($i = 1; $i <=$project->term; $i++)
                    <th class="bg-blue-100 border text-left px-8 py-4">Месяц {{$i}}</th>
                    @endfor
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($project->costs()->where('type', 'variable')->get() as $cost)
                    <tr>
                    <td class="border px-8 py-4">{{$cost->name}}</td>
                    <td class="border px-2 py-2"><input name="cost"   type="text" class="w-3/4 text-xs"  value="{{$cost->amount}}">сум</td>
                        @foreach ($cost->month_costs as $month_cost)
                        <td class="border px-2 py-2"><input  name="month_variable_costs{{$cost->id}}[]" type="text" class="w-3/4 text-xs"  value="{{$month_cost->amount}}">сум</td>
                        @endforeach

                    </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="shadow-lg bg-white table-fixed text-xs my-10">
                    <thead>
                    <tr>
                    <th class="bg-blue-100 border text-left px-8 py-4 w-1/10">Постоянная затрата</th>
                    <th class="bg-blue-100 border text-left px-8 py-4 w-1/10">Плановый показатель</th>
                    @for ($i = 1; $i <=$project->term; $i++)
                    <th class="bg-blue-100 border text-left px-8 py-4">Месяц {{$i}}</th>
                    @endfor
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($project->costs()->where('type', 'fixed')->get() as $cost)
                    <tr>
                    <td class="border px-8 py-4">{{$cost->name}}</td>
                    <td class="border px-2 py-2"><input name="cost"   type="text" class="w-3/4 text-xs"  value="{{$cost->amount}}">сум</td>
                        @foreach ($cost->month_costs as $month_cost)
                        <td class="border px-2 py-2"><input  name="month_fixed_costs{{$cost->id}}[]" type="text" class="w-3/4 text-xs"  value="{{$month_cost->amount}}">сум</td>
                        @endforeach

                    </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="shadow-lg bg-white table-fixed text-xs my-10">
                    <thead>
                    <tr>
                    <th class="bg-blue-100 border text-left px-8 py-4 w-1/10">Обьем Выполненных работ</th>
                    @for ($i = 1; $i <=$project->term; $i++)
                    <th class="bg-blue-100 border text-left px-8 py-4">Месяц {{$i}}</th>
                    @endfor
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($project->jobs as $job)
                    <tr>
                    <td class="border px-8 py-4">Количество выполненных заказов</td>

                        @foreach ($job->month_jobs as $month_job)
                        <td class="border px-2 py-2"><input  name="month_jobs{{$job->id}}[]" type="text" class="w-3/4 text-xs"  value="{{$month_job->job_amount}}">сум</td>
                        @endforeach

                    </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounde my-5" type="submit">Submit</button>
            </form>
        </div>


    </div>
</div>
