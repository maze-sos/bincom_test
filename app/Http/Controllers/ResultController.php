<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PollingUnit;
use App\Models\AnnouncedPuResult;
use App\Models\Lga;
use App\Models\Ward;
use App\Models\Party;

class ResultController extends Controller
{
    public function create()
    {
        $lgas = Lga::all();
        $wards = Ward::all();
        $parties = Party::all();

        return view('results.create', compact('lgas', 'wards', 'parties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'polling_unit_id' => 'required|string|unique:polling_unit,polling_unit_id',
            'ward_id' => 'required|exists:ward,ward_id',
            'lga_id' => 'required|exists:lga,lga_id',
            'uniquewardid' => 'required|exists:ward,uniqueid',
            'polling_unit_number' => 'required|string|unique:polling_unit,polling_unit_number',
            'polling_unit_name' => 'required|string',
            'polling_unit_description' => 'nullable|string',
            'party_scores' => 'required|array',
            'party_scores.*' => 'required|integer|min:0'
        ]);
    
        $pollingUnit = PollingUnit::create([
            'polling_unit_id' => $request->polling_unit_id,
            'ward_id' => $request->ward_id,
            'lga_id' => $request->lga_id,
            'uniquewardid' => $request->uniquewardid,
            'polling_unit_number' => $request->polling_unit_number,
            'polling_unit_name' => $request->polling_unit_name,
            'polling_unit_description' => $request->polling_unit_description,
            'entered_by_user' => 'Admin',
            'date_entered' => now(),
            'user_ip_address' => request()->ip(),
        ]);
    
        $pollingUnitId = $pollingUnit->uniqueid;
    
        $parties = Party::pluck('partyid')->toArray(); 
    
        foreach ($request->party_scores as $partyId => $score) {
            if (in_array($partyId, $parties)) {
                AnnouncedPuResult::create([
                    'polling_unit_uniqueid' => $pollingUnitId,
                    'party_abbreviation' => $partyId, 
                    'party_score' => $score,
                    'entered_by_user' => 'Admin',
                    'date_entered' => now(),
                    'user_ip_address' => request()->ip()
                ]);
            }
        }
    
        return redirect()->route('polling-units.show', ['id' => $pollingUnitId])
            ->with('success', 'Polling unit and results added successfully!');
    }
    
    

    public function getWardsByLGA(Request $request)
    {
        $wards = Ward::where('lga_id', $request->lga_id)->get(['ward_id', 'ward_name', 'uniqueid']);
        return response()->json(['wards' => $wards]);
    }

}
