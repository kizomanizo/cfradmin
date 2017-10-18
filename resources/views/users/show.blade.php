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
                <p>First Name : <span class="text-primary">{{ $user->firstname }}</span></p>
                <p>Middle Name : <span class="text-primary">{{ $user->secondname }}</span></p>
                <p>Surname : <span class="text-primary">{{ $user->surname }}</span></p>
                <hr>
                <p>Username: {{ $user->username }}</p>
                <p>Email: {{ $user->email }}</p>
                @if($user->status == 0)
                    <p>Password change: NO</p>
                @else
                    <p>Password change: YES</p>
                @endif

            </div>
                
            <!-- /.panel-body -->
            @endsection