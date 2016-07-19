<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Customer_controller extends Controller
{

    public function add_new_cust_details(Request $request)
    {
        $company_name = $request->input('company_name');
        $address = $request->input('address');
        $brN = $request->input('brN');
        $website = $request->input('website');

           $query = DB::table('customer_tbl')->insertGetId(
                ['company_name' => $company_name, 'address' =>$address, 'busi_reg_num' => $brN, 'website' =>$website , 'flag'=> 1]
            );

        return json_encode($query);
    }

    public function load_all_cust(){
        $cust = DB::table('customer_tbl')
            ->where('flag', '=', 1)
            ->get();
        return json_encode($cust);
    }

    public function remove_customer(Request $request){

        $id = $request->input('id');
        $query = DB::table('customer_tbl')
            ->where('id',$id)
            ->update(['flag' => 0]);

        return json_encode($query);
    }

    public function edit_customer(Request $request){

        $id = $request->input('id');
        $company_name = $request->input('company_name');
        $address = $request->input('address');
        $brN = $request->input('brN');
        $website = $request->input('website');

        $query = DB::table('customer_tbl')
            ->where('id',$id)
            ->update(['company_name' => $company_name ,'address' => $address,'busi_reg_num' => $brN,'website' => $website ]);

        return json_encode($query);

    }


    public function get_cust_details(Request $request){

        $id = $request->input('id');
        $cust = DB::table('customer_tbl')
            ->where('id', '=', $id)
            ->get();
        return json_encode($cust);
    }

    public function get_all_cust_list_sel_2(Request $request){

        $search = strip_tags(trim($request->input('q')));

        $cust = DB::table('customer_tbl')
            ->where('company_name', 'LIKE', '%' . $search . '%')
            ->where('flag', '=', '1')
            ->get();
        $cust = json_decode(json_encode($cust), true);
        if(count($cust) > 0){
            foreach ($cust as $c => $value) {
                $data[] = array('id' => $value['id'], 'text' => $value['company_name']);
            }
        } else {
            $data[] = array('id' => '0', 'text' => 'No Product Found');
        }

        return $data;

    }
}
