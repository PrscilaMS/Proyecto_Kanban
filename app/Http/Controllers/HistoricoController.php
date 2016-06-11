<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Historico;
use App\Talla;

use Illuminate\Http\Request;

class HistoricoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$historicos = Historico::orderBy('ID_HISTORICO', 'desc')->paginate(10);

		return view('historicos.index', compact('historicos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('historicos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$historico = new Historico();

		$historico->NOMBRE_HISTORICO = $request->input("nombre");
        $historico->FECHA_INICIO = $request->input("fechainicio");
        $historico->FECHA_FINAL = $request->input("fechafinal");
		
		$historico->save();
     	$historico = HistoricoController::showByName($historico);
		
		session(['id_historico' => $historico->ID_HISTORICO]);
		session(['TotalHoras' => 0]);
		
		$tallas = Talla::all();
		 
		return view('tarea_historicos.create', compact('tallas'));
	}
	
   	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showByName($historico)
	{
		$historico = Historico::where('NOMBRE_HISTORICO', $historico->NOMBRE_HISTORICO)->first();

		return $historico;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$historico = Historico::where('ID_HISTORICO', $id)->first();

		return view('historicos.show', compact('historico'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$historico = Historico::where('ID_HISTORICO', $id)->first();

		return view('historicos.edit', compact('historico'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		
		$historico = new Historico;
		
		$historico->ID_HISTORICO = session('id_historico'); 
        $historico->DURACION_TOTAL = session('TotalHoras');
        session(['TotalHoras' => 0]); 

		Historico::modificarHoras($historico);
		\Flash::message('Historico creado con éxito');
		return redirect('historicos');
		// $historico = Historico::where('ID_HISTORICO', $id)->first();
		
		// $historico->NOMBRE_HISTORICO = $request->input("nombre");
  //      $historico->FECHA_INICIO = $request->input("fechainicio");
  //      $historico->FECHA_FINAL = $request->input("fechafinal");
  //      $historico->DURACION_TOTAL = $request->input("duraciontotal");

		// Historico::modificar($historico);
		// \Flash::message('Historico modificado con éxito');
		// return redirect('historicos');
	}
	
	public function updateCreateHistorico()
	{
		$historico = new Historico;
		
		$historico->ID_HISTORICO = session('id_historico'); 
        $historico->DURACION_TOTAL = session('TotalHoras');
        session(['TotalHoras' => 0]); 

		Historico::modificarHoras($historico);
		\Flash::message('Historico creado con éxito');
		return redirect('historicos');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Historico::eliminar($id);
		\Flash::message('Historico eliminado con éxito');
		return redirect('historicos');
	}

}
