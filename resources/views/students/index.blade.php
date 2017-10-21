        @extends('layouts.admin')
            @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">All Users</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- end row -->

            <div class="panel-body">
                <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Middlename</th>
                                        <th>Surname</th>
                                        <th>C</th>
                                        <th>Status</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr class="odd gradeX">
                                        <td>{{ $user->firstname.' '.$user->surname.' '.substr($user->secondname, 0, 1).'.' }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="center">
                                            @foreach($user->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        </td>
                                        <td class="center">{{ $user->status }}</td>
                                        <td><a href="{{ url('users/'.$user->id) }}">View</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            {{ $users->links() }}
            </div>
                
            <!-- /.panel-body -->
            @endsection