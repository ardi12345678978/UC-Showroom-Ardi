@extends('layouts.main')

@section('content')
    <div class="container mt-4 bg-light p-4 rounded">
        <h2 class="mb-4">Detail Pelanggan</h2>

        <div>
            <p><strong>Nama Pelanggan:</strong> {{ $customer->name }}</p>
            <p><strong>Alamat:</strong> {{ $customer->address }}</p>
            <p><strong>Nomor Telepon:</strong> {{ $customer->phone_number }}</p>
            <p><strong>Nomor Kartu Identitas:</strong> {{ $customer->id_card }}</p>
        </div>

        <div class="mt-3">
            <a href="{{ route('customers.edit', $customer->customer_id) }}" class="btn btn-warning">Ubah</a>

            <form action="{{ route('customers.destroy', $customer->customer_id) }}" method="POST"
                style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
            </form>
        </div>
    </div>
@endsection
