        @extends('layouts.admin')
            @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Admin Dashboard</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- end row -->

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Users
                        </div>
                        <div class="panel-body">
                            <ul>
                                <li><a href="{{ url('/users/create') }}">Add a new User</a></li>
                                <li><a href="{{ url('/users') }}">List Users</a></li>
                                <li><a href="{{ url('/users/list') }}">Activate Users</a></li>
                                <li><a href="{{ url('/users/delete') }}">Delete Users</a></li>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            Users
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Roles
                        </div>
                        <div class="panel-body">
                            <ul>
                                <li><a href="{{ url('/roles/create') }}">Add a new role</a></li>
                                <li><a href="{{ url('/roles') }}">List roles</a></li>
                                <li><a href="{{ url('/roles/deleted') }}">Recover deleted roles</a></li>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            Roles
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->

            </div>
                
            <!-- /.panel-body -->
            @endsection