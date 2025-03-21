@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg border-0 rounded-4 p-4 bg-light">
        <h2 class="text-center mb-4 text-primary fw-bold">
            <i class="bi bi-geo-alt"></i> Select Local Government
        </h2>

        <form method="POST" action="{{ route('lgas.show') }}" class="p-3">
            @csrf
            <div class="mb-3">
                <label for="lga_id" class="form-label fw-bold text-dark">Local Government Area</label>
                <select name="lga_id" id="lga_id" class="form-select shadow-sm border-primary">
                    <option value="" selected disabled>-- Select Local Government --</option>
                    @foreach($lgas as $lga)
                        <option value="{{ $lga->lga_id }}">{{ $lga->lga_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100 fw-bold shadow-sm">
                <i class="bi bi-search"></i> View Results
            </button>
        </form>
    </div>

    @if(isset($finalResults) && count($finalResults) > 0)
    <div class="card shadow-lg border-0 rounded-4 mt-4 p-4 bg-white">
        <h3 class="text-center mb-3 text-success fw-bold">
            <i class="bi bi-bar-chart-line-fill"></i> Results for {{ $selectedLga->lga_name ?? 'Selected LGA' }}
        </h3>

        <div class="table-responsive">
            <table class="table table-hover table-bordered border-primary shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Party</th>
                        <th class="text-end">Total Score</th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    @foreach($finalResults as $result)
                        <tr>
                            <td class="fw-semibold text-center">
                                <i class="bi bi-circle-fill text-primary"></i> 
                                {{ $result->partyname ?? $result->party_abbreviation }}
                            </td>
                            <td class="text-end text-success fw-bold">{{ number_format($result->total_score) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @elseif(isset($finalResults))
    <div class="alert alert-warning mt-4 text-center shadow-sm fw-bold">
        <i class="bi bi-exclamation-triangle-fill"></i> No results found for the selected Local Government.
    </div>
    @endif
</div>
@endsection
