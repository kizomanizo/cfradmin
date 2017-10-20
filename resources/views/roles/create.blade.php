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
                        <form role="form" method="POST" action="{{ url('/roles') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Role Name <sup class="text-danger">*</sup></label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Role Name" required selected>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input class="form-control" type="text" name="description" id="description" placeholder="Description">
                            </div>
                                <div class="form-group">
                                    <label>Role Level</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="level" id="system" value="1" checked="">System User(1)
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="level" id="management" value="2">Management User(2)
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="level" id="exams" value="3">Exams Office User(3)
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="level" id="academic" value="4">Academic User(4)
                                        </label>
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-default">Add role</button>
                            <button type="reset" class="btn btn-default">Reset Fields</button>
                        </form>
                    </div>

                 </div>
                <!-- /.row (nested) -->

            </div>
                
            <!-- /.panel-body -->
            @endsection