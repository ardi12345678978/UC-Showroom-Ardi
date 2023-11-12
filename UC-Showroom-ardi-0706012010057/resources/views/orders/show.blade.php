@extends('layouts.main')

@section('content')
    <div class="container mt-4 bg-light p-4 rounded">
        <h2 class="mb-4">Detail Pesanan</h2>

        <a href="{{ route('orders.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $order->order_id }}</h5>
                <p class="card-text"><strong>Pelanggan:</strong>
                    {{ $order->customer ? $order->customer->name : 'Customer not found' }}</p>

                @if ($order->customer)
                    <h5 class="card-title mt-4">Detail Pelanggan</h5>
                    <p class="card-text"><strong>Alamat:</strong> {{ $order->customer->address }}</p>
                    <p class="card-text"><strong>Nomor Telepon:</strong> {{ $order->customer->phone_number }}</p>
                    <p class="card-text"><strong>Kartu Identitas:</strong> {{ $order->customer->id_card }}</p>
                @endif

                @if ($order->vehicle)
                    <h5 class="card-title mt-4">Detail Kendaraan</h5>
                    <p><strong>Tipe:</strong> {{ $order->vehicle->type }}</p>
                    <p><strong>Model:</strong> {{ $order->vehicle->model }}</p>
                    <p><strong>Harga:</strong> {{ $order->vehicle->price }}</p>

                    @if ($order->vehicle->type === 'Car' && $order->vehicle->car)
                        <p class="card-text"><strong>Jenis BBM:</strong> {{ $order->vehicle->car->fuel_type }}</p>
                        <p class="card-text"><strong>Ukuran Bagasi:</strong> {{ $order->vehicle->car->trunk_size_car }}</p>
                    @elseif ($order->vehicle->type === 'Motor' && $order->vehicle->motorcycle)
                        <p class="card-text"><strong>Luas Bagasi:</strong>
                            {{ $order->vehicle->motorcycle->trunk_size_motorcycle }}</p>
                        <p class="card-text"><strong>Jenis BBM:</strong>
                            {{ $order->vehicle->motorcycle->fuel_capacity }}</p>
                    @elseif ($order->vehicle->type === 'Truk' && $order->vehicle->truck)
                        <p class="card-text"><strong>Jumlah Roda:</strong> {{ $order->vehicle->truck->wheel_count }}</p>
                        <p class="card-text"><strong>Ukuran Kargo:</strong>
                            {{ $order->vehicle->truck->cargo_area_size }}</p>
                    @endif
                @else
                    <p>Vehicle not found</p>
                @endif

                <a href="{{ route('orders.edit', $order->order_id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('orders.destroy', $order->order_id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
