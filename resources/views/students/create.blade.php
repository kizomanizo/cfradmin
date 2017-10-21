        @extends('layouts.admin')
            @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Add Students</h3>
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
                        <form role="form" method="POST" action="{{ url('/students') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Course</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="course" id="ba" value="ba" checked="">BA
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="course" id="fr" value="fr">FR
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="course" id="mgt" value="mgt">MGT
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="course" id="it" value="it">IT
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="year">Year</label>
                                <select class="form-control" name="year" id="year">
                                    <option value="1">Certificate</option>
                                    <option value="10">Diploma One</option>
                                    <option value="20">Diploma Two</option>
                                    <option value="100">Bachelor One</option>
                                    <option value="200">Bachelor Two</option>
                                    <option value="300">Bachelor Three</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Excel File</label>
                                <input type="file" name="imported-file" id="imported-file">
                            </div>
                            <button type="submit" class="btn btn-default">Add Students</button>
                            <button type="reset" class="btn btn-default">Reset Fields</button>
                        </form>
                    </div>

                 </div>
                <!-- /.row (nested) -->

            </div>
                
            <!-- /.panel-body -->
            @endsection