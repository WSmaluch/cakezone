<?php

namespace App\Http\Controllers;

use App\Models\OrderProducts;
use App\Models\Orders;
use App\Models\Products as ModelsProducts;
use Illuminate\Http\Request;
use Illuminate\Http\Products;

class OrdersController extends Controller
{
    public function index()
    {
        $models = Orders::where("IsActive","=", true)->get();
        return view("Orders.index", ["models" => $models]);
    }
    public function edit($id)
    {
        $model = Orders::find($id);
        return view("Orders.edit",["model" => $model]);
    }
    public function update($id, Request $request)
{
    $validatedData = $request->validate([
        'customer_name' => 'required',
        'customer_email' => 'required|email',
        'phone_number' => 'required',
        'city' => 'required',
        'street' => 'required',
        'house_number' => 'required',
        'apartment_number' => 'nullable',
        'total' => 'required|numeric|min:0',
    ]);

    $model = Orders::find($id);
    $model->customer_name = $validatedData['customer_name'];
    $model->customer_email = $validatedData['customer_email'];
    $model->total = $request->input("total");
    $model->created_at = $request->input("created_at");
    $model->updated_at = $request->input("updated_at");
    $model->phone_number = $validatedData['phone_number'];
    $model->city = $validatedData['city'];
    $model->street = $validatedData['street'];
    $model->house_number = $validatedData['house_number'];
    $model->apartment_number = $validatedData['apartment_number'];
    $model->IsActive = $request->input("IsActive") ? true : false;
    $model->save();

    return redirect("/Orders");
}

    public function create()
    {
        $model = new Orders();
        $model -> created_at = date("Y-m-d");
        $products = ModelsProducts::all();

        return view("Orders.create", ["model" => $model, "products" => $products]);
    }
    // public function store(Request $request)
    // {
    //     $order = new Orders();
    //     $order->customer_name = $request->input('customer_name');
    //     $order->customer_email = $request->input('customer_email');
        
    //     $order->phone_number = $request->input('phone_number');
    //     $order->city = $request->input('city');
    //     $order->street = $request->input('street');
    //     $order->house_number = $request->input('house_number');
    //     $order->apartment_number = $request->input('apartment_number');
    //     $order->IsActive = true;

    //     $products = $request->input('products');
    //     $quantities = $request->input('quantities');

    //     $productsList = ModelsProducts::all();

    //     $suma=0;

    //     for ($i = 0; $i < count($products); $i++) {
    //         $suma += $productsList[$products[$i]-1]->price * $quantities[$i];
    //     }
    //     $order->total = $suma;

    //     $order->save();
    

    //     for ($i = 0; $i < count($products); $i++) {
    //         $orderProducts = new OrderProducts();
    //         $orderProducts->order_id = $order->id;
    //         $orderProducts->product_id = $products[$i];
    //         $orderProducts->quantity = $quantities[$i];
    //         $orderProducts->IsActive = true;
    //         $orderProducts->save();
    //     }


    //     return redirect('/Orders');
    // }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'phone_number' => 'required',
            'city' => 'required',
            'street' => 'required',
            'house_number' => 'required',
            'apartment_number' => 'nullable',
            'products' => 'required|array',
            'products.*' => 'required|exists:Products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:1',
        ]);

        $order = new Orders();
        $order->customer_name = $validatedData['customer_name'];
        $order->customer_email = $validatedData['customer_email'];
        $order->phone_number = $validatedData['phone_number'];
        $order->city = $validatedData['city'];
        $order->street = $validatedData['street'];
        $order->house_number = $validatedData['house_number'];
        $order->apartment_number = $validatedData['apartment_number'];
        $order->IsActive = true;
    
        $products = $validatedData['products'];
        $quantities = $validatedData['quantities'];
    
        $productsList = ModelsProducts::all();
    
        $suma = 0;
    
        foreach ($products as $index => $productId) {
            $price = $productsList->find($productId)->price;
            $quantity = $quantities[$index];
            $suma += $price * $quantity;
        }
    
        $order->total = $suma;
        $order->save();
    
        foreach ($products as $index => $productId) {
            $orderProducts = new OrderProducts();
            $orderProducts->order_id = $order->id;
            $orderProducts->product_id = $productId;
            $orderProducts->quantity = $quantities[$index];
            $orderProducts->IsActive = true;
            $orderProducts->save();
        }
    
        return redirect('/Orders');
    }
    
    public function details($id)
    {
        $model = Orders::find($id);
        return view("Orders.details",["model" => $model]);
    }
    public function delete($id)
    {
        $model = Orders::find($id);
        $model -> IsActive = false;
        $model -> save();
        return redirect("/Orders");
    }
    
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $models = Orders::where('customer_name', 'LIKE', "%$searchTerm%")
            ->orWhere('customer_email', 'LIKE', "%$searchTerm%")
            ->orWhere('phone_number', 'LIKE', "%$searchTerm%")
            ->orWhere('city', 'LIKE', "%$searchTerm%")
            ->orWhere('street', 'LIKE', "%$searchTerm%")
            ->orWhere('house_number', 'LIKE', "%$searchTerm%")
            ->orWhere('apartment_number', 'LIKE', "%$searchTerm%")
            ->where('IsActive', true)
            ->get();

        return view("Orders.index", ["models" => $models]);
    }

}
