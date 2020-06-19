<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Skill;
use App\User;
use Illuminate\Http\Request;


class SkillController extends Controller
{
    public function store(Request $request){
        $data = $this->validate($request, [
            'name' => 'required',
            'user_id'=>'required'
        ]);
        $skill = new Skill([
            'name'=> $request->name,
            'user_id'=>$request->user_id,
        ]);
        $skill->save();
        return response()->json([
            'message'=>'Successfully added new Skill!',
            'Skill'=> $skill
        ],200);
    }
    public function update(Request $request, Skill $skill)
    {
        $this->validate($request, [
            'name' => 'string',
        ]);
        $skillToUpdate = $skill;
        $skillToUpdate->name = empty($request->name) ? $skill->name : $request->name;
        $skillToUpdate->user_id =  empty($request->user_id) ? $skill->user_id : $request->user_id;

        $skillToUpdate->update();
        return response()->json([
            'message' => 'Updated!',
            'skill' => $skillToUpdate
        ], 201);
    }

    public function index()
    {
        $skills = Skill::all();
        return response()->json(
            $skills,
            201);
    }
    public function show(Skill $skill){
        return $skill;
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json([
            'message' => 'Successfully deleted skill!'], 200);
    }
    public function findByUser(User $user){
        $skills=$user->load("skills");
        return $skills->skills;
    }

}