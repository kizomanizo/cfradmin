        @extends('layouts.admin')
            @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">{{ $role->name }} Details</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- end row -->

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <table class="table">
                            <tr>
                                <td><strong>ID</strong></td>
                                <td>{{ $role->id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Role</strong></td>
                                <td>{{ $role->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td>{{ $role->description }}</td>
                            </tr>
                            <tr>
                                <td><strong>Level</strong></td>
                                <td>{{ $role->level }}</td>
                            </tr>
                            <tr>
                                <td><strong>Created</strong></td>
                                <td>{{ $role->created_at->format('d - M, Y') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Updated</strong></td>
                                <td>{{ $role->updated_at->format('d - M, Y') }}</td>
                            </tr>
                            <tr>
                                <td><a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-info" role="link">Edit Role</a></td>
                                <form method="post" action="{{ url('/roles/'.$role->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <td>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </td>
                                </form>
                            </tr>
                        </table>                        
                    </div>
                </div>
            </div>     
            <!-- /.panel-body -->
            @endsection