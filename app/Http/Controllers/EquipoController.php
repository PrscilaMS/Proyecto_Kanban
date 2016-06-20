<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$equipos = Equipo::orderBy('ID_EQUIPO', 'asc')->paginate(10);

		return view('equipos.index', compact('equipos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('equipos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$equipo = new Equipo();

		$equipo->NOMBRE_EQUIPO = $request->input("nombre");

		$equipo->save();

		\Flash::message('Equipo creado con éxito');
		return redirect('equipos');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$equipo = Equipo::where( 'ID_EQUIPO' , $id)->first();

		return view('equipos.show', compact('equipo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$equipo = Equipo::where( 'ID_EQUIPO' , $id)->first();

		return view('equipos.edit', compact('equipo'));
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
		$equipo = Equipo::where( 'ID_EQUIPO' , $id)->first();

		$equipo->NOMBRE_EQUIPO = $request->input("nombre");
        Equipo::modificar($equipo);
        
		\Flash::message('Equipo actualizado con éxito');
		return redirect('equipos');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try {
			Equipo::eliminar($id);
		\Flash::message('Equipo eliminado con éxito');
		return redirect('equipos');
		} catch (\Exception $e) {
				
			\Flash::message('El equipo esta ligado a un proyecto, no se puede eliminar');
			return redirect('equipos');
		}
		
	}

}
