<?php

namespace App\Http\Controllers;

use App\Models\TransitionHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransitionHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $response = Http::get('http://forex.cbm.gov.mm/api/latest');
            if ($response->successful()) {
                $data = $response->json();
                $usdToMmkRate = $data['rates']['USD'] ?? 'Rate not available';
            } else {
                return response()->json(['error' => 'Failed to fetch data'], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        $user = auth()->user();
        return view('platform', [
            'user' => $user,
            'usdToMmkRate' => $usdToMmkRate,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function history()
    {
        $transitionHistory = TransitionHistory::latest('id')->get();
        return view('page.transition-history', ['transitionHistory' => $transitionHistory]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.transfer');
    }

    public function findPhone(Request $request)
    {
        $phone = $request->phone;
        info($request);
        $user = User::where('phone', $phone)->first();
        info($user);
        if ($user) {
            return response()->json([
                'user' => $user,
            ], 200);
        } else {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        info($request);
        $transition = TransitionHistory::create([
            'user_id' => auth()->user()->id,
            'from' => auth()->user()->id,
            'to' => $request->userId,
            'amount' => $request->amount,
            'note' => $request->note,
        ]);
        info($transition);
        return response()->json([
            'message' => 'Success Transition',
        ], 200);
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
