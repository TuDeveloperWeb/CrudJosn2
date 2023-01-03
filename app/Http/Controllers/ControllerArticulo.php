<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Catalogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ControllerArticulo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('articulos.index');

    }




    public function user(Request $request,$id)
    {

       // $datos = Articulo::where('estado',1)->get();


       $articulo = Catalogo::where('id',$id)->get();
   
       // dd($articulo);


    }


    public function detalleVenta(Request $request,$id)
    {

        $articulo = Catalogo::where('id',$id)->get();

        return response()->json($articulo);

        

    }


    public function getArticulo(Request $request){

        if ($request->ajax()) {
            $datos = Articulo::where('estado',1)->get();



            return datatables()->of($datos)
                ->addIndexColumn()
                ->addColumn('check', function($chk){
                    $checkBtn = '<input type="checkbox" class="btn-check valores" id="btn-check-outlined " value="'.$chk->id.'"  name="opcion" > ';
                    return $checkBtn;
                })
                ->addColumn('detalle', function($row){
                    $checkDetal = '<a data-role="update" data-id="'.$row->id.'" class="editar cursor">
                    <i class="fa-regular fa-hand-point-up"></i></a> ';
                    return $checkDetal;
                })
                ->rawColumns(['check','detalle'])
                ->make(true);
        }

    }

    public function procesarVenta(Request $request){

        $articulo = Articulo::find($request->id);

        $articulo->observacion = $request->observacion;
        $articulo->estado = $request->estado;
        $articulo->save();


        return response()->json(['mensaje'=>'Procesado Correctamente']);

    }


    public function rechazarVenta(Request $request){

        $articulo = Articulo::find($request->id);

        $articulo->observacion = $request->observacion;
        $articulo->estado = $request->estado;
        $articulo->save();


        return response()->json(['mensaje'=>'Procesado Correctamente']);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();

        $estado=6;
        

       dd($data);
        
        
        if(isset($data['btnEnviar']) && in_array($data['btnEnviar'],$data)){
            $estado=1;
            
        }

        $pre             = new Articulo;
        $pre->codigo       = $data['Codigo'];
        $pre->descripcion    = $data['Descripcion'];
        $pre->cantidad    = $data['Cantidad'];
        $pre->precio    = $data['Precio'];
        $pre->estado  = $estado;
        $pre->observacion=DB::raw("NULL");
        
        $pre->save();
        $idVenta = $pre->id;//Se autogenera

      
        if($idVenta>0 && count($data['Detalle'])>0){
            $cantidad = count($data['Detalle']);

           //dd($cantidad);
            for($i=0; $i<$cantidad; $i++){



                $det            = new Catalogo;
                $det->id       = $idVenta;
                $det->descripcion   = $data['Detalle'][$i];
                $det->telefono      = $data['Telefono'][$i];
                $det->direccion     = $data['Direccion'][$i];
                $det->save();

            }

        }    

        return view('articulos.index');
        
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        
        $datos = Articulo::where('estado',1)->get();

        dd($datos);
        return response()->json($datos);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = Catalogo::where('id',$id)->get();
        //dd($consulta);

        return response()->json($consulta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // sleep(2);
        $articulo = Articulo::find($request->id);

        $articulo->observacion = $request->observacion;
        $articulo->estado = $request->estado;
        $articulo->save();


        return response()->json(['mensaje'=>'Procesado Correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
