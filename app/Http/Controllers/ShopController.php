<?php

namespace App\Http\Controllers;

use App\Http\Requests\Shop\ShopStoreRequest;
use App\Models\Catalog;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::all();
        return Inertia::render('Shops/Index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $shopId = $id;

        return Inertia::render('Shops/Create', compact('shopId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopStoreRequest $request)
    {
        Shop::create($request->validated());
        $shopId = Shop::latest()->first()->id;

        return redirect()->route('products.create', $shopId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::where('id', '=', $id)->first();
        // dd($shop);
        $list = Catalog::where('id', '=', $shop->catalog_id)->get();
        $products = Product::where('shop_id', '=', $id)->get();
            
        return Inertia::render('Shops/Show', compact('shop', 'products', 'list'));
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
    public function destroy($id)
    {
        //
    }
}
