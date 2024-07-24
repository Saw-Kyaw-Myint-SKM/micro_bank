<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAmountRequest;
use App\Mail\TransitionMail;
use App\Models\TransitionHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
        $transitionHistories = TransitionHistory::where('from', auth()->user()->id)
            ->orWhere('to', auth()->user()->id)
            ->with(['fromUser', 'toUser'])
            ->latest('id')
            ->get();
        // dd($transitionHistories->toArray());
        return view('page.transition-history', ['transitionHistories' => $transitionHistories]);
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
        // Define the validation rules
        $rules = [
            'phone' => ['required', 'numeric', 'regex:/^09\d{9}$/'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $phone = $request->phone;
        $user = User::where('phone', $phone)->first();
        if (!$user) {
            return response()->json([
                'errors' => [
                    'phone' => 'User not found',
                ],
            ], 422);
        }
        return response()->json([
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAmountRequest $request)
    {
        $transition = TransitionHistory::create([
            'user_id' => auth()->user()->id,
            'from' => auth()->user()->id,
            'to' => $request->userId,
            'amount' => $request->amount,
            'note' => $request->note,
        ]);

        $toUser = User::find($transition->to);
        $mailData = [
            'to_user_name' => $toUser->name,
            'from_user_name' => auth()->user()->name,
            'amount' => $transition->amount,
            'note' => $transition->note,
        ];
        Mail::to($toUser->email)->send(new TransitionMail($mailData));

        $user = Auth::user();

        $user->update([
            'amount' => $user->amount - $transition->amount,
        ]);

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