<x-app-layout>
    <x-slot name="header">

        {{ __('Бизнес Планы') }}

    </x-slot>
    <div class="flex justify-end bg-gray-300 px-6 py-6 cursor-pointer"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></div>
    <!-- Pin to top right corner -->


<div class="min-h-screen bg-gray-300 dark:bg-gray-900 flex flex-col sm:py-12">
    <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 px-4">
      <!-- SMALL CARD ROUNDED -->
      <x-project-card />
      <!-- END SMALL CARD ROUNDED -->
    </div>
  </div>
</x-app-layout>
