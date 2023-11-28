<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BudgetRequest;
use App\Models\UserBudgets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getUserBudgets()
    {
        $user_id = auth()->user()->id;
        $userBudgets = DB::table('user_budgets')
            ->where('user_id', $user_id)
            ->get();

        return response()->json(['userBudgets' => $userBudgets]);
    }

    /**
     * Display a listing of the resource.
     */
    public function getRowBudgetData(Request $request)
    {
        $user_id = auth()->user()->id;
        $userBudgets = DB::table('user_budgets')
            ->where('user_id', $user_id)
            ->get();

        return response()->json(['userBudgets' => $userBudgets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function budgetAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'budget_type' => 'required|min:3',
            'category' => 'required|in:Education,Entertainment,Food,Health,Miscellaneous,Shopping,Transportation,Utilities',
            'amount' => 'required|numeric|between:0,999999.999999',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user_id = auth()->user()->id;

        $data['user_id'] = $user_id;
        $data['budget_type'] = $request->budget_type;
        $data['category'] = $request->category;
        $data['amount'] = $request->amount;
        $data['date'] = Carbon::parse($request->date)->format('Y-m-d');

        $budget = UserBudgets::create($data);

        return response()->json(['success' => 'Budget added successfully']);
    }









    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function budgetEdit($id)
    {
        $user_id = auth()->user()->id;

        $budget = UserBudgets::where('user_id', $user_id)->find($id);

        if (!$budget) {
            return response()->json(['error' => 'Budget not found'], 404);
        }

        return response()->json(['budget' => $budget]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function budgetSave(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'budget_type' => 'required|min:3',
            'category' => 'required|in:Education,Entertainment,Food,Health,Miscellaneous,Shopping,Transportation,Utilities',
            'amount' => 'required|numeric|between:0,999999.999999',
            'date' => 'required|date',
        ]);

        $user_id = auth()->user()->id;

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Retrieve the budget using first() to execute the query
        $budget = UserBudgets::where('user_id', $user_id)
            ->where('budget_id', $id)
            ->first();

        if (!$budget) {
            // Handle the case where the budget is not found, for example, redirect back
            return redirect()->back()->with('error', 'Budget not found');
        }

        // Update the budget with the new data
// Update the budget with the new data
        $budget->budget_type = $request->budget_type;
        $budget->category = $request->category;
        $budget->amount = $request->amount;
        $budget->date = Carbon::parse($request->date)->format('Y-m-d');


        $budget->save();

        return response()->json(['success' => 'Budget updated successfully']);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function budgetDelete($id)
    {
        $user_id = auth()->user()->id;

        $deletedRows = UserBudgets::where('user_id', $user_id)
            ->where('budget_id', $id)
            ->delete();

        // Optionally, you can return a response to indicate success or failure
        return response()->json(['message' => 'Budget deleted successfully']);
    }

}
