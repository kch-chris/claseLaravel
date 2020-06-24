<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryEntry;
use App\Models\InventoryEntryDet;
use App\Models\Products;
use DB;

class InventoryEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = InventoryEntry::withTrashed()->where('estatus','=',1)->with('details')->get();
        //dd($entries[0]->details);

        return view('inventory.entry.index')->with('entries',$entries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Products::all();
        return view('inventory.entry.create')->with('productos',$products);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $newEntry= new InventoryEntry();
            $newEntry->description=$request->post('description');
            $newEntry->estatus= 1;

            $newEntry->save();

            $entryID = $newEntry->inventory_entryID;

            $details=$request->post('details');
            foreach($details as $detail)
            {
                $newEntryDet = new InventoryEntryDet();
                
                $newEntryDet->inventory_entryID= $entryID;
                $newEntryDet->productsID= $detail["id"];
                $newEntryDet->quantity= $detail["quantity"];

                $newEntryDet->save();

            }        

            return response()->json(['success' => 'ok']);

        } catch (\Throwable $th) {
            
            return response()->json(['success' => 'false','error'=>$th]);
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entries = InventoryEntry::where('inventory_entryID','=',$id)->get();
        $detail = InventoryEntryDet::where('inventory_entryID','=',$id)->with('productos')->get();
        // dd($detail);
        return view('inventory.entry.show')->with(['entry' => $entries, 'products' => $detail]);
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
        InventoryEntry::destroy($id);

        return redirect()->route('inventoryEntry.index');
    }
}
