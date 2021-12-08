<?php

namespace App\Http\Controllers;

use App\Classes\CompanieClass;
use App\Classes\EmployeeClass;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{


    public function __construct(EmployeeClass $epmploye, CompanieClass $companie)
    {
        $this->employee = $epmploye;
        $this->companie = $companie;
    }


    public function index()
    {
        $employee = $this->employee->getEmployee();
        return view('employee.index', compact('employee'));
    }


    public function create(Employee $employee)
    {
        $companies = $this->companie->getCompanie();
        return view('employee.create', compact('companies', 'employee'));
    }


    public function store(EmployeeRequest $request)
    {
        $this->employee->store($request);
        return redirect(route('employee.index'))->with('success', 'create employe succes!');
    }


    public function edit(Employee $employee)
    {
        $companies = $this->companie->getCompanie();
        return view('employee.edit', compact('employee', 'companies'));
    }


    public function update(EmployeeRequest $request, Employee $employee)
    {
        $this->employee->update($request, $employee);
        return redirect(route('employee.index'))->with('success', 'update employe succes!');
    }


    public function destroy(Employee $employee)
    {

        $this->employee->destroy($employee);
        return redirect(route('employee.index'))->with('success', 'delete emplye succes!');
    }

    public function import(ImportRequest $request)
    {

        $this->employee->import($request);
        return redirect(route('employee.index'))->with('success', 'import data success');
    }
}
