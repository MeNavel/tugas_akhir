<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predict;

class PredictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $predicts = Predict::latest()->paginate(5);
        return view('predict.index',compact('predicts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('predict.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'status' => 'required',
        ]);
        Predict::create($request->all());
        return redirect()->route('predict.index')->with('success', 'Data Prediksi Berhasil Dimasukkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Predict $predict)
    {
        return view('predict.show', compact('predict'));
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
        $id=Predict::find($id);
        $id->delete();
        return redirect()->route('predict.index')->with('success', 'Data Prediksi Berhasil Dihapus');
        // return back()->with('success',' Penghapusan berhasil.');
    }
}
