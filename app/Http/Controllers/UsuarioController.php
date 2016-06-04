<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuarios = Usuario::orderBy('id', 'desc')->paginate(10);

		return view('usuarios.index', compact('usuarios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('usuarios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$usuario = new Usuario();

		$usuario->nombre = $request->input("nombre");
        $usuario->apellidos = $request->input("apellidos");
        $usuario->correo = $request->input("correo");
        $usuario->contrasena = $request->input("contrasena");
        $usuario->tipo = $request->input("tipo");

		$usuario->save();

		return redirect()->route('usuarios.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$usuario = Usuario::findOrFail($id);

		return view('usuarios.show', compact('usuario'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = Usuario::findOrFail($id);

		return view('usuarios.edit', compact('usuario'));
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
		$usuario = Usuario::findOrFail($id);

		$usuario->nombre = $request->input("nombre");
        $usuario->apellidos = $request->input("apellidos");
        $usuario->correo = $request->input("correo");
        $usuario->contrasena = $request->input("contrasena");
        $usuario->tipo = $request->input("tipo");

		$usuario->save();

		return redirect()->route('usuarios.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuario = Usuario::findOrFail($id);
		$usuario->delete();

		return redirect()->route('usuarios.index')->with('message', 'Item deleted successfully.');
	}

}
