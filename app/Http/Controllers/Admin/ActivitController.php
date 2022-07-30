<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activite;
use App\Models\User;
use App\Http\Requests\ActiviteCreateRequest;
use App\Http\Requests\ActiviteUpdateRequest;
use Illuminate\Database\Eloquent\Collection;

class ActivitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities=Activite::get();
        $users=User::get();
        if(request()->get('title')){
          $activities=$activities->where('title','LIKE',"%".request()->get('title')."%");
        }
        if(request()->get('status')){
            $activities=$activities->where('status',request()->get('status'));
        }
        if(request()->get('user_id')){
          $activities=$activities->where('user_id',request()->get('user_id'));
        }

        return view('admin.activite.list',compact('activities'),compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::get();
        return view('admin.activite.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActiviteCreateRequest $request)
    {
        Activite::create($request->post());
        return redirect()->route('activities.index')->withsuccess('Aktivite başarıyla oluşturuldu');

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
        $activite=Activite::find($id) ?? abort(404,'Aktivite bulunamadı');
        $users=User::get();
        return view('admin.activite.edit',compact('activite'),compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActiviteUpdateRequest $request, $id)
    {
      $activite=Activite::find($id) ?? abort(404,'Aktivite bulunamadı');
      Activite::where('id',$id)->update($request->except(['_method','_token']));
      return redirect()->route('activities.index')->withsuccess('Aktivite güncelleme işlemi başarıyla tamamlandı');

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
      return redirect()->route('activities.index')->withsuccess('Aktivite silme işlemi başarıyla tamamlandı');
    }
}
