@extends('components.admin.adminLayout')
{{-- Custom name for location page --}}
@section('location_page','Functions')
{{-- Main content --}}
@section('content')
    <div class="pt-4 px-3">
        <div>
            <div class="pr-3 mb-3 d-flex justify-content-end">
                <a class="btn btn-outline-primary rounded p-2" href="{{route('functions.create')}}">Create Function</a>
            </div>
            {{-- Show notification --}}
            <div class="message-test px-3">
                @if (session('create'))
                    <div class="alert alert-success">
                        {{ session('create') }}
                    </div>
                @endif
                @if(session('update'))
                    <div class="alert  alert-success">
                        {{session('update')}}
                    </div>
                @endif
            </div>
            @csrf
            <div class="col-lg-12">
                <div class="card border">
                    <div class="card-body">
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase" style="background: #121d6e">
                                    <tr class="text-white">
                                        <th scope="col">ID</th>
                                        <th scope="col">Func Code</th>
                                        <th scope="col">Func Name</th>
                                        <th scope="col">Func Url</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr @foreach($functions as $func)>
                                              <th scope="row">{{$func->id}}</th>
                                              <td>{{$func->Func_Code}}</td>
                                              <td>{{$func->Func_Name}}</td>
                                              <td>{{$func->Func_Url}}</td>
                                              <td>{{$func->Description}}</td>
                                              <td style="font-size: 13px; font-weight: bold" class="{{($func->status == 1) ? 'text-success' : 'text-danger'}}">{{($func->status == 1) ? 'Active' : 'Inactive' }}</td>
                                              <td>
                                                  <a href="#" title="View detail function"><i class="ti-eye text-success"></i></a>
                                                  <a href="/admin/functions/{{$func->id}}/edit" title="Edit function"><i class="ti-pencil text-info"></i></a>
                                                  <a href="#" onclick="deleteFunction({{$func->id}})" title="Delete Function"><i class="ti-trash text-danger"></i></a>
                                              </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if(count($functions) == 0)
                                    <div class="p-4 text-center">
                                        <i class="ti-package" style="font-size: 25px;color: #777"></i>
                                        <p style="font-size: 18px">No functions found!</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div>
{{--                            {{$functions->links()}}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_tag')
    <script type="text/javascript">
        //function handler delete method
        function deleteFunction(id){
            if(confirm("Are you sure to delete the function?")){
                $.ajax({
                    url:`/admin/functions/${id}`,
                    method:'POST',
                    data:{id:id,_token:$("input[name='_token']").val(),_method:"DELETE"},
                    success:function (result){
                        $('.message-test').addClass('show').html(`
                            <div class="alert alert-success">${result}</div>
                        `);
                        setTimeout(()=>{location.reload();},1000);
                    }
                });
            }
        }
        //function handler show notification
        setTimeout(clearMessage,1000);
        function clearMessage(){
            document.querySelector('.message-test').classList.add('show');
            setTimeout(()=>{document.querySelector('.message-test').classList.remove('show')},2000);
        }
    </script>
@endsection

