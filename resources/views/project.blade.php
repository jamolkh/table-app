<x-app-layout>
    <x-slot name="header">
                {{__('Все затраты')}}
    </x-slot>

    <div class="flex justify-center my-5 flex-col  text-xs  items-center relative">
        <div class="flex flex-col my-4">
        <a class="flex z-50" href="{{route('cost.create', ['project'=>$project])}}">
            <i class="fa fa-plus-circle fa-2x absolute right-10 py-0 cursor-pointer" aria-hidden="true"></i>
        </a>
        <a class="z-50" href="{{route('project.edit', ['project'=>$project])}}">
            <i class="fas fa-edit fa-2x absolute right-20 py-0 cursor-pointer"></i>
        </a>


        @if ($variableCosts->first())

        <x-table :costs="$variableCosts" :project="$project"  >
            <x-slot name="header">
                Переменные Затраты
            </x-slot>
        </x-table>
        @endif

        <br>
        <br>
        <br>
        <br>
        @if ($fixedCosts->first())
        <x-table :costs="$fixedCosts" :project="$project"  >
            <x-slot name="header">
                Постоянные Затраты
            </x-slot>
        </x-table>
        @endif


        <br>
        <br>
        <br>
        <br>
        <div class="flex justify-center"><h1 class="ml-5 text-2xl">Всего Затрат</h1></div>
        @if ($project->costs()->first())
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
                <td class="border px-2 py-2">{{number_format($project->total_costs()->first()->total_cost)}} сум</td>


                @for ($i = 1; $i <=$project->term; $i++)
                <td class="border px-2 py-2">{{number_format($project->costs()->first()->month_total_cost($i, $project))}} сум</td>
                @endfor
                </tr>

                </tbody>
            </table>
        @endif


        <br>
        <br>
        <br>
        <br>
        <div class="relative">
            <a class="flex z-50" href="{{route('job.create', ['project'=>$project])}}">
                <i class="fa fa-plus-circle fa-2x absolute right-10 py-0 cursor-pointer" aria-hidden="true"></i>
            </a>
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
                    @foreach ($project->jobs as $job)
                <tr>
                <td class="border px-8 py-4">Количество выполненных заказов</td>
                @foreach ($job->month_jobs as $month_job)
                <td class="border px-2 py-2">{{$month_job->job_amount}}</td>
                @endforeach
                </tr>
                @endforeach
                </tbody>
            </table>

        <h1 class="ml-5 text-2xl">Доходы от выручки</h1>
            <table class="shadow-lg bg-white table-fixed">
                <thead>
                <tr>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">Проект</th>
                <th class="bg-blue-100 border text-left px-8 py-4 w-1/12">Плановый показатель</th>
                @for ($i = 1; $i <=$project->term; $i++)
                <th class="bg-blue-100 border text-left px-8 py-4">Месяц {{$i}}</th>
                @endfor
                </tr>
                </thead>
                <tbody>
                    @foreach ($project->jobs as $job)
                <tr>
                <td class="border px-2 py-4">{{$job->name}}</td>
                <td class="border px-2 py-4">{{number_format($job->amount)}} сум</td>
                @foreach ($job->month_jobs as $month_job)
                <td class="border px-2 py-2">{{$month_job->amount}} сум</td>
                @endforeach
                </tr>
                @endforeach
                </tbody>
            </table>


        </div>
        </div>
    </div>
</x-app-layout>
