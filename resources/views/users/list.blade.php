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
                                        <th>Suspend</th>
                                        <th>Activeness</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr class="odd gradeX">
                                        <td>{{ $user->firstname.' '.$user->surname.' '.substr($user->secondname, 0, 1).'.' }}</td>
                                        <td>{{ $user->status }}</td>
                                        @if (empty($user->deleted_at))
                                            @if ($user->password == '')
                                            <td class="center">
                                                <form method="POST" action="{{ url('users/'.$user->id.'/release') }}">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-success">Release</button>
                                                </form>
                                            </td>
                                            @else
                                            <td class="center">
                                                <form method="POST" action="{{ url('users/'.$user->id.'/suspend') }}">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-warning">Suspend</button>
                                                </form>
                                            </td>
                                            @endif
                                            <td class="center">
                                                <form method="POST" action="{{ url('users/'.$user->id.'/deactivate') }}">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger">Deactivate</button>
                                                </form>
                                            </td>
                                        @else
                                            <td class="center">
                                                <form method="POST" action="{{ url('users/'.$user->id.'/suspend') }}">
                                                    {{ csrf_field() }}
                                                    <fieldset disabled>
                                                    <button type="submit" class="btn btn-success">Release</button>
                                                </form>
                                            </td>
                                            <td class="center">
                                                <form method="POST" action="{{ url('users/'.$user->id.'/recover') }}">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-info">Recover</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                            <!-- /.table-responsive -->
            </div>
                
            <!-- /.panel-body -->
            @endsection