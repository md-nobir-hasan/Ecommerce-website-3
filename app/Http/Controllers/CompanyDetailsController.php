<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyInfo;
use App\CompanyContact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class CompanyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company_details.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       echo 'ok';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'title' => 'required|string',
            'logo' => 'required|img|mines:png,jpg',
            'address' => 'required',
            'phone' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'facebook_page_link' => 'nullable|url',
            'facebook_group_link' => 'nullable|url'
        ];
        // $message =[
        //     'required'=> ':attribute is required'
        //     'unique'
        // ];
// $request->validate($rules);
        Validator::make($request->all(),$rules);
        // Save Company Information
        $insert = new CompanyInfo;
        $insert->name = $request->name;
        $insert->title = $request->title;

        if($request->file('logo')){
            $file= $request->file('logo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/product'), $filename);
           $insert->logo= $filename;
        }
        // $insert->logo = $request->logo;
        $insert->address = $request->address;
        $insert->save();

        // Save Company Contact Information
        $insertContactInfo = new CompanyContact;
        $insertContactInfo->phone = $request->phone;
        $insertContactInfo->whatsapp = $request->whatsapp;
        $insertContactInfo->facebook_page_link = $request->facebook_page_link;
        $insertContactInfo->facebook_group_link = $request->facebook_group_link;
        $insertContactInfo->save();
        return redirect()->route('home')->with('msg','<script> alert("Successfully Set your website setting");</script>');
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
    public function update(Request $request, $id)
    {
        //
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
