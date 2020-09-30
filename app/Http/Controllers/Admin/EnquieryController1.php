<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User;
use App\Enquiery;
use DB;

class EnquieryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


            $data = DB::table('enquieries')
             ->join('users', 'enquieries.assign_to', '=', 'users.id')
             ->select('enquieries.*', 'users.name')
             ->where('enquiery_status', 1)
             ->get();

             return view('admin.enquiery.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        $data =User::where('user_delete_status', 1)->get();
        $page_data['data']=$data;
        $page_data['title']="Create Vendor";
        $page_data['role']=3;

        return view('admin.enquiery.create',compact('page_data'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //dd($request->all());




          $request->validate([

        'full_name'=>'required|max:300',
        'contact_number'=>'required|max:15|min:5',
        'address'=>'required|max:300',
        'postcode'=>'required|max:300',
        'assign_to'=>'required|max:300',
        
    ]);
    
            $invoice_prefix="ENQ-N";
            $invoice = Enquiery::select('id', 'enqid')->orderBy('id', 'desc')->first();
            
            if($invoice){
                $previous_invoice_no = $invoice->enqid;
                $unique_id = substr($previous_invoice_no, 5);
                $new_no = (int)$unique_id+1;
            }else{
                $new_no = 0001; // Starting No When No Data is Present
            }
            
            $test= $invoice_prefix.str_pad($new_no, 4, '0', STR_PAD_LEFT);
            
            $enquiery = new Enquiery();
            $enquiery->enqid = $test;
            $enquiery->full_name = $request->full_name;
            $enquiery->contact_number = $request->contact_number;
            $enquiery->address = $request->address;
            $enquiery->postcode = $request->postcode;
            $enquiery->assign_to = $request->assign_to;
            // dd($enquiery);
            $enquiery->save();

            return redirect()->route('enquiery.index')->with('message','succesfully created your field');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiery $enquiery)
    {
        




        $assign_to = $enquiery->assign_to;
      
        $page_data['assign_to'] =  $assign_to;
        $page_data['enquiery'] = $enquiery;
       // $data=User::all();
         $data =User::where('user_delete_status', 1)->get();
        $page_data['data'] = $data;

        return view('admin.enquiery.edit', compact('page_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiery $enquiery)
    {
        //



          $enquiery_update = $enquiery->update($request->toArray());
        if ($enquiery_update) {

            if (isset($request->enquiery_status) and $request->enquiery_status == '0') {
                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Deleted');
                Session::flash('toastcontent', 'Enquiery  Details Deleted  Successfully');
            } else {

                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Success');
                Session::flash('toastcontent', 'Enquiery  Details updated Successfully');
            }
        } else {
            Session::flash('toasttype', 'error');
            Session::flash('toasttitle', 'Error');
            Session::flash('toastcontent', 'Enquiery  Details Not Updated');
        }

       
        
       
        return redirect()->route('enquiery.index');
    }

    public function assign()
    {
        



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
