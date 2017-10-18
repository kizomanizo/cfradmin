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
                                <label>User Access</label>
                                <select class="form-control" name="access" id="access">
                                    @foreach($accesses as $access)
                                    <option value="{{ $access->id }}">{{ $access->access_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Add User</button>
                            <button type="reset" class="btn btn-default">Reset Fields</button>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <!--div class="col-lg-6">
                        <h1>Disabled Form States</h1>
                        <form role="form">
                            <fieldset disabled>
                                <div class="form-group">
                                    <label for="disabledSelect">Disabled input</label>
                                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="disabledSelect">Disabled select menu</label>
                                    <select id="disabledSelect" class="form-control">
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">Disabled Checkbox
                                    </label>
                                </div>
                        </form>
                    </div>-->
                    <!-- /.col-lg-6 (nested) -->
                 </div>
                <!-- /.row (nested) -->

            </div>
                
            <!-- /.panel-body -->
            @endsection