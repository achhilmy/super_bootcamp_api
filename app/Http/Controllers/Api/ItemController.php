<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return response()->json(
            [
                'success' => true,
                'message' => 'list data item name',
                'data'=> $items,
                'meta-data' => 'data list',
                'total-record' => 10
            ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate(['name'=> 'required', 'description'=> 'required']);
        $item = Item::create($request->all());
        return response()->json($item, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        // return response()->json($item);
        if ($items) {
            return response()->json([
                'success' => true,
                'message' =>$item,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan',
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Item $item) {
    //    $request->validate([ 'name' => 'required', 'description' => 'required', ]);
    //    $item->update($request->all());
    //    return response()->json($item);
    // } 
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        
        $item->save();
        
        return response()->json($item);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::findOrFail($id);
        $items->delete();

        if ($items) {
            return response()->json([
                'success' => true,
                'message' => 'Items Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Items Gagal Dihapus!',
            ], 400);
        }

    } 
}
