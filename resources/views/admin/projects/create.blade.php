@extends('layouts.admin')

@section('page-title', 'New Project')

@section('admin-content')
    <div class="container">

        @include('partials.forms.validation.errors_alert')

        <form method="POST" action="{{ route('admin.projects.store') }}">

            @csrf

            @include(
                'partials.forms.create_form_element',
                $data = ['type' => 'text', 'field' => 'title', 'label' => 'Project title']
            )

            @include(
                'partials.forms.create_form_element',
                $data = ['type' => 'text', 'field' => 'cover_image', 'label' => 'Project cover url']
            )

            @include(
                'partials.forms.create_form_element',
                $data = ['type' => 'textarea', 'field' => 'description', 'label' => 'Description']
            )

            @include(
                'partials.forms.create_form_element',
                $data = ['type' => 'select', 'field' => 'type_id', 'label' => 'Type', 'options' => $types]
            )
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection