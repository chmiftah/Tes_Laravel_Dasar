<?php

namespace App\Http\Controllers;

use App\Classes\CompanieClass;
use App\Companie;
use App\Employee;
use App\Http\Requests\CompanieRequest;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;

class CompanieController extends Controller
{
    public function __construct(CompanieClass $companie)
    {
        $this->companie = $companie;
    }


    public function index()
    {
        $companie = $this->companie->getCompanie();
        return view('companie.index', compact('companie'));
    }

    public function select2(Request $request)
    {

        $companie = $this->companie->getSelect2Data($request);
        return $companie;
    }


    public function show(Companie $companie)
    {
        $employee = $companie->employes()->latest()->paginate(5);
        return view('companie.list', compact('employee', 'companie'));
    }

    public function print(Companie $companie)
    {

        $employee = $companie->employes()->get();
        $pdf = PDF::loadview('companie.export._pdf', ['employee' => $employee, 'companie' => $companie])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('laporan-pegawai-pdf');
    }

    public function create(Companie $companie)
    {

        return view('companie.create', compact('companie', 'companie'));
    }


    public function store(CompanieRequest $request)
    {
       
        $this->companie->store($request);
        return redirect(route('companie.index'))->with('success', 'create employe succes!');
    }


    public function edit(Companie $companie)
    {
        $companies = $this->companie->getCompanie();
        return view('companie.edit', compact('companie', 'companies'));
    }


    public function update(CompanieRequest $request, Companie $companie)
    {
        $this->companie->update($request, $companie);
        return redirect(route('companie.index'))->with('success', 'update employe succes!');
    }


    public function destroy(Companie $companie)
    {

        $this->companie->destroy($companie);
        return redirect(route('companie.index'))->with('success', 'delete emplye succes!');
    }
}
