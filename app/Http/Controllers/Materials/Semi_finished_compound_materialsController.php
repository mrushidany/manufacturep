<?php

namespace App\Http\Controllers\Materials;

use App\Models\Basic_unit;
use App\Models\Compound_basic_material;
use App\Models\Semi_finished_compound_material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class Semi_finished_compound_materialsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('materials.semi_finished_compound_material');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =
            [
              'compound_basic' => Compound_basic_material::all(),
              'units' => Basic_unit::all()
            ];
        return view('materials.autogenerated.semi_finished_compound_material_form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Semi_finished_compound_material $semi_finished_compound_material)
    {

        $semi_finished_compound_material ->name = $request->name;
        $semi_finished_compound_material ->description = $request->description;
        $semi_finished_compound_material ->compound_basic_id = $request->compound_basic_id;
        $semi_finished_compound_material ->unit_id = $request->unit_id;
        $semi_finished_compound_material->save();

        return redirect()->route('semi_finished_compound_materials.index');

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
        $semi_finished_compound_material = Semi_finished_compound_material::find($id);
        $data = [
          'semi_compound_material' => $semi_finished_compound_material,
            'compound_basic' => Compound_basic_material::all(),
            'units' => Basic_unit::all()
        ];

        return view('materials.autogenerated.semi_finished_compound_material_form')->with($data);

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

        $material = Semi_finished_compound_material::find($id);
        $material -> name = $request->name;
        $material -> description = $request->description;
        $material -> compound_basic_id = $request->compound_basic_id;
        $material -> unit_id = $request->unit_id;
        $material ->save();

        return redirect()->route('semi_finished_compound_materials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Semi_finished_compound_material::destroy($id);
     return redirect()->route('semi_finished_compound_materials.index');
    }

    public function datatable(){
        $semi_finished_material = DB::table('semi_finished_compound_materials')
                                        ->leftJoin(
                                            'compound_basic_materials',
                                            'compound_basic_materials.id',
                                            '=',
                                            'semi_finished_compound_materials.compound_basic_id'
                                        )
                                       ->leftJoin(
                                         'basic_units',
                                         'basic_units.id',
                                         '=',
                                         'semi_finished_compound_materials.unit_id'
                                       )
                                       ->select(
                                           'semi_finished_compound_materials.id',
                                                    'semi_finished_compound_materials.name',
                                                    'semi_finished_compound_materials.description',
                                                    'compound_basic_materials.name as compound_basic_material_name',
                                                    'basic_units.name as basic_unit_name'

                                       )
                                        ->get();
        return DataTables::of($semi_finished_material)
                            ->addColumn('action', function ($semi_material){
                                $e  = '';
                                $e .= '<a href="javascript:edit(\'' . route('semi_finished_compound_materials.edit', $semi_material->id) . '\')" class=" btn btn-xs btn-info"><i class="fa fa-edit"></i>Edit</a>';
                                $e .= '<a href="javascript:destroy(\'' . route('semi_finished_compound_materials.destroy', $semi_material->id) . '\')" class=" btn btn-xs btn-danger"><i class="fa fa-trash"></i>Delete</a>';
                                return '<nobr>' . $e . '</nobr>';
                            })
                            ->make(true);
    }
}
