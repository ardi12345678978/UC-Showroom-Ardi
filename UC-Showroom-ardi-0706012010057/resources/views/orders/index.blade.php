@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h2>Pesanan</h2>

        <a href="{{ route('orders.create') }}" class="btn btn-success float-right mb-3">Buat Pesanan </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tipe Kendaraan</th>
                    <th>Model Kendaraan</th>
                    <th>Harga</th>
                    <th>CRUD</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>
                            @if ($order->customer)
                                {{ $order->customer->name }}
                            @else
                                Tidak ada pelanggan
                            @endif
                        </td>
                        <td>
                            @if ($order->vehicle)
                                {{ $order->vehicle->type }}
                            @else
                                kendaraan tidak ditemukan
                            @endif
                        </td>
                        <td>
                            @if ($order->vehicle)
                                {{ $order->vehicle->model }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if ($order->vehicle)
                                {{ $order->vehicle->price }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('orders.show', $order->order_id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('orders.edit', $order->order_id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('orders.destroy', $order->order_id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah benar delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
