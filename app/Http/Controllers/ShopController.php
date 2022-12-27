<?php

namespace App\Http\Controllers;

use App\Http\Requests\Shop\ShopStoreRequest;
use App\Models\Catalog;
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
    public function create()
    {
        
        //$shopId = $catalog->latest()->first()->id;

        
        return Inertia::render('Shops/Create');
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

        return redirect()->route('products.create')->with('message', $shopId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
            $shopInList = Shop::where('catalog_id', '=', $id)->get();
           //dd($shopInList);
            if($shopInList->isEmpty()) {
                $message = 'don`t have shops';
                return Inertia::render('Shops/Show', compact('message'));
            }
            
            return Inertia::render('Shops/Show', compact('shopInList'));
        
        //dd($shopInList->toArray());
        

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
