<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index()
    {
        $developers = Developer::latest()->paginate(5);
        return view('developers.index',compact('developers'))
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    public function create(){
        return view('developers.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'salary'=>'integer',
            'address'=>'required',
        ]);

        
        Developer::create($request->all());
        return redirect()->route('developers.index')
            ->with('success','Developers created successfully.');
    }

    public function show(Developer $developer){
        return view('developers.show',compact('developer'));
    }

    public function edit(Developer $developer){
        return view('developers.edit',compact('developer'));
    }

    public function update(Request $request, Developer $developer){
        $request->validate([

        ]);
        $developer->update($request->all());
        return redirect()->route('developers.index')
            ->with('success','Developer update successfully');
    }

    public function destroy(Developer $developer){
        $developer->delete();
        return redirect()->route('developers.index')
            ->with('success','Developer delete successfully');
    }

}
