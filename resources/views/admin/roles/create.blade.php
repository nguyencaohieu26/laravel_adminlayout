@extends('components.admin.adminLayout')
@section('location_page','Create Role')
@section('content')
    <div class="pt-4 px-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form enctype="multipart/form-data" id="user_form" action="{{route('roles.store')}}" method="POST" class="needs-validation" novalidate="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        @include('admin.roles.form')
                        <button class="btn btn-primary" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_tag')@endsection
