@extends('components.admin.adminLayout')
{{-- Custom name for location page --}}
@section('location_page','Users')
{{-- Main content --}}
@section('content')
    <div class="pt-4 px-3">
        <div>
            <div class="pr-3 mb-3 d-flex justify-content-end">
                <a class="btn btn-outline-primary rounded p-2" href="{{route('accounts.create')}}">Create User</a>
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
                                        <th scope="col">FullName</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr @foreach($accounts as $account)>
                                            <th scope="row">{{$account->id}}</th>
                                            <td>{{$account->fullname}}</td>
                                            <td>{{$account->address}}</td>
                                            <td>{{$account->email}}</td>
                                            <td>{{$account->phone}}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#staticBackdrop" title="Add Role"><i class="ti-plus text-success"></i></a>
                                                <a href="/admin/accounts/{{$account->id}}/edit" title="Edit user"><i class="ti-pencil text-info"></i></a>
                                                <a href="#" onclick="deleteUser({{$account->id}})" title="Delete user"><i class="ti-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Add Role User</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('user_role.store')}}">
                                                            @csrf
                                                            <label for="user_role">Select Role</label>
                                                            <input style="display: none" name="user_id" value="{{$account->id}}"/>
                                                            <select class="custom-select" multiple name="user_role" id="user_role">
                                                                @foreach($roles as $role)
                                                                    <option class="option_style" value="{{$role->id}}">{{$role->Role_Name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="mt-3">
                                                                <button class="btn_submit">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                    @if(count($accounts) == 0)
                                        <div class="p-4 text-center">
                                            <i class="ti-package" style="font-size: 25px;color: #777"></i>
                                           <p style="font-size: 18px">No users found!</p>
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
        //function handler delete user
        function deleteUser(id){
            if(confirm("Are you sure to delete the user?")){
                $.ajax({
                    url:`/admin/accounts/${id}`,
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

