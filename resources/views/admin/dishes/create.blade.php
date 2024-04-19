@extends('adminlte::page')
@section('title', 'GUTSUI')

@section('content_header')
    <h1>Create dish</h1>
@stop

@section('content')


    <div class="card">
        <div class="card-body">
            {{ html()->form('POST')->route('admin.dishes.store')->open() }}

            <div class="form-group">
                {{ html()->label('Name')->for('name') }}
                {{ html()->text('name')->class('form-control')->placeholder('Introduce the name of the dish') }}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {{ html()->label('Slug')->for('slug') }}
                {{ html()->text('slug')->class('form-control')->isReadonly() }}
                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {{ html()->label('Traduction')->for('traduction') }}
                {{ html()->text('traduction')->class('form-control')->placeholder('Introduce the traduction of the dish') }}
                @error('traduction')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>


            <div class="form-group">
                {{ html()->label('Price')->for('price') }}
                {{ html()->text('price')->class('form-control')->placeholder('Introduce the price of the dish') }}
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {{ html()->label('Category')->for('category') }}
                {{ html()->select('category_id', $categories, null)->class('form-control') }}
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {{ html()->label('Allergens')->for('allergens') }}
                <br>
                @foreach ($allergens as $allergen)
                <div>
                    {{ html()->checkbox('allergens[]', null)->value($allergen->id,) }}
                    {{ html()->label($allergen->name)->for($allergen->name) }}
                </div>
                @endforeach
                @error('allergens')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{ html()->submit('Create dish')->class('btn btn-primary') }}
            {{ html()->form()->close() }}
        </div>
    </div>
@stop
@vite('resources/js/slug_generator.js')