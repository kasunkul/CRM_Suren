<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Contact_controller extends Controller
{

    public function save_cust_contact(Request $request)
    {
        $company_name_id = $request->input('company_name_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $contact = $request->input('contact');

        $query = DB::table('contacts_tbl')->insertGetId(
            ['customer_id' => $company_name_id, 'name' =>$name, 'email' => $email, 'contact' =>$contact , 'flag'=> 1]
        );

        return json_encode($query);
    }
    public function get_all_cont(Request $request){
     $company_name_id = $request->input('company_name_id');
        $cont = DB::table('contacts_tbl')
            ->where('flag', '=', 1)
            ->where('customer_id', '=', $company_name_id)
            ->get();
        return json_encode($cont);

    }

    public function remove_contact(Request $request){

        $id = $request->input('id');
        $query = DB::table('contacts_tbl')
            ->where('id',$id)
            ->update(['flag' => 0]);

        return json_encode($query);
    }

    public function get_contact_detail(Request $request){

        $id = $request->input('id');
        $cont = DB::table('contacts_tbl')
            ->where('id', '=', $id)
            ->get();
        return json_encode($cont);
    }

    public function save_edit_contact(Request $request){

        $id = $request->input('id');

        $name = $request->input('name');
        $email = $request->input('email');
        $contact = $request->input('contact');

        $query = DB::table('contacts_tbl')
            ->where('id',$id)
            ->update(['name' => $name ,'email' => $email,'contact' => $contact]);

        return json_encode($query);

    }

}
