@extends('layouts.app')

@section('title','Management User')

@section('content')

    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">User/Admin</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <h4 class="c-grey-900 mB-20">Daftar semua User dan Admin</h4>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Asal</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->kecamatan->kecamatan}}, {{$user->kabupaten->kabupaten}}</td>
                                <td>{{$user->role->nm_role}}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="javascript:void(0)"  data-toggle="modal" data-target="#daModal{{$user->id}}">Ubah</a>
                                </td>
                            </tr>
                            {{-- Modal Edit --}}
                            <div id="daModal{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title">Data Role {{$user->name}}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form method="post" action="{{ url('user_admin', $user ? $user->id : '') }}">
                                        <div class="modal-body">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name" class="control-label">Nama :</label>
                                                <input disabled type="text" value="{{ ($user) ? $user->name : '' }}" class="form-control" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="id_role" class="control-label">Role :</label>
                                                <select name="id_role" class="form-control">
                                                    <option value="">-- Pilih --</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}" {{ ($role->id==$user->id_role) ? 'selected' : '' }}>{{ $role->nm_role }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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