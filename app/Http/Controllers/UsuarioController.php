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
		$usuarios= Usuario::orderBy('id', 'desc')->paginate(10);

		return view('usuarios.index', compact('usuarios'));
	}
	
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function indexPrivilegios()
	{
		$usuarios= Usuario::orderBy('id', 'desc')->paginate(10);

		return view('usuarios.privilegios', compact('usuarios'));
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

		$usuario->NOMBRE_USUARIO = $request->input("nombre");
        $usuario->APELLIDO = $request->input("apellidos");
        $usuario->CORREO = $request->input("correo");
        $contraCrypt = crypt($request->input("contrasena"));
        $usuario->CONTRASENNA = $contraCrypt;
        $usuario->TIPO = $request->input("tipo");
		$usuario->save();
		\Flash::message('Usuario ingresado con éxito');
		return redirect('usuarios');
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
	 **/
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
		$usuario = Usuario::where('CORREO', $id)->first();
		$usuario->NOMBRE_USUARIO = $request->input("nombre");
        $usuario->APELLIDO = $request->input("apellidos");
        $contraCrypt = crypt($request->input("contrasena"));
        $usuario->CONTRASENNA = $contraCrypt;
        $usuario->TIPO = $request->input("tipo");
        Usuario::modificar($usuario);
		\Flash::message('Usuario modificado con éxito');
		return redirect('usuarios');
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
