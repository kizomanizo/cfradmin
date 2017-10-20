        @extends('layouts.admin')
            @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">User Activation</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- end row -->

            <div class="panel-body">
                <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr class="odd gradeX">
                                        <td>{{ $user->firstname.' '.$user->surname.' '.substr($user->secondname, 0, 1).'.' }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td class="center">
                                            <form method="POST" action="{{ url('users/'.$user->id.'/purge') }}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">Permanent Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                            <!-- /.table-responsive -->
            </div>
                
            <!-- /.panel-body -->
            @endsection