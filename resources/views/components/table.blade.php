<div class="flex flex-col items-center">
    <h1 class="text-4xl justify-items-center"> @if($costs->contains('type', 'fixed'))Постоянные затраты@endif </h1>
    <div class="relative flex">
        <i class="fa fa-plus-circle fa-2x absolute right-0 py-2 cursor-pointer" aria-hidden="true"></i>
        <table class="shadow-lg bg-white ">
            <thead>
            <tr>
            <th class="bg-blue-100 border text-left px-8 py-4">Должность</th>
            <th class="bg-blue-100 border text-left px-8 py-4">Плановый показатель</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($costs as $cost)
            <tr>
            <td class="border px-8 py-4">{{$cost->name}}</td>
            <td class="border px-2 py-2">{{$cost->amount}} сум</td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
