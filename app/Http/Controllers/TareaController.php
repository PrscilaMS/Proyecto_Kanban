<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tareas = Tarea::orderBy('ID_TAREA', 'desc')->paginate(10);

		return view('tareas.index', compact('tareas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tareas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$tarea = new Tarea();

		$tarea->enunciado = $request->input("enunciado");

		$tarea->save();

		return redirect()->route('tareas.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tarea = Tarea::findOrFail($id);

		return view('tareas.show', compact('tarea'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tarea = Tarea::findOrFail($id);

		return view('tareas.edit', compact('tarea'));
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
		$tarea = Tarea::findOrFail($id);

		$tarea->enunciado = $request->input("enunciado");

		$tarea->save();

		return redirect()->route('tareas.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tarea = Tarea::findOrFail($id);
		$tarea->delete();

		return redirect()->route('tareas.index')->with('message', 'Item deleted successfully.');
	}

}
