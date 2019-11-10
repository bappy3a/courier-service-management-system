<?php

namespace App\Http\Controllers;

use App\Media;
use Alert;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Alert::message('Your profile is up to date', 'Wonderful!');
        $medias = Media::latest()->paginate(20);
        return view('media.index',compact('medias'));
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
        foreach ($request->file('photo') as  $photo) {
            $post = new Media();
            $post->photo = "photo";
            $post->save();

            $lastId = $post->id;
            $prictureInfo = $photo;
            $picName = $lastId.$prictureInfo->getClientOriginalName();
                                              
            $folder = "Media/";
            $prictureInfo->move($folder,$picName);
            $picUrl = $folder.$picName;
            $productPic = Media::find($lastId);
            $productPic->photo = $picUrl;
            $productPic->save();
        };

        Alert::success('Success Message', 'Media Upload Successful !!');
        return back();
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
