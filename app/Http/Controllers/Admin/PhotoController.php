<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Photo;
use File;
use Illuminate\Http\Request;
use Image;
use Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('admin.photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Photo $photo, Category $category)
    {



       $file = $request->file('file');

       $categoryId = $category->id;

       $path = $file->move(storage_path() . '/uploads/', $photoId = $file->getClientOriginalName());

       $extention = $file->getClientOriginalExtension();

       $photoname = $photoId;

       $photothumb = 'thumbnail-' . $photoname;

       $image = Image::make($path);
       
       $image->fit(900,600, function($c) {
           $c->upsize();
       })->encode('jpg', 75)->save();

       $folderPath = 'category/' . $categoryId;
       $newPath = $folderPath . '/' . $photoname;

       if (Storage::disk('public')->put($newPath, fopen($path, 'r+'))) {
           FIle::delete($path);
       }

       $photo->name = $file->getClientOriginalName();
       $photo->size = $file->getClientSize();
       $photo->path = $newPath;
       $photo->folder_path = $folderPath;
       $photo->category_id = $category->id;

       $photo->save();


       return response()->json([
           'id' => $photo->id,
           'size' => $file->getClientSize(),
           'name' => $file->getClientOriginalName(),
           'path' => Storage::disk('public')->url($newPath),
       ]);

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
    public function update(Request $request, Photo $photo)
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
        $photo =  Photo::find($id);

        $photo->delete();
    }
}
