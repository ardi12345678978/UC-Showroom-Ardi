@extends('layouts.main')

@section('content')
    <div class="container mt-4 bg-light p-4 rounded">
        <h2 class="mb-4">Formulir Pembuatan Pelanggan</h2>

        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
            </div>

            <div class="mb-3">
                <label for="id_card" class="form-label">Nomor Kartu Identitas</label>
                <input type="text" class="form-control" id="id_card" name="id_card" required>
            </div>

            <button type="submit" class="btn btn-success">Buat Pelanggan</button>
        </form>
    </div>
@endsection
