@extends('layouts.app')
@section('title', 'Add Barang')
@section('titlecate', 'Barang')
@section('content')
    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        {{-- @method('PUT') --}}
        <div class="form-group mb-3">
            <label for="">User</label>
            <select id="" class="form-control" name="id_user">
                <option value="">Select User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="">Kode Transaksi</label>
            <input type="text" class="form-control" name="kode_transaksi" readonly value="{{$kode_transaksi}}">
        </div>
        <div class="form-group mb-3">
            <label for="">Tanggal Transaksi</label>
            <input type="date" class="form-control" name="tanggal_transaksi">
        </div>
        <br><br>
        <div class="table-transaction">
            <div class="mb-3" align="right">
                <button type="button" class="btn btn-primary btn-sm btn-add"><i class="fas fa-plus"> Add</i></button>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Quantity</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Nominal Bayar</th>
                        <th>Kembalian</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="form-group mb-3">
            <input type="submit" class="btn btn-primary" value="Save">
            <input type="reset" class="btn btn-danger" value="Cancel">
            <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
        </div>
    </form>
@endsection
