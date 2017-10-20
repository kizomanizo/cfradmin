        @extends('layouts.user')
            @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Howdy Regular User</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- end row -->

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in as a regular user! Go to the <a href="dashboard">dashboard</a>
            </div>
                
            <!-- /.panel-body -->
            @endsection