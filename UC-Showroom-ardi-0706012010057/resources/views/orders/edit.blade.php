@extends('layouts.main')

@section('content')
    <div class="container mt-4 bg-light p-4 rounded">
        <h2 class="mb-4">Formulir Perubahan Pesanan</h2>

        <form method="POST" action="{{ route('orders.update', $order->order_id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="customer_id" class="form-label">Pelanggan</label>
                <select name="customer_id" id="customer_id" class="form-select">
                    <option value="" selected disabled>Pilih Pelanggan</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->customer_id }}"
                            {{ $customer->customer_id == $order->customer_id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="vehicle_id" class="form-label">Kendaraan</label>
                <select name="vehicle_id" id="vehicle_id" class="form-select">
                    <option value="" selected disabled>Pilih Kendaraan</option>
                    @foreach ($vehicles as $vehicle)
                        <option value="{{ $vehicle->vehicle_id }}"
                            {{ $vehicle->vehicle_id == $order->vehicle_id ? 'selected' : '' }}>
                            {{ $vehicle->type }} - {{ $vehicle->model }} - {{ $vehicle->price }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Perbarui Pesanan</button>
        </form>
    </div>
@endsection
