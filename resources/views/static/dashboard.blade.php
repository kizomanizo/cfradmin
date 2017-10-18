        @extends('layouts.admin')
            @section('content')
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Dashboard</h3>
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

                You are logged in! Go to the <a href="dashboard">dashboard</a>
            </div>
                
            <!-- /.panel-body -->
            @endsection