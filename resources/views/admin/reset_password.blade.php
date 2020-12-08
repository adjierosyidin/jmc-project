@extends('layouts.app')

@section('title','Reset Password')

@section('content')

    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Reset Password</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Daftar semua member yang aktif</h4>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <button data-toggle="modal" data-target="#daModal{{$user->id}}" class="btn btn-warning btn-sm">Reset</button>
                                </td>
                            </tr>
                            <!-- modal -->
                            <div id="daModal{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title">Reset Password {{$user->username}}?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form method="post" action="{{ url('exec_reset_password', $user ? $user->id : '') }}">
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Email:</label>
                                                    <input type="text" class="form-control" name="email" value="{{$user->email}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Password Baru</label>
                                                    <input type="text" class="form-control" name="password" value="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger waves-effect waves-light">Reset Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Endmodal -->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        

@endsection

@section('styles')
    <style>
        
    </style>
@endsection

@section('scripts')
    <script>
        
    </script>
@endsection