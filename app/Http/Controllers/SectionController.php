<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mainsection;
use App\Models\Subsection;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SectionController extends Controller
{
    public function index(Request $request)
    {
         
        if ($request->ajax()) {
  
            $data = Mainsection::OrderBy('id','desc')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                        $name = '';
                        $name =$name.'<span data-original-title="view" >'.$row->name.'</span>';
                        return $name;
                    })
                    ->addColumn('description', function($row){
                        $description ='';
                        $description = $description.'<span data-original-title="view" >'.$row->description.'</span>';
                        return $description;
                    })
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  
                           data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editSection">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  
                           data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteSection">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action','name','description'])
                    ->make(true);

                  
        }
        $selectsection = Mainsection::OrderBy('id','desc')->get();
// dd($selectsection);
        return view('backend.include.mainsection',compact('selectsection'));
    }

    // public function sectionstore(Request $request)
    // {

    //     $main = Mainsection::updateOrCreate(
    //         [
    //             'id' => $request->section_id
    //         ],
    //         [
    //             'name' => $request->name,
    //             'description' => $request->description
    //         ]
    //     );

    //     $data = $request->get('name');
    //     $existingData = Mainsection::where('name', $data)->exists();
    //     dd($existingData);
       
    //         return response()->json(['status' => $existingData['name'].' Already Set!']);
    //     }
    //     dd($existingData);

    //     if ($main) {
    //         return response()->json(['status' => 'success', 'data' => $main]);
    //     }
    //     return response()->json(['status' => 'failed', 'message' => 'Failed! Section not created']);
    // }

    public function sectionstore(Request $request)
{
    $data = $request->only('name', 'description');
    $name = Mainsection::where('name', $data['name'])->exists();

    if ($name) {
        return response()->json(['status' => $data['name'].' Already Exists!']);
        // return response()->json(['stsatus' => 'wrong' , 'data'=> $data['name']]);
    }

    $main = Mainsection::updateOrCreate(['id' => $request->section_id], $data);

    if ($main) {
        return response()->json(['status' => 'success', 'data' => $main]);
    }
    dd($main);
    return response()->json(['status' => 'failed', 'message' => 'Failed! Section not created']);
}

    


    // public function checkDuplicateData(Request $request)
    // {
    //     $data = $request->get('data'); // Assuming 'data' is the key sent via AJAX
    
    //     // Check if the data already exists in the database
    //     $existingData = YourModel::where('column', $data)->exists();
    
    //     return response()->json(['exists' => $existingData]);
    // }
    






    public function sectionedit($id)
    {
       
        $sectionedit = Mainsection::find($id);
        return response()->json($sectionedit);
    }

    public function sectiondelete($id)
    {
        Mainsection::find($id)->delete();
      
        return response()->json(['success'=>'Mainsection deleted successfully.']);
    }

    public function mainsectionshow(Request $request)
    {

        $val = $request->input('val');

        $main = Mainsection::all();
        if ($main) {
            return response()->json(['status' => 'success', 'data' => $main]);
        }
        return response()->json(['status' => 'failed', 'message' => 'No section found']);
    }



}
