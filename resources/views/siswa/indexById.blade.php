@extends('layouts.master')

@section('content')

            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                    {{session('sukses')}}
                </div>
            @endif
            <div class="row">
            @foreach($siswa as $siswas)
                <div class="col-6">
                    <h1>Data Siswa {{$siswas->nama_depan}} {{$siswas->nama_belakang}}</h1>
                </div>
            @endforeach   
                
                <table class="table table-hover">
                    <tr>
                        <th>NAMA DEPAN</th>
                        <th>NAMA BELAKANG</th>
                        <th>JENIS KELAMIN</th>
                        <th>AGAMA</th>
                        <th>ALAMAT</th>
                        <th>AKSI</th>
                    </tr>
                    <!-- penamaan $siswa bebas, bisa $siswaz -->
                    @foreach($siswa as $siswa)
                    <tr>
                        <td>{{$siswa->nama_depan}}</td>
                        <td>{{$siswa->nama_belakang}}</td>
                        <td>{{$siswa->jenis_kelamin}}</td>
                        <td>{{$siswa->agama}}</td>
                        <td>{{$siswa->alamat}}</td>
                        <td>
                        <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sn">Edit</a>
                        <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sn">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action="/siswa/create" method="POST">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Depan</label>
                                    <input type="text" name="nama_depan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Belakang</label>
                                    <input type="text" name="nama_belakang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
                                            <option value='L'>Laki-laki</option>
                                            <option value='P'>Perempuan</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Agama</label>
                                    <input type="text" name="agama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                
                            
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                </div>
                            </div>
                        </div>
@endsection                   


