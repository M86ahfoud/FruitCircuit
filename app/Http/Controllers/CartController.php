<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        $cart = session('cart', []); 

        $cart['items'][$product->id] = [
            'name' => $product->nom,
            'price' => $product->prix - $product->prix * $product->promotion /100,
            'image' => $product->image,
            'formated_price' => $product->promotion(),
            'quantity' => (int) request('quantity'),
        ];

        $cart['total'] = 0;
        $cart['delivry'] = 6.90;
        foreach ($cart['items'] as $item) {
            $cart ['total'] += $item['price'] * $item ['quantity'];
        } 

        session(['cart => $cart']);

        return redirect ('/panier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($i)
    {
        //
    }
}
