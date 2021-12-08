<?php


namespace App\Classes;

use App\Companie;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\ImportRequest;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeClass
{

    public function getEmployee()
    {
        return Employee::with('companies')->latest()->paginate(5);
    }

    public function store(EmployeeRequest $request)
    {
        Employee::create([
            'nama' => $request->nama,
            'companies_id' => $request->companies_id,
            'email' => $request->email,
        ]);
       
    }


    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update([
            'nama' => $request->nama,
            'companies_id' => $request->companies_id,
            'email' => $request->email,
        ]);

       
    }

    public function destroy(Employee $employee){
        $employee->delete();
       
    }

    public function import(ImportRequest $request)
    {
        $file = $request->file('file')->store('import');

        Excel::import(new EmployeeImport, $file);
    }
}
