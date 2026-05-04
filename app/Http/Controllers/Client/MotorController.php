<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\JenisMotor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function index(Request $request)
    {
        $query = Motor::with('jenisMotor')->where('stok', '>', 0);

        if ($request->filled('jenis')) {
            $query->where('idjenis', $request->jenis);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_motor', 'like', '%' . $request->search . '%')
                  ->orWhere('merk', 'like', '%' . $request->search . '%');
            });
        }

        $motor     = $query->paginate(9)->withQueryString();
        $jenisMotor = JenisMotor::all();

        return view('client.motor.index', compact('motor', 'jenisMotor'));
    }

    public function show(Motor $motor)
    {
        return view('client.motor.show', compact('motor'));
    }
}