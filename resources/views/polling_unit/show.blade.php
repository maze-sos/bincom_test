@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4">
        <div class="text-center mb-2">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ session('success') }}
                </div>
            @endif
    
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ session('error') }}
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-primary fw-bold">Polling Unit: {{ $pollingUnit->polling_unit_name }}</h2>
            <a href="{{ route('polling-units.index') }}" class="btn btn-danger btn-lg shadow-sm">⬅ Back to Polling Units</a>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-hover table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Party</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $result)
                        <tr class="align-middle text-center">
                            <td class="fw-bold">{{ $result->party_abbreviation }}</td>
                            <td class="text-success fw-bold">{{ number_format($result->party_score) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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

    .btn-danger {
        transition: all 0.3s ease-in-out;
    }

    .btn-danger:hover {
        background: #c82333;
        color: #fff;
        transform: scale(1.05);
    }

    .text-primary {
        font-size: 1.8rem;
    }

    .text-success {
        font-size: 1.2rem;
    }
</style>
@endsection
