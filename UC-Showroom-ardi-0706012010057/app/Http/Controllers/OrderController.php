<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar semua pesanan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Menampilkan daftar semua pesanan.
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Menampilkan formulir untuk membuat pesanan baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Mengambil semua data pelanggan dan kendaraan dari database.
        $customers = Customer::all();
        $vehicles = Vehicle::all();

        // Menampilkan formulir untuk membuat pesanan baru.
        return view('orders.create', compact('customers', 'vehicles'));
    }

    /**
     * Menyimpan pesanan baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Melakukan validasi dan menyimpan pesanan baru ke dalam database.
        $request->validate([
            'customer_id' => 'required',
            'vehicle_id' => 'required',
        ]);

        // Membuat pesanan baru menggunakan data permintaan.
        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat');
    }

    /**
     * Menampilkan pesanan tertentu.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Menampilkan formulir untuk mengedit pesanan tertentu.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function edit(Order $order)
    {
        // Mengambil semua data pelanggan dan kendaraan dari database.
        $customers = Customer::all();
        $vehicles = Vehicle::all();

        // Menampilkan formulir untuk mengedit pesanan tertentu.
        return view('orders.edit', compact('order', 'customers', 'vehicles'));
    }

    /**
     * Memperbarui pesanan tertentu di dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Order $order)
    {
        // Melakukan validasi pesanan di dalam database.
        $request->validate([
            'customer_id' => 'required',
            'vehicle_id' => 'required',
        ]);

        // Memperbarui pesanan tertentu di dalam database.
        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil diperbarui');
    }

    /**
     * Menghapus pesanan tertentu dari database.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Order $order)
    {
        // Menghapus pesanan tertentu dari database.
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus');
    }
}
