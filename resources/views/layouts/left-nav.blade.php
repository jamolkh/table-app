@props(['active'])
@php
$classes = ($active ?? false)
            ? 'block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600 hover:border-blue-600'
            : 'block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-blue-600';
@endphp

            <li class="mr-3 flex-1">
                <a {{ $attributes->merge(['class' => $classes]) }}>
                    <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">{{$slot}}</span>
                </a>
            </li>
