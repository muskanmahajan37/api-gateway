<?php


namespace App\Http\Controllers\Profile;


use App\Certification;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


class CertificationController extends Controller
{
    public function store(Request $request){
        $data = $this->validate($request, [
            'name' => 'required',
            'user_id'=>'required'
        ]);
        $certification = new Certification([
            'name'=> $request->name,
            'user_id'=>$request->user_id,
        ]);
        $certification->save();
        return response()->json([
            'message'=>'Successfully added new Certificate!',
            'Certificate'=> $certification
        ],201);
    }
    public function update(Request $request, Certification $certification)
    {
        $this->validate($request, [
            'name' => 'string',
        ]);
        $cUpdate = $certification;
        $cUpdate->name = empty($request->name) ? $certification->name : $request->name;
        $cUpdate->user_id =  empty($request->user_id) ? $certification->user_id : $request->user_id;

        $cUpdate->update();
        return response()->json([
            'message' => 'Updated certification!',
            'certification' => $cUpdate
        ], 201);
    }
    public function index()
    {
        $certification = Certification::all();
        return response()->json(
            $certification,
            201);
    }
    public function show(Certification $certification){
        return $certification;
    }

    public function destroy(Certification $certification)
    {
        $certification->delete();
        return response()->json([
            'message' => 'Successfully deleted certificate!'], 201);
    }
    public function findByUser(User $user){
        $certifications=$user->load("certifications");
        return $certifications->certifications;
    }

}