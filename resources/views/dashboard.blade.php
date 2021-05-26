<x-app-layout>

                            <x-slot name="header">

                                {{ __('Analytics') }}

                            </x-slot>


                        {{-- Metrics --}}
                        <div class="flex flex-wrap">
                            <x-metric-card-revenue >
                                {{__('Revenue')}}
                                <x-slot name="value">
                                    10000
                                </x-slot>
                            </x-metric-card-revenue>

                            <x-metric-card-users>
                                {{__('1000')}}
                            </x-metric-card-users>

                            <x-metric-card-todo>
                                {{__('17')}}
                            </x-metric-card-todo>
                        </div>

                        {{-- Charts --}}
                        <div class="flex flex-row flex-wrap flex-grow mt-2">
                            <x-graph-card/>
                        </div>

                    </div>

</x-app-layout>
