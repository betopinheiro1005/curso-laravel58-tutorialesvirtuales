<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionLibro;
use Illuminate\Http\Request;
use App\Models\Libro;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    public function index()
    {
        can('listar-libros');
        $datas = Libro::orderBy('id')->get();
        return view('libro.index', compact('datas'));
    }

    public function crear()
    {
        can('crear-libros');
        return view('libro.crear');
    }

    public function guardar(ValidacionLibro $request)
    {
        if ($foto = Libro::setCaratula($request->foto_up))
            $request->request->add(['foto' => $foto]);
        Libro::create($request->all());
        return redirect()->route('libro')->with('mensaje', 'El libro se creo correctamente');
    }

    public function ver(Request $request, Libro $libro)
    {
        if ($request->ajax()) {
            return view('libro.ver', compact('libro'));
        } else {
            abort(404);
        }
    }

    public function editar($id)
    {
        $data = Libro::findOrFail($id);
        return view('libro.editar', compact('data'));
    }

    public function actualizar(ValidacionLibro $request, $id)
    {
        $libro = Libro::findOrFail($id);
        if ($foto = Libro::setCaratula($request->foto_up, $libro->foto))
            $request->request->add(['foto' => $foto]);
        $libro->update($request->all());
        return redirect()->route('libro')->with('mensaje', 'El libro se actualizó correctamente');
    }

    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            $libro = Libro::findOrFail($id);
            if (Libro::destroy($id)) {
                Storage::disk('public')->delete("imagenes/caratulas/$libro->foto");
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
