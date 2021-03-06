        @extends('layouts.admin')
            @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Add a new user</h3>
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
                        <form role="form" method="POST" action="{{ url('/users') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="firstname">First Name <sup class="text-danger">*</sup></label>
                                <input class="form-control" type="text" name="firstname" id="firstname" placeholder="First Name" required selected>
                            </div>
                            <div class="form-group">
                                <label for="secondname">Second Name</label>
                                <input class="form-control" type="text" name="secondname" id="secondname" placeholder="Second Name">
                            </div>
                            <div class="form-group">
                                <label for="surname">Surname <sup class="text-danger">*</sup></label>
                                <input class="form-control" type="text" name="surname" id="surname" placeholder="Surname" required>
                            </div>
                            <div class="form-group">
                                <label for="role">User Role</label>
                                <select class="form-control" name="role" id="role">
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Add User</button>
                            <button type="reset" class="btn btn-default">Reset Fields</button>
                        </form>
                    </div>

                 </div>
                <!-- /.row (nested) -->

            </div>
                
            <!-- /.panel-body -->
            @endsection