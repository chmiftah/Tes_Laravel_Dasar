@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible text-center show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <div class="card">


                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-1 mr-2"> <a href="{{ route('companie.create') }}"
                                    class="btn btn-primary">add</a>
                            </div>
                            <div class="col-sm-8 mt-1">
                                <h3>Data Companie</h3>
                            </div>
                        </div>
                    </div>



                    <div class="card-body">

                        <table class="table table-striped">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Companie</th>
                                <th>logo</th>
                                <th>Aksi</th>
                            </tr>

                            @foreach ($companie as $item)
                                <tr>
                                    <td>{{ $companie->count() * ($companie->currentPage() - 1) + $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->website }}</td>
                                    <td>
                                        @if ($item->logo)
                                            <img src="{{ asset('storage/' . $item->logo) }}" width="100" />
                                        @else
                                            <img src="https://cdn.logo.com/hotlink-ok/logo-social.png" alt="" width="100">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"
                                                href="{{ route('companie.edit', $item->id) }}">Edit</a>


                                            <form action="{{ route('companie.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <button class="btn btn-danger btn-action" data-toggle="tooltip"
                                                    title="Delete"
                                                    onclick="confirm('are you sure want delete')">Delete</button>

                                            </form>

                                            <a class="btn btn-secondary btn-action ml-1" data-toggle="tooltip" title="Edit"
                                                href="{{ route('companie.show', $item->id) }}">view Employee</a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                    <div class="card-footer">
                        {!! $companie->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
