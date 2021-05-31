<x-app-layout>
    <x-slot name="header">

        {{ __('Бизнес Планы') }}

    </x-slot>
    <div class="flex justify-end bg-gray-300 px-6 py-6 "><a href="{{route('form1')}}"><i class="fa fa-plus-circle fa-2x cursor-pointer" aria-hidden="true"></i></a></div>
    <!-- Pin to top right corner -->


<div class="min-h-screen bg-gray-300 dark:bg-gray-900 flex flex-col sm:py-12">
    <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 px-4">
      <!-- SMALL CARD ROUNDED -->
      @foreach ($projects as $project )
      <a href="{{route('project.costs.index', ['project'=> $project])}}">
      <x-project-card >
        <x-slot name="name"> {{$project->name}} </x-slot>
        {{$project->term}}
      </x-project-card>
        </a>
      @endforeach

      <!-- END SMALL CARD ROUNDED -->
    </div>
  </div>
</x-app-layout>
