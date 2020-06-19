<?php


namespace App\Http\Controllers\Profile;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Education;



class EducationController extends Controller
{
    public function store(Request $request){
        $data = $this->validate($request, [
            'name' => 'required',
            'user_id'=>'required'
        ]);
        $education = new Education([
            'name'=> $request->name,
            'user_id'=>$request->user_id,
        ]);
        $education->save();
        return response()->json([
            'message'=>'Successfully added new Education!',
            'Education'=> $education
        ],201);
    }
    public function update(Request $request, Education $education)
    {
        $this->validate($request, [
            'name' => 'string',
        ]);
        $eupdate = $education;
        $eupdate->name = empty($request->name) ? $education->name : $request->name;
        $eupdate->user_id =  empty($request->user_id) ? $education->user_id : $request->user_id;

        $eupdate->update();
        return response()->json([
            'message' => 'Updated education!',
            'education' => $eupdate
        ], 201);
    }
    public function index()
    {
        $education = Education::all();
        return response()->json(
            $education,
            201);
    }
    public function show(Education $education){
        return $education;
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return response()->json([
            'message' => 'Successfully deleted education!'], 201);
    }
    public function findByUser(User $user){
        $educations=$user->load("educations");
        return $educations->educations;
    }
}