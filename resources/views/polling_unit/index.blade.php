@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center my-4 text-primary fw-bold">Polling Units</h2>

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>Error:</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="table-responsive shadow-lg mt-4">
        <table class="table table-hover table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Polling Unit Name</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pollingUnits as $unit)
                    <tr class="align-middle">
                        <td class="fw-bold">{{ $unit->uniqueid }}</td>
                        <td>{{ $unit->polling_unit_name }}</td>
                        <td>{{ $unit->polling_unit_description }}</td>
                        <td class="text-center">
                            <a href="{{ route('polling-units.show', ['id' => $unit->uniqueid]) }}" 
                               class="btn btn-info btn-sm fw-bold shadow-sm">View Results</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .table {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
    }

    .table th, .table td {
        padding: 12px;
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background: #f8f9fa;
        transition: background 0.3s ease-in-out;
    }

    .btn-info {
        background: #007bff;
        color: #fff;
        transition: all 0.3s ease-in-out;
    }

    .btn-info:hover {
        background: #fff;
        color: #007bff;
        transform: scale(1.05);
    }
</style>
@endsection
