<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Activity_controller extends Controller
{

    public function save_activity_contact(Request $request)
    {
        $company_name_id = $request->input('company_name_id');

        $date = $request->input('date');
        $activity_type = $request->input('activity_type');
        $outcome = $request->input('outcome');
        $sales_per = $request->input('sales_per');

        $query = DB::table('activity_tbl')->insertGetId(
            ['customer_id' => $company_name_id, 'date' =>$date, 'outcome' => $outcome, 'type' =>$activity_type , 'sales_person' =>$sales_per ,'flag'=> 1]
        );

        return json_encode($query);
    }
    public function get_all_activity(Request $request){
        $company_name_id = $request->input('company_name_id');
        $cont = DB::table('activity_tbl')
            ->where('flag', '=', 1)
            ->where('customer_id', '=', $company_name_id)
            ->get();
        return json_encode($cont);

    }

    public function remove_activity(Request $request){

        $id = $request->input('id');
        $query = DB::table('activity_tbl')
            ->where('id',$id)
            ->update(['flag' => 0]);

        return json_encode($query);
    }

    public function get_activity_detail(Request $request){

        $id = $request->input('id');
        $cont = DB::table('activity_tbl')
            ->where('id', '=', $id)
            ->get();
        return json_encode($cont);
    }

    public function save_edit_activity(Request $request){

        $id = $request->input('id');
        $date = $request->input('date_edit');
        $activity_type = $request->input('activity_type_edit');
        $outcome = $request->input('outcome_edit');
        $sales_per = $request->input('sales_per_edit');


        $query = DB::table('activity_tbl')
            ->where('id',$id)
            ->update(['date' => $date ,'type' => $activity_type,'outcome' => $outcome,'sales_person' => $sales_per]);

        return json_encode($query);

    }

}
