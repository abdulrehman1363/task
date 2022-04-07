@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Employees') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="float-right">
                                    <a class="btn btn-success" href="{{ route('employees.create') }}" style="margin-bottom:5px;float: right;"> Create</a>
                                </div>
                            </div>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Company</th>
                                <th width="280px" scope="col">Action</th>
                            </tr>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->full_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td>
                                        <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center">
                            {!! $employees->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
