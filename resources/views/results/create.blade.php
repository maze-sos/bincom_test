@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4 rounded">
        <h2 class="text-center mb-4 text-primary fw-bold">Add New Polling Unit & Results</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('results.store') }}">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="polling_unit_id" class="form-label fw-semibold">Polling Unit ID</label>
                        <input type="text" name="polling_unit_id" id="polling_unit_id" class="form-control border-primary rounded" required>
                    </div>

                    <div class="mb-3">
                        <label for="lga_id" class="form-label fw-semibold">LGA</label>
                        <select name="lga_id" id="lga_id" class="form-select border-primary rounded" required>
                            <option value="" disabled selected>-- Select LGA --</option>
                            @foreach($lgas as $lga)
                                <option value="{{ $lga->lga_id }}">{{ $lga->lga_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="ward_id" class="form-label fw-semibold">Ward</label>
                        <select name="ward_id" id="ward_id" class="form-select border-primary rounded" required>
                            <option value="" disabled selected>-- Select Ward --</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="uniquewardid" class="form-label fw-semibold">Unique Ward ID</label>
                        <select name="uniquewardid" id="uniquewardid" class="form-select border-primary rounded" required>
                            <option value="" disabled selected>-- Select Unique Ward ID --</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="polling_unit_number" class="form-label fw-semibold">Polling Unit Number</label>
                        <input type="text" name="polling_unit_number" id="polling_unit_number" class="form-control border-primary rounded" required>
                    </div>

                    <div class="mb-3">
                        <label for="polling_unit_name" class="form-label fw-semibold">Polling Unit Name</label>
                        <input type="text" name="polling_unit_name" id="polling_unit_name" class="form-control border-primary rounded" required>
                    </div>

                    <div class="mb-3">
                        <label for="polling_unit_description" class="form-label fw-semibold">Polling Unit Description</label>
                        <textarea name="polling_unit_description" id="polling_unit_description" class="form-control border-primary rounded"></textarea>
                    </div>
                </div>
            </div>

            <h4 class="mt-4 text-center text-primary fw-bold">Enter Party Scores</h4>
            <div class="row">
                @foreach($parties as $party)
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="party_score_{{ $party->partyid }}" class="form-label fw-semibold">
                                {{ $party->partyname }} ({{ $party->partyid }})
                            </label>
                            <input type="number" 
                                name="party_scores[{{ $party->partyid }}]" 
                                id="party_score_{{ $party->partyid }}" 
                                class="form-control border-primary rounded" 
                                value="0" required>
                        </div>
                    </div>
                @endforeach

            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3 fw-bold py-2">Submit</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#lga_id').on('change', function () {
            let lgaId = $(this).val();
            if (lgaId) {
                $.ajax({
                    url: "{{ route('wards.by.lga') }}",
                    type: "GET",
                    data: { lga_id: lgaId },
                    success: function (data) {
                        $('#ward_id').empty().append('<option value="" disabled selected>-- Select Ward --</option>');
                        $('#uniquewardid').empty().append('<option value="" disabled selected>-- Select Unique Ward ID --</option>');

                        $.each(data.wards, function (key, ward) {
                            $('#ward_id').append('<option value="' + ward.ward_id + '">' + ward.ward_name + '</option>');
                            $('#uniquewardid').append('<option value="' + ward.uniqueid + '">' + ward.ward_name + ' (ID: ' + ward.uniqueid + ')</option>');
                        });
                    }
                });
            }
        });
    });
</script>
@endsection
