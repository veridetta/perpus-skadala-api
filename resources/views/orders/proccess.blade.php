@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Daftar Pinjam Buku Berlangsung') }}</div>

                <div class="card-body">
                     
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="row mt-2 mb-5">
                        <div class="col-lg-12 margin-tb">
                            <div class="float-right">
                                <a class="btn btn-success" href="{{ route('orders.create') }}">Tambah Order</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th width="20px" class="text-center">No</th>
                            <th>User</th>
                            <th>Buku</th>
                            <th>Waktu Booking</th>
                            <th>Waktu Pengembalian</th>
                            <th>Dibuat</th>
                            <th>Status</th>
                            <th width="280px"class="text-center">Action</th>
                        </tr>
                        @foreach ($orders as $order)
                        <tr>
                            <td class="text-center">{{ ++$i }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->book->title }}</td>
                            <td>{{ $order->tanggal }} - {{ $order->jam }}</td>
                            <td>{{ $order->tanggal_pengembalian }}</td>
                            <td>{{ $order->book->created_at }}</td>
                            <td>{{ $order->status }}</td>
                            <td class="text-center ">
                                <div class="row justify-content-center">
                                    <form action="{{ route('orders.update',$order->id) }}" method="POST" style="display:inherit;">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="Selesai" name="status"/>
                                        <input type="hidden" value="{{ $order->user_id }}" name="user_id"/>
                                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin ingin menyelesaikan data ini?')">Selesai</button>
                                    </form>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <form action="{{ route('orders.ReminderNotif',$order->id) }}" method="POST"style="display:inherit;">
                                        @csrf
                                        <input type="hidden" value="Remainder" name="status"/>
                                        <input type="hidden" value="{{ $order->user_id }}" name="user_id"/>
                                        <input type="hidden" value="Waktu Pinjammu Hampir Habis" name="title">
                                        <input type="hidden" value="Jika melebihi waktu yang ditentukan, kamu harus membayar denda sebesar Rp. 5000 per buku" name="message">
                                        <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengirim notifikasi?')">Ingatkan</button>
                                </div>
                                
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    {!! $orders ?? ''->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection