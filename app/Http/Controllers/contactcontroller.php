<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class contactcontroller extends Controller
{
    public function contactform(Request $request){
      /*   DB::table('contact_one')->insert([
            'contact_name' => $request->input('contact_name'),
            'contact_email' => $request->input('contact_email'),
            'contact_phone' => $request->input('contact_phone'),
            'contact_massage' => $request->input('contact_massage')
        ]); */
        $data = $request->input();
        unset($data["_token"]);
        DB::table('contact_one')->insert($data);
        return ( $data);
    }

    public function show(){

        // first way to see All data
        // $data = DB::table("contact_one")->get();

        // second way to see All data
        $data = DB::select('select * from contact_one');

        return view('contactlist')->with('data',$data);
    }

    public function Edit($contact_id){
        // $data = DB::select('select * from contact_one where contact_id = ?', [$contact_id]);

        // return view('updated')->with('data',$data);

        $data = DB::select('select * from contact_one where contact_id = ?',[$contact_id]);
        return view('update',['data'=>$data]);
    }

    public function update(Request $request, $contact_id){
        // $contact_name = $contact_name->input('contact_name');
        // $data = DB::update('update contact_one set contact_name = ? where contact_id = ?',[$contact_name,$contact_id]);

        $contact_name = $request->input('contact_name');
        $contact_email = $request->input('contact_email');
        $contact_phone = $request->input('contact_phone');
        $contact_massage = $request->input('contact_massage');
        DB::update('update contact_one set contact_name = ?, contact_email = ?, contact_phone = ?, contact_massage = ? where contact_id = ?',[$contact_name,$contact_email,$contact_phone,$contact_massage,$contact_id]);
        echo "Record updated successfully.<br/>";
        echo '<a href = "/edit-records">Click Here</a> to go back.';
    }

    public function delete($contact_id){
        DB::delete('delete from contact_one where contact_id = ?',[$contact_id]);
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/delete-records">Click Here</a> to go back.';
    }

    // public function Updated(Request $request, $contact_id){
    //     $data = DB::table('contact_one')->find($contact_id);

    //     $data->contact_name = $request->input('contact_name');
    //     $data->contact_email = $request->input('contact_email');
    //     $data->contact_phone = $request->input('contact_phone');
    //     $data->contact_massage = $request->input('contact_massage');
    //     $data->update();
    //     return redirect()->back()->with('status','Student Updated Successfully');
    // }
}

