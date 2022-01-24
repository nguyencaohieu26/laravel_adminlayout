@extends('components.admin.adminLayout')
@section('location_page','Create User')
@section('content')
    <div class="pt-4 px-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form enctype="multipart/form-data" id="user_form" action="{{route('accounts.store')}}" method="POST" class="needs-validation" novalidate="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        @include('admin.accounts.form')
                        <button class="btn btn-primary" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_tag')
    <script type="text/javascript">
        $(".custom-file-input").on("change", function() {
            let fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
