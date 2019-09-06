<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Basic_unit;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('products.products_list');
    }

    public function datatable(){
        $products = DB::table('products')
                ->leftJoin('basic_units','products.basic_unit_id','=','basic_units.id')
                ->select('products.id','products.name','products.description','products.basic_unit_id','basic_units.symbol')
                ->get();
            return DataTables::of($products)

                ->addColumn('action',function ($products) {
                    $e  = '';
                        $e .= '<a href="javascript:edit(\'' . route('products.products_list.edit', $products->id) . '\')" class=" btn btn-xs btn-info"><i class="fa fa-edit"></i>Edit</a>';
                        $e .= '<a href="javascript:destroy(\'' . route('products.products_list.destroy', $products->id) . '\')" class=" btn btn-xs btn-danger"><i class="fa fa-trash"></i>Delete</a>';
                    return '<nobr>' . $e . '</nobr>';
                })
                ->make(true);
        }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['all_products' => new Product,'units' => Basic_unit::all()];
            return view('products.autogenerated.products_form')->with($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Product $product)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->basic_unit_id = $request->basic_unit_id;
        $product->save();

        return redirect()->route('products.products_list.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);

        if($products != null){
            $data = ['all_products' => $products,'units' => Basic_unit::all()];

            return view('products.autogenerated.products_form')->with($data);
        }else{
            return redirect()->back();
        }
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
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->basic_unit_id = $request->basic_unit_id;
        $product->save();


        return redirect()->route('products.products_list.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->route('products.products_list.index');

    }
}
