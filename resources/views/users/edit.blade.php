        @extends('layouts.admin')
            @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Edit {{$user->firstname.' '.$user->surname}} Details</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- end row -->

            <div class="panel-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="row">
                    <div class="col-lg-6 col-offset-2">
                        <form role="form" method="post" action="{{ url('/users/'.$user->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input class="form-control" type="text" name="firstname" id="firstname" value="{{ $user->firstname }}">
                            </div>
                            <div class="form-group">
                                <label for="secondname">Second Name</label>
                                <input class="form-control" type="text" name="secondname" id="secondname" value="{{ $user->secondname }}">
                            </div>
                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input class="form-control" type="text" name="surname" id="surname" value="{{ $user->surname }}">
                            </div>
                            <div class="form-group">
                                <fieldset disabled>
                                    <label for="disabledSelect">Email</label>
                                    <input class="form-control" id="disabledInput" type="text" value="{{ $user->email }}">
                                    
                            </div>
                            <div class="form-group">
                                <label>User Role</label>
                                <select class="form-control" name="role" id="role">
                                    @foreach($user->roles as $role)
                                        <option value="{{$role->id}}" selected="">{{ $role->name }}</option>
                                    @endforeach
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Edit User</button>
                            <button type="reset" class="btn btn-default">Reset Fields</button>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->

                 </div>
                <!-- /.row (nested) -->

            </div>
                
            <!-- /.panel-body -->
            @endsection