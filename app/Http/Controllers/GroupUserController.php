<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use Illuminate\Http\Request;
class GroupUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:list|create|edit|delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:create', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        //
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
        //
        $this->validate($request, [
            'users' => 'required',
        ]);
        $input = $request->all();
        $group = Group::find($input['group_id']);
        foreach($input['users'] as $username){
            $user = User::where('name', $username)->first();
            $groupUser = GroupUser::create([
                'user_id'=> $user->id,
                'group_id'=> $input['group_id']
            ]);
        }
        return redirect()->route('group.show', $input['group_id'])
                        ->with('success','Ajout effectué avec succès !');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function show(GroupUser $groupUser)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupUser $groupUser)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupUser $groupUser)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groupUser = GroupUser::Where('user_id', $id)->first();
        $groupUser->delete();
        // print($id);
        return redirect()->route('group.show', $groupUser->group_id)
                        ->with('success','Utilisateur retiré avec succès');
        // print($groupUser->groups_id);
        // return back();
    }
}