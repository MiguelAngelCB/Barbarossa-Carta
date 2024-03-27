<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <div class="py-6 h-screen bg-bisque">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($categories as $category)
                <div class="py-1">
                    <div class="collapsible">
                        <div class="collapsible-title">
                            <p class="text-lg font-bold">{{ $category->name }}</p><i class='fas fa-angle-down arrow'></i>
                        </div>
                        @if ($category->description)
                            <div>
                                <p class="text-lg font-bold">{{ $category->description }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="collapsible-content hidden">
                        <ul>
                            @foreach ($category->dishes as $dishes)
                                <li>
                                    <strong>
                                        <p>{{ $dishes->name }}...{{ $dishes->price }}</p>
                                    </strong>
                                    <span>{{ $dishes->traduction }}</span>
                                    <div class="flex">
                                        @foreach ($dishes->allergens as $allergen)
                                            <img class="allergen_image"
                                                src='{{ asset("storage/allergens/$allergen->icon") }}' />
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
</x-app-layout>

@vite(['resources/css/collapsable.css', 'resources/js/collapsable.js'])
