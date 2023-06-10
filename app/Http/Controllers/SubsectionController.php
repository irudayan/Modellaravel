<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subsection;
use App\Models\Mainsection;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use DB;


class SubsectionController extends Controller
{
    public function subsection(Request $request)
    {

        // dd($request);

        // $hello = Subsection::all();
        // dd($hello);

        if ($request->ajax()) {
            $sub = Subsection::OrderBy('id','desc')->get();

            return Datatables::of($sub)
                    ->addIndexColumn()
                    // ->addColumn('mainsectionname', function($row){
                    //     $mainsectionname = '';
                    //     $mainsectionname =$mainsectionname.'<span data-original-title="view" >'.$row->mainsectionname.'</span>';
                    //     return $mainsectionname;
                    // })
                    ->addColumn('subsectionname', function($row){
                        $subsectionname = '';
                        $subsectionname = $subsectionname.'<span ata-original-title="view">'.$row->subsectionname.'</span>';
                        return $subsectionname;
                    })
                    ->addColumn('description', function($row){
                        $description ='';
                        $description = $description.'<span data-original-title="view" >'.$row->description.'</span>';
                        return $description;
                    })
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  
                           data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editsubSection">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  
                           data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletesubSection">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action','mainsectionname','subsectionname','description'])
                    ->make(true);

                  
        }
        $mainname= DB::table('subsections')
                    ->leftjoin('mainsection','mainsection.id','=','subsections.section_id')
                    ->select('mainsection.name')
                    ->get();

        // dd($mainname);
        // // return Response::json($subsection);
        return view('backend.include.mainsection', compact('mainname'));
    }

    public function subsectionstore(Request $request)
    {
        $subsection = Subsection::updateOrCreate(
            [
                'id' => $request->subsection_id
            ],
            [
                // 'mainsectionname' => $request->mainsectionname,
                'subsectionname' => $request->subsectionname,
                'description' => $request->description,
                'section_id' => $request->section_id
            ]
        );

        if ($subsection) {
            return response()->json(['status' => 'success', 'data' => $subsection]);
        }
        return response()->json(['status' => 'failed', 'message' => 'Failed! Section not created']);
    }


    public function subsectionedit($id)
    {
       
        $subsectionedit = Subsection::find($id);
        // dd($subsectionedit);
        return response()->json($subsectionedit);
    }

    public function subsectiondelete($id)
    {
        Subsection::find($id)->delete();

        return response()->json(['success'=>'Subsection deleted successfully.']);
    }


}