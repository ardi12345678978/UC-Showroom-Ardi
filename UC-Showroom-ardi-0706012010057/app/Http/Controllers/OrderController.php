<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Displays a list of all orders.
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Gets all customers and vehicles from the database.
        $customers = Customer::all();
        $vehicles = Vehicle::all();

        // Displays the form for creating a new order.
        return view('orders.create', compact('customers', 'vehicles'));
    }

    /**
     * Store a newly created order in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validates and stores a newly created order in the database.
        $request->validate([
            'customer_id' => 'required',
            'vehicle_id' => 'required',
        ]);

        // Creates a new order using the request data.
        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    /**
     * Display the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function edit(Order $order)
    {
        // Gets all customers and vehicles from the database.
        $customers = Customer::all();
        $vehicles = Vehicle::all();

        // Displays the form for editing the specified order.
        return view('orders.edit', compact('order', 'customers', 'vehicles'));
    }

    /**
     * Update the specified order in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Order $order)
    {
        // Validates order in the database.
        $request->validate([
            'customer_id' => 'required',
            'vehicle_id' => 'required',
        ]);

        // Updates the specified order in the database.
        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified order from the database.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Order $order)
    {
        // Deletes the specified order from the database.
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
}
