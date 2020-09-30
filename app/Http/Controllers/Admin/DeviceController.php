<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Device;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // return "hiii";

         $data= Device::where('device_status', 1)->get();
          return view('admin.device.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          return view('admin.device.create');
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

       // dd($request->all());


          $request->validate([

        'device'=>'required|max:300',
        'type'=>'required|max:300',
        'device_id'=>'required|max:300',
        'serial_number'=>'required|max:300',
        'model'=>'required|max:300',
        'district'=>'required|max:300',
        'lco_id'=>'required|max:300',

          ]);
       

        $device = new Device();
        $device->device = $request->device;
        $device->type = $request->type;
        $device->device_id = $request->device_id;
        $device->serial_number = $request->serial_number;
        $device->model = $request->model;
        $device->district = $request->district;
        $device->lco_id = $request->lco_id;

        $device->save();

         return redirect()->route('device.index')->with('message','succesfully created your field');


       
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
    public function edit(Device $device)
    {
        //

         $page_data['device'] = $device;
      

        return view('admin.device.edit', compact('page_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        //




             $device_update = $device->update($request->toArray());
        if ( $device_update) {

            if (isset($request->device_status) and $request->device_status == '0') {
                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Deleted');
                Session::flash('toastcontent', 'Device  Details Deleted  Successfully');
            } else {

                Session::flash('toasttype', 'success');
                Session::flash('toasttitle', 'Success');
                Session::flash('toastcontent', 'Device  Details updated Successfully');
            }
        } else {
            Session::flash('toasttype', 'error');
            Session::flash('toasttitle', 'Error');
            Session::flash('toastcontent', 'Device  Details Not Updated');
        }

       
        
       
        return redirect()->route('device.index');
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
