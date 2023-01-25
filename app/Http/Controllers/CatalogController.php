<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Catalog\StoreRequest;
use App\Models\Catalog;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogs = Catalog::where('user_id', '=', auth()->id())
            ->orderBy('list_data', 'asc')
                ->get();

        $shops = Shop::all();

        $catalogJoinShop = DB::table('shops')
            ->leftJoin('catalogs', 'shops.catalog_id', '=', 'catalogs.id')
                ->orderBy('list_data', 'asc')
                    ->get();

        $currentDay = date('Y-m-d');
        $lists = [];
        $dateList = [];

        foreach($catalogs as $catalog => $value) {
            
            if($currentDay > $value->list_data) {
               array_push($dateList, $value->list_data);
            } else {
                array_push($lists, $catalogs[$catalog]);
                array_push($dateList, $value->list_data);
            }
        }
      
        return Inertia::render('Catalogs/Index',
         compact('lists', 'catalogs', 'dateList', 'shops', 'catalogJoinShop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->id();
        $lists = Catalog::where('user_id', '=', auth()->id())->select('list_data')->get();

        $dateList = [];
        foreach($lists as $list => $value) {
            array_push($dateList, $value->list_data);
        }
       
        return Inertia::render('Catalogs/Create', compact('user_id', 'dateList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request) 
    {   
        Catalog::create($request->validated());
        $lastList = Catalog::latest()->first();
        $lastListId = $lastList->id;
        
        return redirect()->route('shops.create', $lastListId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalog = Catalog::where('id', '=', $id)->get();
        $shops = Shop::where('catalog_id', '=', $id)->get();
        // if($shops->isEmpty()) {
        //     return redirect()->route('shops.create')->with('message', $id);
        // };

        return Inertia::render('Catalogs/Show', compact('catalog', 'shops'));
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
        $catalog = Catalog::where('id', '=', $id);
        $catalog->delete();

        return redirect()->route('catalogs.index');
    }
}
