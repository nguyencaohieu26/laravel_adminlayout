@extends('components.admin.adminLayout')
@section('location_page','Update Function')
@section('content')
    <div class="pt-4 px-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form enctype="multipart/form-data" id="user_form" action="{{route('functions.update',['function'=>$function->id])}}" method="POST" class="needs-validation" novalidate="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        {{--  --}}
                        @method('PUT')
                        @include('admin.functions.form')
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_tag')@endsection
