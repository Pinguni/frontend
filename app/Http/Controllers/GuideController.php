<?php

namespace App\Http\Controllers;

use Cache;
use Help;
use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guides.index', [
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guides.create', [
            'action' => 'guides.store',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guide = new Guide;

        $guide->title       = $request->title;
        $guide->slug        = $request->slug;
        $guide->authors     = 'cathzchen';            // temporary fill
        $guide->cover_image = $request->cover_image;
        $guide->excerpt     = $request->excerpt;
        $guide->content     = $request->content;
        $guide->topics      = $request->topics;
        $guide->tags        = $request->tags;
        $guide->type        = $request->type;
        $guide->status      = $request->status;
        $guide->save();

        return redirect()->route('guides.show', [
            'id' => $guide->id,
            'slug' => $guide->slug,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug)
    {
        $cacheKey = 'guides.' . $id;

        $guide = Cache::remember($cacheKey, now()->addHours(24), function() use($id) {
            return Guide::find($id);
        });

        return view('guides.guide', [
            'guide' => $guide,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {
        //
    }
}
