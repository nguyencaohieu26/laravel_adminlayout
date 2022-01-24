<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{route('home.index')}}"><img src="{!! asset('admin/assets/images/icon/logo.png') !!}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                             <li class="active"><a href="{{route('home.index')}}">dashboard</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Users</span></a>
                        <ul class="collapse">
                            <li><a href="{{route('accounts.index')}}">List User</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-server"></i><span>Roles</span></a>
                        <ul class="collapse">
                            <li><a href="{{route('roles.index')}}">List Role</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-bookmark"></i><span>Functions</span></a>
                        <ul class="collapse">
                            <li><a href="{{route('functions.index')}}">List Function</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
