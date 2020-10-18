<?php

namespace App\Http\Controllers;

use App\Models\Kelex_sessionbatch;
use App\Models\Kelex_class;
use Illuminate\Http\Request;
use App\Models\Kelex_fee_category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FeeCategoryRequest;
use App\Models\kelex_section;

class FeeController extends Controller
{
    public function index_feecategory()
    {   
        $getfeecat = DB::table('kelex_fee_categories')
                                ->join('kelex_sections', 'kelex_sections.Section_id', '=', 'kelex_fee_categories.SECTION_ID')
                                ->join('kelex_classes', 'kelex_classes.Class_id', '=', 'kelex_fee_categories.CLASS_ID')
                                ->select('kelex_fee_categories.*','kelex_classes.*','kelex_sections.*')
                                ->get()->toArray();
        $class= Kelex_class::all(); 
        return view('Admin.FeesManagement.add_fee')->with(['classes'=>$class,'getfeecat'=>$getfeecat]);
      
    }
    public function add_feecategory(FeeCategoryRequest $request)
    {
           $feecategory = new Kelex_fee_category();
           $feecategory->CLASS_ID=$request->input('CLASS_ID');
           $feecategory->SECTION_ID=$request->input('SECTION_ID');
           $feecategory->SHIFT=$request->input('SHIFT');
           $feecategory->CATEGORY=$request->input('CATEGORY');
           $feecategory->CAMPUS_ID= Auth::user()->CAMPUS_ID;
           $feecategory->USER_ID = Auth::user()->id;
           if ($feecategory->save()) {
                 return response()->json($feecategory);
            }
      
    }
    public function edit_feecategory(Request $request)
    {
      
        $currentFC['record']= DB::table('kelex_fee_categories')->where(['FEE_CAT_ID' => $request->feecatid])
        ->get();
        $fetchcid= $currentFC['record'][0]->CLASS_ID;
        $fetchsid= $currentFC['record'][0]->SECTION_ID;
        $currentFC['classes']= Kelex_class::all();
        $currentFC['sections']= kelex_section::where('Section_id',$fetchsid)->
        select('Section_id','Section_name')->first();
       echo json_encode($currentFC);
      
    }
    public function update_feecategory(FeeCategoryRequest $request)
    {
      
         DB::table('kelex_fee_categories')
        ->where('FEE_CAT_ID', $request->input('FEE_CAT_ID'))
        ->update(['CLASS_ID' => $request->input('CLASS_ID'),
        'SECTION_ID' => $request->input('SECTION_ID'),
        'SHIFT' => $request->input('SHIFT'),
        'CATEGORY' => $request->input('CATEGORY')
        ]);

        $selectFC= DB::table('kelex_fee_categories')->where('FEE_CAT_ID',$request->input('FEE_CAT_ID'))
        ->get();
         
        return response()->json($selectFC);
    }

    public function fee_structure()
    {
        $sessions = Kelex_sessionbatch::all();
        $getfeecat = DB::table('kelex_fee_categories')
                                ->join('kelex_sections', 'kelex_sections.Section_id', '=', 'kelex_fee_categories.SECTION_ID')
                                ->join('kelex_classes', 'kelex_classes.Class_id', '=', 'kelex_fee_categories.CLASS_ID')
                                ->select('kelex_fee_categories.*','kelex_classes.*','kelex_sections.*')
                                ->get()->toArray();
        $class= Kelex_class::all(); 
        return view('Admin.FeesManagement.fee_structure')->with(['sessions' => $sessions,'classes'=>$class,'getfeecat'=>$getfeecat]);
    }
}
