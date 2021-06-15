@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Notif Manager') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                     
                    <form action="{{ route('orders.notif') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Pilih Pengguna:</strong>
                                    <select name="user_id" class="form-control">
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id}}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Judul Notif</strong>
                                    <input type="text"  name="title" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Isi Notif</strong>
                                    <textarea  name="message" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Kirim Notifikasi</button>
                            </div>
                        </div>
                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
