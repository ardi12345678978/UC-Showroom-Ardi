@extends('layouts.main')

@section('content')
    <div class="container mt-4 bg-light p-4 rounded">
        <h2 class="mb-4">Formulir Pemesanan</h2>

        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

            <div class="mb-3">
                <label for="customer_id" class="form-label">Pelanggan</label>
                <select name="customer_id" id="customer_id" class="form-select">
                    <option value="" selected disabled>Pilih Pelanggan</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->customer_id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="vehicle_id" class="form-label">Kendaraan</label>
                <select name="vehicle_id" id="vehicle_id" class="form-select">
                    <option value="" selected disabled>Pilih Kendaraan</option>
                    @foreach ($vehicles as $vehicle)
                        <option value="{{ $vehicle->vehicle_id }}">{{ $vehicle->type }} - {{ $vehicle->model }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Buat Pesanan</button>
        </form>
    </div>
@endsection
