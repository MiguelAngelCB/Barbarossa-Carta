<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-6 h-screen bg-gray-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="accordion-collapse" data-accordion="collapse">
            @foreach ($categories as $index => $category)
    <div class="mb-5">
    <h2 id="accordion-collapse-heading-{{ $index + 1 }}">
        <button type="button" class="bg-red-400 text-black hover:text-black hover:bg-red-200 flex items-center justify-between w-full p-5 font-medium border-2 border-white rounded-t-xl gap-3" data-accordion-target="#accordion-collapse-body-{{ $index + 1 }}" aria-expanded="true" aria-controls="accordion-collapse-body-{{ $index + 1 }}">
            <span><p class="text-lg font-bold">{{ $category->name }}</p>  
                @if ($category->description)
                    <div>
                        <p>{{ $category->description }}</p>
                    </div>
                @endif
            </span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
        </button>
    </h2>
    <div id="accordion-collapse-body-{{ $index + 1 }}" class="hidden p-5 bg-white border-2 border-white" aria-labelledby="accordion-collapse-heading-{{ $index + 1 }}">
        <ul>
            @foreach ($category->dishes as $dishIndex => $dish)
                <li>
                    <strong>
                        <p>{{ $dish->name }}...{{ $dish->price }}</p>
                    </strong>
                    <span>{{ $dish->traduction }}</span>
                    <div class="flex gap-2">
                        @foreach ($dish->allergens as $allergen)
                            <img class="allergen_image" src='{{ asset("storage/allergens/$allergen->icon") }}' />
                        @endforeach
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    </div>
@endforeach

            </div>




        </div>
    </div>
</x-app-layout>

@vite(['resources/css/collapsable.css', 'resources/js/collapsable.js'])
@vite(['resources/css/app.css','resources/js/app.js'])
