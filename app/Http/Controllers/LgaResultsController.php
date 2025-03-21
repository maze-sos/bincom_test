<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lga;
use App\Models\PollingUnit;
use App\Models\AnnouncedPuResult;
use DB;

class LgaResultsController extends Controller
{
    public function index()
    {
        $lgas = Lga::all();
        return view('lga_results.index', compact('lgas'));
    }

    public function show(Request $request)
    {
        $lgaId = $request->lga_id;
    
        $selectedLga = Lga::find($lgaId);
    
        $lgaResults = DB::table('announced_pu_results')
            ->select('announced_pu_results.party_abbreviation', DB::raw('SUM(announced_pu_results.party_score) as total_score'))
            ->join('polling_unit', 'polling_unit.uniqueid', '=', 'announced_pu_results.polling_unit_uniqueid')
            ->where('polling_unit.lga_id', $lgaId)
            ->groupBy('announced_pu_results.party_abbreviation');
    
        $allParties = DB::table('party')->select('partyid as party_abbreviation', 'partyname');
    
        $finalResults = DB::query()
            ->fromSub($allParties, 'parties')
            ->leftJoinSub($lgaResults, 'lga_results', 'parties.party_abbreviation', '=', 'lga_results.party_abbreviation')
            ->select(
                'parties.party_abbreviation',
                'parties.partyname',
                DB::raw('COALESCE(lga_results.total_score, 0) as total_score')
            )
            ->orderByDesc('total_score')
            ->get();
    
        $lgas = Lga::all();
    
        return view('lga_results.index', compact('lgas', 'finalResults', 'selectedLga'));
    }
    
    
    

    
    
}
