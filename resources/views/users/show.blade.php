        @extends('layouts.admin')
            @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">{{ $user->firstname.' '.$user->surname }} Details</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- end row -->

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <table class="table">
                            <tr>
                                <td><strong>First Name</strong></td>
                                <td>{{ $user->firstname }}</td>
                            </tr>
                            <tr>
                                <td><strong>Middle Name</strong></td>
                                <td>{{ $user->secondname }}</td>
                            </tr>
                            <tr>
                                <td><strong>Last Name</strong></td>
                                <td>{{ $user->surname }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Username</strong></td>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <td><strong>Password</strong></td>
                                @if($user->status == 0)
                                    <td>NOT CHANGED</td>
                                @else
                                    <td>CHANGED</td>
                                @endif
                            </tr>
                            <tr>
                                <td><a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-info" role="link">Edit User</a></td>
                                <form method="post" action="{{ url('/users/'.$user->id) }}">
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