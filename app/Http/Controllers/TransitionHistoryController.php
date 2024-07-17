<?php

namespace App\Http\Controllers;

use App\Models\TransitionHistory;
use Illuminate\Http\Request;

class TransitionHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.transfer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TransitionHistory $transitionHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransitionHistory $transitionHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransitionHistory $transitionHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransitionHistory $transitionHistory)
    {
        //
    }
}