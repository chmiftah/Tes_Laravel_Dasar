@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-header">
                        <div class="col-sm-8">
                            <h3>Update companie - {{$companie->name}}</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('companie.update', $companie) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            @if ($companie->logo)
                            <img src="{{asset('storage/'.$companie->logo)}}" width="500"/>
                            @else 
                             <img src="https://cdn.logo.com/hotlink-ok/logo-social.png" alt="" width="500">
                            @endif
                            

                            @include('companie._form',[
                                'submit'=>'Update'
                            ])

                            
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
