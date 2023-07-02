<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Person;
use App\Models\ItStock;
use App\Models\ItRecord;
use Illuminate\Http\Request;

class ItStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itStocks = ItStock::with(['person', 'item'])->get();

        return view('it_stocks.index', compact('itStocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $people = Person::all();
        $items = Item::all();


        return view('it_stocks.create', compact('people', 'items'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'person_id' => 'required',
            'item_id' => 'required',
            'stock' => 'required|numeric',
            'is_in' => 'required|boolean',
        ]);

        $itStock = ItStock::where('item_id', $request->item_id)->first();

        if ($itStock) {
            if ($request->is_in) {
                $itStock->stock += $request->stock;
            } else {
                $itStock->stock -= $request->stock;

                if ($itStock->stock < 0) {
                    return redirect()->back()->withErrors('Insufficient stock.');
                }
            }

            $itStock->save();

            ItRecord::create([
                'person_id' => $request->person_id,
                'item_id' => $request->item_id,
                'stock' => $request->stock,
                'status' => $request->is_in ? "IN" : "OUT",
            ]);
        } else {
            ItStock::create($request->all());

            ItRecord::create([
                'person_id' => $request->person_id,
                'item_id' => $request->item_id,
                'stock' => $request->stock,
                'status' => $request->is_in ? 'IN' : 'OUT',
            ]);
        }

        return redirect()->route('it_stocks.index')->with('success', 'IT Item Stock created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}