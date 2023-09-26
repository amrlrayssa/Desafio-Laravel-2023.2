<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\User;
use App\Models\Consultation;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function index()
    {
        $user = Auth::user()->name;
        $actualDate = now()->format('Y/m/d H:i' );
        $consultations = Consultation::all();
        $animals = Animal::all();

        $pdf = Pdf::loadView('pdf.index', compact('consultations', 'actualDate', 'animals'));

        return $pdf->setPaper('A4')->stream('Consultations.pdf');
    }
}
