<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserBudgets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getUserBudgets(Request $request)
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
        $request->validate([
            'budget_type' => 'required|min:1',
            'category' => 'required|in:Education,Entertainment,Food,Health,Miscellaneous,Shopping,Transportation,Utilities',
            'amount' => 'min:1|required|numeric|between:0,999999.999999',
            'date' => 'required|date',
        ]);

        $user_id = auth()->user()->id;

        $data['user_id'] = $user_id;
        $data['budget_type'] = $request->budget_type;
        $data['category'] = $request->category;
        $data['amount'] = $request->amount;
        $data['date'] = Carbon::parse($request->date)->format('Y-m-d');

        $budget = UserBudgets::create($data);

        return redirect()->route('budget'); // Assuming you have a route named 'budget.showLogUserBudgets'
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
    public function budgetEdit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'budget_type' => 'required|min:1',
            'category' => 'required|in:Education,Entertainment,Food,Health,Miscellaneous,Shopping,Transportation,Utilities',
            'amount' => 'min:1|required|numeric|between:0,999999.999999',
            'date' => 'required|date',
        ]);

        $user_id = auth()->user()->id;

        $data['user_id'] = $user_id;
        $data['budget_type'] = $request->budget_type;
        $data['category'] = $request->category;
        $data['amount'] = $request->amount;
        $data['date'] = Carbon::parse($request->date)->format('Y-m-d');

        $budget = UserBudgets::create($data);

        return redirect()->route('budget');
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
