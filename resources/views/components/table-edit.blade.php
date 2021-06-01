<div class="flex flex-col items-center">
    <h1 class="text-4xl justify-items-center"> @if($project->costs->contains('type', 'fixed'))Постоянные затраты@endif </h1>
    <div class="flex flex-col ">
        <div class="relative">
            <a class="flex" href="{{route('form')}}">
                <i class="fa fa-plus-circle fa-2x absolute right-0 py-0 cursor-pointer" aria-hidden="true"></i>
                <i class="fas fa-edit fa-2x absolute right-10 py-0 cursor-pointer"></i>
            </a>
            <form action="{{route('project.update', ['project' => $project])}}" method="POST">
                @csrf
                @method('PUT')
                <table class="shadow-lg bg-white table-fixed">
                    <thead>
                    <tr>
                    <th class="bg-blue-100 border text-left px-8 py-4 w-1/10">Должность</th>
                    <th class="bg-blue-100 border text-left px-8 py-4 w-1/10">Плановый показатель</th>
                    @for ($i = 1; $i <=$project->term; $i++)
                    <th class="bg-blue-100 border text-left px-8 py-4">Месяц {{$i}}</th>
                    @endfor
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($project->costs as $cost)
                    <tr>
                    <td class="border px-8 py-4">{{$cost->name}}</td>
                    <td class="border px-2 py-2"><input name="cost" type="text" class="w-1/2"  value="{{$cost->amount}}">сум</td>
                        @foreach ($cost->month_costs as $month_cost)
                        <td class="border px-2 py-2"><input name="month_fixed_costs[]" type="text" class="w-1/2"  value="{{$month_cost->amount}}">сум</td>
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
