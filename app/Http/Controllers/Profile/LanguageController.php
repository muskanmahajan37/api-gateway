<?php


namespace App\Http\Controllers\Profile;


use App\Http\Controllers\Controller;
use App\Language;
use App\User;
use Illuminate\Http\Request;


class LanguageController extends Controller
{
    public function store(Request $request){
        $data = $this->validate($request, [
            'name' => 'required',
            'user_id'=>'required'
        ]);
        $language = new Language([
            'name'=> $request->name,
            'user_id'=>$request->user_id,
        ]);
        $language->save();
        return response()->json([
            'message'=>'Successfully added new Language!',
            'Language'=> $language
        ],201);
    }
    public function update(Request $request, Language $language)
    {
        $this->validate($request, [
            'name' => 'string',
        ]);
        $lUpdate = $language;
        $lUpdate->name = empty($request->name) ? $language->name : $request->name;
        $lUpdate->user_id =  empty($request->user_id) ? $language->user_id : $request->user_id;

        $lUpdate->update();
        return response()->json([
            'message' => 'Updated language!',
            'language' => $lUpdate
        ], 201);
    }
    public function index()
    {
        $language = Language::all();
        return response()->json(
            $language,
            201);
    }
    public function show(Language $language){
        return $language;
    }

    public function destroy(Language $language)
    {
        $language->delete();
        return response()->json([
            'message' => 'Successfully deleted language!'], 201);
    }
    public function findByUser(User $user){
        $languages=$user->load("languages");
        return $languages->languages;
    }
}