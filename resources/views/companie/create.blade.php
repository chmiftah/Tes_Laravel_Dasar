@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-header">
                        <div class="col-sm-8">
                            <h3>Add Employee</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('companie.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            @include('companie._form',[
                            'submit'=>'Submit'
                            ])



                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
