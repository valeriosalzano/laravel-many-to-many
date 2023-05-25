@extends('layouts.admin')

@section('page-title', 'New Techonology')

@section('admin-content')
    <div class="container">

        @include('partials.forms.validation.errors_alert')

        <form method="POST" action="{{ route('admin.technologies.store') }}">

            @csrf

            @include(
                'partials.forms.create_form_element',
                $data = ['type' => 'text', 'field' => 'name', 'label' => 'techonology name']
            )

            @include(
                'partials.forms.create_form_element',
                $data = ['type' => 'textarea', 'field' => 'description', 'label' => 'Description']
            )

            <button techonology="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection