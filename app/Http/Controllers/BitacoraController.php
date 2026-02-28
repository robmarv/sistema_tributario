<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bitacora;
use App\Models\User;

class BitacoraController extends Controller
{
    public function index()
    {
        $bitacoras = Bitacora::with('usuario')->orderByDesc('fecha')->paginate(30);
        return view('bitacora', compact('bitacoras'));
    }
}
