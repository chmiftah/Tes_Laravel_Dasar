@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-header">
                        <div class="col-sm-8">
                            <h3>Update Employee - {{$employee->nama}}</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('employee.update', $employee) }}" method="post">
                            @csrf
                            @method('put')

                            @include('employee._form',[
                                'submit'=>'Update'
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
