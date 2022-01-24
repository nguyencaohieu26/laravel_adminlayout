@extends('components.admin.adminLayout')
{{-- Custom name for location page --}}
@section('location_page','Roles')
{{-- Main content --}}
@section('content')
    <div class="pt-4 px-3">
        <div>
            <div class="pr-3 mb-3 d-flex justify-content-end">
                <a class="btn btn-outline-primary rounded p-2" href="{{route('roles.create')}}">Create Role</a>
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
                                        <th scope="col">Role Code</th>
                                        <th scope="col">Role Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr @foreach($roles as $role)>
                                            <th scope="row">{{$role->id}}</th>
                                            <td>{{$role->Role_Code}}</td>
                                            <td>{{$role->Role_Name}}</td>
                                            <td>{{$role->description}}</td>
                                            <td style="font-size: 13px; font-weight: bold" class="{{($role->status == 1) ? 'text-success' : 'text-danger'}}">{{($role->status == 1) ? 'Active' : 'Inactive'}}</td>
                                            <td>
                                                <a href="#" title="View detail role"><i class="ti-eye text-success"></i></a>
                                                <a href="/admin/roles/{{$role->id}}/edit" title="Edit role"><i class="ti-pencil text-info"></i></a>
                                                <a href="#" onclick="deleteRole({{$role->id}})" title="Delete role"><i class="ti-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if(count($roles) == 0)
                                    <div class="p-4 text-center">
                                        <i class="ti-package" style="font-size: 25px;color: #777"></i>
                                        <p style="font-size: 18px">No roles found!</p>
                                    </div>
                                @endif
                            </div>
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
        function deleteRole(id){
            if(confirm("Are you sure to delete the role?")){
                $.ajax({
                    url:`/admin/roles/${id}`,
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

