        @extends('layouts.admin')
            @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Dashboard</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- end row -->

            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Access</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr class="odd gradeX">
                                        <td>{{ $user->firstname.' '.$user->surname.' '.substr($user->secondname, 0, 1).'.' }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="center">
                                            @foreach($user->access as $access)
                                                {{ $access->access_name }}
                                            @endforeach
                                        </td>
                                        <td class="center">{{ $user->status }}</td>
                                        <td>Edit</td>
                                        <td>Delete</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
            </div>
                
            <!-- /.panel-body -->
            @endsection