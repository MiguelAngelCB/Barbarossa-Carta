@extends('adminlte::page')

@section('title', 'Barbarrosa')

@section('content_header')
	<h1>Edit dish</h1>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
@endif

<div class="card">
    <div class="card-body">
        {{ html()->modelForm($dish, 'PUT')->route('admin.dishes.update',$dish)->open() }}

        <div class="form-group">
            {{ html()->label('Name')->for('name') }}
            {{ html()->text('name')->class('form-control')->placeholder('Introduce the name of the dish') }}
            
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {{ html()->label('Slug')->for('slug')}}
            {{ html()->text('slug')->class('form-control')->isReadonly() }}
            @error('slug')
            <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>

        <div class="form-group">
            {{ html()->label('Traduction')->for('traduction')}}
            {{ html()->text('traduction')->class('form-control')->placeholder('Introduce the traduction of the dish') }}
            @error('traduction')
            <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>


        <div class="form-group">
            {{ html()->label('Price')->for('price')}}
            {{ html()->text('price')->class('form-control')->placeholder('Introduce the price of the dish') }}
            @error('price')
            <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>

        <div class="form-group">
            {{ html()->label('Category')->for('category')}}
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
                    {{ html()->checkbox('allergens[]')->value($allergen->id)->checked(in_array($allergen->id,$dish->getDishAllergensId())) }}
                    {{ html()->label($allergen->name)->for($allergen->name) }}
                </div>
                @endforeach
                @error('allergens')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        {{html()->submit('Update dish')->class('btn btn-primary')}}
        {{ html()->closeModelForm() }}
    </div>
</div>
@stop
@vite('resources/js/slug_generator.js')