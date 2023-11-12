@extends('layouts.main')

@section('content')
    <div class="container mt-4 bg-light p-4 rounded">
        <h2 class="mb-4">Formulir Perubahan Data Pelanggan</h2>

        <form action="{{ route('customers.update', $customer->customer_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" id="address" name="address" required>{{ $customer->address }}</textarea>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number"
                    value="{{ $customer->phone_number }}" required>
            </div>

            <div class="mb-3">
                <label for="id_card" class="form-label">Nomor Kartu Identitas</label>
                <input type="text" class="form-control" id="id_card" name="id_card" value="{{ $customer->id_card }}"
                    required>
            </div>

            <button type="submit" class="btn btn-warning">Perbarui Data Pelanggan</button>
        </form>
    </div>
@endsection
