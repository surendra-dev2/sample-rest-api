<?php

namespace App\Http\Controllers;

use App\SampleRecord;
use App\SampleRecordLog;
use Illuminate\Http\Request;

class SampleRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = SampleRecord::all();

        $response_obj = new \stdClass();
        $response_obj->data = $records;
        return response()->json($response_obj, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response_obj = new \stdClass();
        $response_obj->status = 200;
        $count = SampleRecord::where('email', $request->email)->count();
        if ($count > 0) {
            $new_record = SampleRecord::where('email', $request->email)->firstOrFail();
            // if ('pdf/' . $new_record->pdf)
            unlink('pdf/' . $new_record->pdf);
            // if ('image/' . $new_record->image)
            unlink('image/' . $new_record->image);
        } else {

            $new_record = new SampleRecord();
            $new_record->email = $request->email;
        }


        $new_record->name = $request->name;
        $new_record->father_name = $request->father_name;
        $new_record->dob = $request->dob;
        $new_record->gender = $request->gender;
        $new_record->contact = $request->contact;

        $new_record->password = md5($request->password);
        $new_record->address = $request->address;


        if (isset($request->pdf)) {
            $file = request('pdf');
            $folder = 'pdf/';
            $info = pathinfo($folder . $file->getClientOriginalName());
            $ext = $info['extension'];
            $temp = rand() . '.' . $ext;
            $file->move($folder, $temp);
            $new_record->pdf = $temp;
        }
        if (isset($request->image)) {
            $file = request('image');
            $folder = 'image/';
            $info = pathinfo($folder . $file->getClientOriginalName());
            $ext = $info['extension'];
            $temp = rand() . '.' . $ext;
            $file->move($folder, $temp);
            $new_record->image = $temp;
        }

        if ($count > 0) {
            $new_record->save();
            $response_obj->message = 'Successfully updated';
        } else {
            $new_record->save();
            $response_obj->message = 'Successfully registered';
        }

        return response()->json($response_obj, 200);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $log = new SampleRecordLog();
        $log->email = $request->email;
        $log->tags = $request->tags;
        $log->remark = $request->remark;
        $log->save();

        $response_obj = new \stdClass();
        $response_obj->status = 200;
        $response_obj->message = 'Successfully updated';
        return response()->json($response_obj, 200);
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
