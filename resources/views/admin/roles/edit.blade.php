@extends('components.admin.adminLayout')
@section('location_page','Update Role')
@section('content')
    <div class="pt-4 px-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form enctype="multipart/form-data" id="user_form" action="{{route('roles.update',['role'=>$role->id])}}" method="POST" class="needs-validation" novalidate="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        {{--  --}}
                        @method('PUT')
                        @include('admin.roles.form')
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_tag')@endsection
