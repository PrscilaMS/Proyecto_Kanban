<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Proyecto;
use App\Talla;
use App\Tarea;
use App\Equipo;
use App\Version;
use Illuminate\Http\Request;

class ProyectoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$proyectos = Proyecto::orderBy('ID_PROYECTO', 'asc')->paginate(10);

		return view('proyectos.index', compact('proyectos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$equipos = Equipo::all();
		
		return view('proyectos.create',compact('equipos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$proyecto = new Proyecto();
		$version = new Version();

		$proyecto->NOMBRE_PROYECT = $request->input("nombre");
        $proyecto->FECHA_INICIO = $request->input("fechainicio");
        $proyecto->ID_EQUIPO = $request->input("equipo");

		$proyecto->save();
		
		
		$proyecto = ProyectoController::showByName($proyecto);
		session(['id_proyecto' => $proyecto->ID_PROYECTO]);
		
		$id_version = VersionController::store($proyecto->ID_PROYECTO);
		session(['id_version' => $id_version]);
		
		$tallas = Talla::all();
		$tareas = Tarea::traerTareas($id_version);
		
		return view('tareas.create', compact('tareas'), compact('tallas'));
	}
	
		/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showByName($proyecto)
	{
		$proyecto = Proyecto::where('NOMBRE_PROYECT', $proyecto->NOMBRE_PROYECT)->first();

		return $proyecto;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$proyecto = Proyecto::findOrFail($id);

		return view('proyectos.show', compact('proyecto'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$proyecto = Proyecto::findOrFail($id);

		return view('proyectos.edit', compact('proyecto'));
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
		$proyecto = Proyecto::findOrFail($id);

		$proyecto->nombre = $request->input("nombre");
        $proyecto->fechaInicio = $request->input("fechaInicio");

		$proyecto->save();

		return redirect()->route('proyectos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$proyecto = Proyecto::findOrFail($id);
		$proyecto->delete();

		return redirect()->route('proyectos.index')->with('message', 'Item deleted successfully.');
	}
	
		public function home()
	{
		return view('proyectos.home');
	}

}
