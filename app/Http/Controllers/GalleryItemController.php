<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGalleryItemRequest;
use App\Http\Requests\UpdateGalleryItemRequest;
use App\Models\GalleryItem;

class GalleryItemController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGalleryItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GalleryItem  $galleryItem
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryItem $galleryItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GalleryItem  $galleryItem
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryItem $galleryItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGalleryItemRequest  $request
     * @param  \App\Models\GalleryItem  $galleryItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryItemRequest $request, GalleryItem $galleryItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GalleryItem  $galleryItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryItem $galleryItem)
    {
        //
    }
}
