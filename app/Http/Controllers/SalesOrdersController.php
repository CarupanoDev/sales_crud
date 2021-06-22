<?php

namespace App\Http\Controllers;

use App\Models\SaleOrder;
use App\Models\Item;
use Illuminate\Http\Request;

class SalesOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale_order = new SaleOrder([
            'client' => 'coferca',
            'payment_term' => 'lorem ipsu',
            'creation_date' => '2021-06-20',
            'created_by' => 'santiago',
            'state' => 'active',
            'observation' => 'lorem ipsu'
        ]);

        $item1 = Item::find(3);
        $item2 = Item::find(4);

        $sale_order->save();
        $sale_order->items()->attach([$item1->id, $item2->id]);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleOrder  $saleOrder
     * @return \Illuminate\Http\Response
     */
    public function show(SaleOrder $saleOrder)
    {
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleOrder  $saleOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleOrder $saleOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleOrder  $saleOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sale_order = SaleOrder::find($id);
        $sale_order->client =  'Medine';
        $sale_order->payment_term = 'ipsu lorem';
        $sale_order->creation_date = '2021-06-20';
        $sale_order->created_by = 'tester';
        $sale_order->state = 'active';
        $sale_order->observation = 'ipsu lorem';


        $sale_order->save();

        $sale_order->items()->sync([5, 6]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleOrder  $saleOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale_order = SaleOrder::find($id);
        $sale_order->delete();
        $sale_order->items()->detach();

    }
}
