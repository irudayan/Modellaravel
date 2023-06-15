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
//     public function subsection(Request $request)
//     {
//         if ($request->ajax()) {
//             $sub = Subsection::OrderBy('id','desc')->get();
//             $mainname= DB::table('subsections')
//             ->leftjoin('mainsection','mainsection.id','=','subsections.section_id')
//             ->select('mainsection.name')
//             ->get();
// // dd($mainname);


//             return Datatables::of($sub)
//                     ->addIndexColumn()
//                     // ->addColumn('name', function($row){
//                     //     $name = '';
//                     //     $name =$name.'<span data-original-title="view" >'.$row->name.'</span>';
//                     //     return $name;
//                     // })
//                     ->addColumn('subsectionname', function($row){
//                         $subsectionname = '';
//                         $subsectionname = $subsectionname.'<span ata-original-title="view">'.$row->subsectionname.'</span>';
//                         return $subsectionname;
//                     })
//                     ->addColumn('description', function($row){
//                         $subdescription ='';
//                         $subdescription = $subdescription.'<span data-original-title="view" >'.$row->subdescription.'</span>';
//                         return $subdescription;
//                     })
//                     ->addColumn('action', function($row){
   
//                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  
//                            data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editsubSection">
//                            <i class="fas fa-edit"></i></a>';
   
//                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  
//                            data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletesubSection">
//                            <i class="fas fa-trash" ></i></a>';
    
//                             return $btn;
//                     })
//                     ->rawColumns(['action','mainname','subsectionname','description'])
//                     ->make(true);

                 
                  
//         }
      
//                     return Response::json(['mainname' => $mainname]);

// //    return response()
// //     ->json($sub)
// //     ->view('backend.include.mainsection', compact('mainname'));

     
//     //    return Response::json($mainname);
//         // return view('backend.include.mainsection', compact('mainname'));
//     }


    public function subsection(Request $request)
{
    if ($request->ajax()) {
        $sub = Subsection::OrderBy('id', 'desc')->get();

        $mainname = DB::table('subsections')
            ->leftjoin('mainsection', 'mainsection.id', '=', 'subsections.section_id')
            ->select('mainsection.name')
            ->get();

            $name = $mainname[0]->name;

        return Datatables::of($sub)
            ->addIndexColumn()
            ->addColumn('subsectionname', function ($row) {
                $subsectionname = '';
                $subsectionname = $subsectionname . '<span ata-original-title="view">' . $row->subsectionname . '</span>';
                return $subsectionname;
            })
            ->addColumn('description', function ($row) {
                $subdescription = '';
                $subdescription = $subdescription . '<span data-original-title="view" >' . $row->subdescription . '</span>';
                return $subdescription;
            })
            ->addColumn('action', function ($row) {

                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  
                           data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editsubSection">
                           <i class="fas fa-edit"></i></a>';

                $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  
                           data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletesubSection">
                           <i class="fas fa-trash" ></i></a>';

                return $btn;
            })
            ->rawColumns(['action', 'name', 'subsectionname', 'description'])
            ->make(true);
    }

    return Response::json(['name' => $name]);
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
                'subdescription' => $request->subdescription,
                'section_id' => $request->section_id
            ]
        );
        // dd($subsection);

        if ($subsection) {
            return response()->json(['status' => 'success', 'data' => $subsection]);
        }
        return response()->json(['status' => 'failed', 'message' => 'Failed! Section not created']);
    }


    public function subsectionedit($id)
    {
       
        $subsectionedit = Subsection::find($id);
        
        return response()->json($subsectionedit);
    }

    public function subsectiondelete($id)
    {
        Subsection::find($id)->delete();

        return response()->json(['success'=>'Subsection deleted successfully.']);
    }


}
