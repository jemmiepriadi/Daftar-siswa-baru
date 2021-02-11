@extends('layouts.master')

@section('content')

        <h1>Edit Data Siswa</h1>
            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                    {{session('sukses')}}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <form action="/siswa/{{$editSiswa->id}}/update" method="POST">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Depan</label>
                                        <input type="text" name="nama_depan" class="form-control" id="exampleInputEmail1" value="{{ $editSiswa->nama_depan }}"aria-describedby="emailHelp" placeholder="Nama Depan">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Belakang</label>
                                        <input type="text" name="nama_belakang" class="form-control" id="exampleInputEmail1" value="{{ $editSiswa->nama_belakang }}" aria-describedby="emailHelp" placeholder="Nama Belakang">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
                                                <option value='L' @if($editSiswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                                <option value='P' @if($editSiswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Agama</label>
                                        <input type="text" name="agama" class="form-control" value="{{ $editSiswa->agama }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{ $editSiswa->alamat }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
                                
                                    
                                
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        
                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection                    


