<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activite;
use App\Models\User;
use App\Http\Requests\ActiviteCreateRequest;
use App\Http\Requests\ActiviteUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Auth\AuthServiceProvioder;
use DB;

class Maincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(){
       return view('dashboard');
    }
    public function index()
    {
      $activity=DB::table('activities')->where('user_id',auth()->user()->id)->get();
      if(request()->get('title')){
        $activity=$activitiy->where('title','LIKE',"%".request()->get('title')."%");
      }
      if(request()->get('status')){
          $activity=$activitiy->where('status',request()->get('status'));
      }
      return view('user.list',compact('activity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        DB::table('activities')->insert([
          "title"=>$request->title,
          "description"=>$request->description,
          "user_id"=>auth()->user()->id,
          "started_at"=>$request->started_at,
          "finished_at"=>$request->finished_at
        ]);
        return redirect()->route('myactivities.index')->withsuccess('Aktivite başarıyla oluşturuldu');
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
      $activity=DB::table('activities')->where('id',$id)->first();
      return view('user.edit',compact('activity'));
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
      $activite=Activite::find($id) ?? abort(404,'Aktivite bulunamadı');
      Activite::where('id',$id)->update($request->except(['_method','_token']));
      return redirect()->route('myactivities.index')->withsuccess('Aktivite güncelleme işlemi başarıyla tamamlandı');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $activite=Activite::find($id) ?? abort(404,'Aktivite bulunamadı');
      $activite->delete();
      return redirect()->route('myactivities.index')->withsuccess('Aktivite silme işlemi başarıyla tamamlandı');
    }
}
