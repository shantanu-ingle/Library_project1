<?php

// app/Http/Controllers/ReviewController.php
// app/Http/Controllers/ReviewController.php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Http\Response; 
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View 
    {
        return view('reviews.index', [
            'reviews' => Review::with('user')->latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'message' => 'required|string|max:255',
            
        ]);
    
        $user = auth()->user(); // Get the authenticated user
        $user->reviews()->create([
            'message' => $request->input('message'),
            
        ]);
    
        return redirect(route('reviews.index'));
    }
    
    


    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review): View
    {
        //
        $this->authorize('update', $review);
 
        return view('reviews.edit', [
            'reviews' => $review,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review): RedirectResponse
    {
        //
        $this->authorize('update', $review);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $review->update($validated);
 
        return redirect(route('reviews.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review): RedirectResponse
    {
        //
        $this->authorize('delete', $review);
 
        $review->delete();
 
        return redirect(route('reviews.index'));
    }
}