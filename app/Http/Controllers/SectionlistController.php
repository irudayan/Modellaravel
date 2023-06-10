<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mainsection;
use App\Models\Subsection;
use Yajra\DataTables\DataTables;
use DB;

class SectionlistController extends Controller
{
    public function mainsubsection(Request $request)
    {

        $mainsection = Mainsection::all();
        $subsection= DB::table('subsections')
        ->leftjoin('mainsection','mainsection.id','=','subsections.section_id')
        ->select('mainsection.name')
        ->get();
        return view('backend.include.dashboard', compact('mainsection','subsection'));
    }
}
