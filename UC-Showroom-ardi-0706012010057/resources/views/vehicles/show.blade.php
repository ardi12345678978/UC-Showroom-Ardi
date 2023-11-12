@extends('layouts.main')

@section('content')
    <div class="container mt-4 bg-light p-4 rounded">
        <h2 class="mb-4">Detail Kendaraan</h2>

        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $vehicle->vehicle_id }}</h5>
                <p class="card-text"><strong>Tipe:</strong> {{ $vehicle->type }}</p>
                <p class="card-text"><strong>Model:</strong> {{ $vehicle->model }}</p>
                <p class="card-text"><strong>Tahun:</strong> {{ $vehicle->year }}</p>
                <p class="card-text"><strong>Jumlah Penumpang:</strong> {{ $vehicle->passenger_count }}</p>
                <p class="card-text"><strong>Pabrik:</strong> {{ $vehicle->manufacturer }}</p>
                <p class="card-text"><strong>Harga:</strong> {{ $vehicle->price }}</p>

                {{-- Show details based on vehicle type --}}
                @if ($vehicle->type == 'Mobil' && $vehicle->mobil)
                    <p class="card-text"><strong>Jenis BBM:</strong> {{ $vehicle->mobil->fuel_type }}</p>
                    <p class="card-text"><strong>Luas Bagasi:</strong> {{ $vehicle->mobil->trunk_size_car }}</p>
                @elseif ($vehicle->type == 'Motorcycle' && $vehicle->motorcycle)
                    <p class="card-text"><strong>Luas Bagasi:</strong> {{ $vehicle->motorcycle->trunk_size_motorcycle }}</p>
                    <p class="card-text"><strong>Kapasitas Bensin:</strong> {{ $vehicle->motorcycle->fuel_capacity }}</p>
                @elseif ($vehicle->type == 'Truck' && $vehicle->truck)
                    <p class="card-text"><strong>Jumlah Roda:</strong> {{ $vehicle->truck->wheel_count }}</p>
                    <p class="card-text"><strong>Luas Kargo:</strong> {{ $vehicle->truck->cargo_area_size }}</p>
                @endif

                <a href="{{ route('vehicles.edit', $vehicle->vehicle_id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('vehicles.destroy', $vehicle->vehicle_id) }}" method="POST"
                    style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
