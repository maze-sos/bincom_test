<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PollingUnit;
use App\Models\AnnouncedPuResult;

class PollingUnitController extends Controller
{
    public function index()
    {
        $pollingUnits = PollingUnit::all();
        return view('polling_unit.index', compact('pollingUnits'));
    }

    public function show($id)
    {
        $pollingUnit = PollingUnit::where('uniqueid', $id)->first();
        $results = AnnouncedPuResult::where('polling_unit_uniqueid', $id)->get();

        if (!$pollingUnit) {
            return redirect('/')->with('error', 'Polling Unit not found');
        }

        return view('polling_unit.show', compact('pollingUnit', 'results'));
    }
}
