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
                        <h3>Data Employee - {{ $companie->name }} Companie</h3>
                        <a href="{{route('employee.print', $companie)}}" class="btn btn-primary">Print PDF</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Companie</th>
                                <th>Aksi</th>
                            </tr>

                            @foreach ($employee as $item)
                                <tr>
                                    <td>{{ $employee->count() * ($employee->currentPage() - 1) + $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->companies->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"
                                                href="{{ route('employee.edit', $item->id) }}">Edit</a>



                                            <form action="{{ route('employee.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <button class="btn btn-danger btn-action" data-toggle="tooltip"
                                                    title="Delete"
                                                    onclick="confirm('are you sure want delete')">Delete</button>

                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                    <div class="card-footer">
                        {!! $employee->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
