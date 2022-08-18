<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Author::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Author::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Author::where('id',$id)->exists()){
            $author=Author::find($id);
            return $author;
        }else {
            return response()->json(["message"=>" Author not found"],404);
        }
        
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
        if(Author::where('id',$id)->exists()){
            $author=Author::find($id);
            $author->nom_prenom=$request->nom_prenom;
            $author->sexe=$request->sexe;
            $author->date_naissance=$request->date_naissance;
            $author->nationalite=$request->nationalite;
           $author->save();
           return response()->json(["message"=>" Author updated successfuly"],200);
        }else {
            return response()->json(["message"=>" Author not found"],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Author::where('id',$id)->exists()){
            $author=Author::find($id);
            $author->delete();
            return response()->json(["message"=>" Author deletes successfuly"],202);
        }else {
            return response()->json(["message"=>" Author not found"],404);
        }
    }
}
