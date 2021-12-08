@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-12 col-md-offset-1">
                      <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h4><i class="icon fa fa-ban"></i> Error!</h4>
                          @foreach($errors->all() as $error)
                          {{ $error }} <br>
                          @endforeach      
                      </div>
                    </div>
                </div>
                @endif
  
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
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="{{ route('employee.import') }}" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                </div>
                                <div class="modal-body">

                                    {{ csrf_field() }}

                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file">

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class=" col-md-8 mt-1 d-flex">
                                <h3>Data Employee</h3>
                            </div>
                            <div class="col-md-4 align-right">
                                <a href="{{ route('employee.create') }}" class="btn btn-primary mr-3">Add Employee</a>
                          
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#importExcel">
                                import excel
                            </button>
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
