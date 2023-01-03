<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    
public function index(Request $request)
    {
        $data = Group::all();
        return view('groups.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
    
        $input = $request->all();
    
        $group = new Group();
        $group->name = $input['name'];
        $group->save();
    
        return redirect()->route('group.index')
                        ->with('success','Group created successfully');
    }
/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);
        $ids = [];

        foreach($group->users as $user){
            $ids[] = $user->id;
        }
        $usersId = User::all()->pluck('id', 'id')->toArray();
        $usersIdNotExists = array_diff($usersId, $ids);
        $usersIdNotExistsName = array();
        foreach($usersIdNotExists as $value){
            $user = User::where('id',$value)->first();
            $usersIdNotExistsName[] = $user->name;
        }
        return view('groups.modal.show',compact('group', 'usersIdNotExistsName'));
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
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