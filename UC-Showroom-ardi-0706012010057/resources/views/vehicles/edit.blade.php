@extends('layouts.main')

@section('content')
    <div class="container mt-4 bg-light p-4 rounded">
        <h2 class="mb-4">Formulir Perubahan Kendaraan</h2>

        <form method="POST" action="{{ route('vehicles.update', $vehicle->vehicle_id) }}">
            @csrf
            @method('PUT')

            <!-- Common Vehicle Fields -->
            <div class="mb-3">
                <label for="type" class="form-label">Tipe</label>
                <select name="type" id="type" class="form-select" disabled>
                    <option value="{{ $vehicle->type }}" selected>{{ $vehicle->type }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ $vehicle->model }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Tahun</label>
                <input type="number" class="form-control" id="year" name="year" value="{{ $vehicle->year }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="passenger_count" class="form-label">Jumlah Penumpang</label>
                <input type="number" class="form-control" id="passenger_count" name="passenger_count"
                    value="{{ $vehicle->passenger_count }}" required>
            </div>

            <div class="mb-3">
                <label for="manufacturer" class="form-label">Pabrikan</label>
                <input type="text" class="form-control" id="manufacturer" name="manufacturer"
                    value="{{ $vehicle->manufacturer }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $vehicle->price }}"
                    required>
            </div>

            <!-- Additional Fields Based on Vehicle Type -->
            @if ($vehicle->type === 'Mobil')
                <div class="mb-3">
                    <label for="fuel_type" class="form-label">Tipe BBM</label>
                    <select name="fuel_type" id="fuel_type" class="form-select">
                        <option value="" selected disabled>Pilih Tipe</option>
                        <option value="Gasoline" {{ $vehicle->mobil->fuel_type == 'Gasoline' ? 'selected' : '' }}>Bensin
                        </option>
                        <option value="Diesel" {{ $vehicle->mobil->fuel_type == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                        <option value="Electric" {{ $vehicle->mobil->fuel_type == 'Electric' ? 'selected' : '' }}>Listrik
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="trunk_size_car" class="form-label">Ukuran Bagasi</label>
                    <input type="number" class="form-control" id="trunk_size_car" name="trunk_size_car"
                        value="{{ $vehicle->mobil->trunk_size_car }}" step="0.01">
                </div>
            @elseif($vehicle->type === 'Motor')
                <div class="mb-3">
                    <label for="trunk_size_motorcycle" class="form-label">Ukuran Bagasi</label>
                    <input type="number" class="form-control" id="trunk_size_motorcycle" name="trunk_size_motorcycle"
                        step="0.01" value="{{ $vehicle->motorcycle->trunk_size_motorcycle }}">
                </div>

                <div class="mb-3">
                    <label for="fuel_capacity" class="form-label">Kapasitas Bensin</label>
                    <input type="number" class="form-control" id="fuel_capacity" name="fuel_capacity" step="0.01"
                        value="{{ $vehicle->motorcycle->fuel_capacity }}">
                </div>
            @elseif($vehicle->type === 'Truk')
                <div class="mb-3">
                    <label for="wheel_count" class="form-label">Jumlah Roda</label>
                    <input type="number" class="form-control" id="wheel_count" name="wheel_count"
                        value="{{ $vehicle->truck->wheel_count }}">
                </div>

                <div class="mb-3">
                    <label for="cargo_area_size" class="form-label">Ukuran Kargo</label>
                    <input type="number" class="form-control" id="cargo_area_size" name="cargo_area_size"
                        value="{{ $vehicle->truck->cargo_area_size }}">
                </div>
            @endif

            <button type="submit" class="btn btn-warning">Perbarui Kendaraan</button>
        </form>
    </div>
@endsection
