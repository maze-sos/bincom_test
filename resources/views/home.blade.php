@extends('layouts.app')

@section('content')
<div class="container">

    <div class="text-center mt-5">
        <h1 class="mb-4 fw-bold text-primary">Delta State Election Results Portal</h1>
        <p class="lead text-muted">Access and manage polling unit results across all local governments effortlessly.</p>
    </div>

    <div class="text-center mt-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success:</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error:</strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body text-center">
                    <h4 class="card-title text-dark">Polling Unit Results</h4>
                    <p class="card-text text-muted">View results of individual polling units.</p>
                    <a href="{{ url('/polling-units') }}" class="btn btn-primary w-100">View Polling Units</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body text-center">
                    <h4 class="card-title text-dark">Local Government Results</h4>
                    <p class="card-text text-muted">Get total election results for each LGA.</p>
                    <a href="{{ url('/lga-results') }}" class="btn btn-success w-100">View LGA Results</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body text-center">
                    <h4 class="card-title text-dark">Submit a New Result</h4>
                    <p class="card-text text-muted">Manually add a new polling unit result.</p>
                    <a href="{{ url('/add-result') }}" class="btn btn-warning w-100">Add Result</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    
    .card:hover {
        transform: scale(1.05);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }

    .btn {
        font-weight: bold;
        border-radius: 5px;
    }
</style>
@endsection
