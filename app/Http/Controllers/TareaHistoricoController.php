<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TareaHistorico;
use Illuminate\Http\Request;

class TareaHistoricoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tarea_historicos = TareaHistorico::orderBy('ID_TAREA_HISTORICO', 'asc')->paginate(10);

		return view('tarea_historicos.index', compact('tarea_historicos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
			$tallas = Tala::all();
		return view('tarea_historicos.create', compact('tallas'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$tarea_historico = new TareaHistorico();

		$tarea_historico->NOMBRE_TAREA_HISTRICO = $request->input("nombre");
        $tarea_historico->DURACION_REQUERIMIENTOS = $request->input("duracionrequerimientos");
        $tarea_historico->DURACION_DISENO = $request->input("duraciondiseno");
        $tarea_historico->DURACION_DESARROLLO = $request->input("duraciondesarrollo");
        $tarea_historico->DURACION_PRUEBAS = $request->input("duracionpruebas");
        $tarea_historico->DURACION_IMPLEMENTACION = $request->input("duracionimplementacion");
        $tarea_historico->DURACION_MANTENIMIENTO = $request->input("duracionmantenimiento");

		$tarea_historico->save();

		\Flash::message('Tarea creada con éxito');
		return redirect('tarea_historicos');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tarea_historico = TareaHistorico::findOrFail($id);

		return view('tarea_historicos.show', compact('tarea_historico'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tarea_historico = TareaHistorico::findOrFail($id);

		return view('tarea_historicos.edit', compact('tarea_historico'));
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
		$tarea_historico = TareaHistorico::findOrFail($id);

		$tarea_historico->nombre = $request->input("nombre");
        $tarea_historico->duracionRequerimientos = $request->input("duracionRequerimientos");
        $tarea_historico->duracionDiseno = $request->input("duracionDiseno");
        $tarea_historico->duracionDesarrollo = $request->input("duracionDesarrollo");
        $tarea_historico->duracionPruebas = $request->input("duracionPruebas");
        $tarea_historico->duracionImplementacion = $request->input("duracionImplementacion");
        $tarea_historico->duracionMantenimiento = $request->input("duracionMantenimiento");

		$tarea_historico->save();

		return redirect()->route('tarea_historicos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		TareaHistorico::eliminar($id);
		\Flash::message(' Tarea eliminada con éxito');
		return redirect('equipos');
	}

}
