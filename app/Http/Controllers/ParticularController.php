<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Particular;

class ParticularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $particulars = Particular::all();
        return view('pages.modules.maintenance.particulars.index', ['particulars'=>$particulars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.modules.maintenance.particulars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $particular = Particular::create([
            'particular' => $request->input('particular'),
            'account_code' => $request->input('account_code')
        ]);
        if($particular){
            return redirect()->route('particulars.show', $particular->id)
            ->with('success' , 'Particular created successfully.');
        }
        return back()->withInput()->with('errors', 'Error creating new particular.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $particular = Particular::find($id);
        return view('pages.modules.maintenance.particulars.show',['particular'=>$particular]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $particular = Particular::find($id);
        return view('pages.modules.maintenance.particulars.edit',['particular'=>$particular]);
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
        $particularUpdate = Particular::where('id', $id)
        ->update([
            'particular'=>$request->input('particular'),
            'account_code'=>$request->input('account_code')
        ]);
        if ($particularUpdate ) {
            return redirect()->route('particulars.show',['id'=>$id])->with('success', 'Particular updated successfully.');
        }
        return back()->withInput()->with('errors', 'Error updating particular.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findParticular = Particular::find( $id);
        if($findParticular->delete()){
            
            return redirect()->route('particulars.index')
            ->with('success' , 'Particular deleted successfully.');
        }
        return back()->withInput()->with('error' , 'Particular could not be deleted.');
    }
}
