<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Particular;
use App\Remark;

class RemarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remarks = Remark::all();
        return view('pages.modules.maintenance.remarks.index', ['remarks'=>$remarks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $particulars = Particular::all();
        return view('pages.modules.maintenance.remarks.create', ['particulars'=>$particulars]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $remark = Remark::create([
            'remark' => $request->input('remark'),
            'particular_id' => $request->input('particular')
        ]);
        if($remark){
            return redirect()->route('remarks.show', $remark->id)
            ->with('success' , 'Remark created successfully.');
        }
        return back()->withInput()->with('errors', 'Error creating new remark.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $remark = Remark::find($id);
        return view('pages.modules.maintenance.remarks.show',['remark'=>$remark]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $particulars = Particular::all();
        $remark = Remark::find($id);
        return view('pages.modules.maintenance.remarks.edit',['remark'=>$remark, 'particulars'=>$particulars]);
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
        $remarkUpdate = Remark::where('id', $id)
        ->update([
            'remark'=>$request->input('remark'),
            'particular_id'=>$request->input('particular')
        ]);
        if ($remarkUpdate ) {
            return redirect()->route('remarks.show',['id'=>$id])->with('success', 'Remark updated successfully.');
        }
        return back()->withInput()->with('errors', 'Error updating remark.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findRemark = Remark::find( $id);
        if($findRemark->delete()){
            
            return redirect()->route('remarks.index')
            ->with('success' , 'Remark deleted successfully.');
        }
        return back()->withInput()->with('error' , 'Remark could not be deleted.');
    }
}
