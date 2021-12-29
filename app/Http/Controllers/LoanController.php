<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $search_phrase = $request->search;

        return view("loans.index", [
            "loans" => Loan::when($search_phrase, function($query, $search_phrase) {
                return $query->search($search_phrase);
            })->with(["account"])->paginate(8)
        ]);
    }

    public function show(Loan $loan) {
        return view("loans.show", [
            "loan" => $loan
        ]);
    }

    public function create() {
        return view("loans.create", [
            "accounts" => Account::all()
        ]);
    }

    public function store(Request $request)
    {
        $start_date = Carbon::now();

        $request->validate([
            "account" => "required|exists:Account,id",
            "amount" => "required|numeric|min:0|",
            "interest_rate" => "required|numeric|between:0,100",
            "end_date" => "required|date|after:now",
            "purpose" => "max:500"
        ]);

        Loan::create([
            "purpose" => $request->purpose,
            "amount" => $request->amount,
            "end_date" => $request->end_date,
            "start_date" => $start_date,
            "interest_rate" => $request->interest_rate,
            "account_id" => $request->account
        ]);

        return redirect(route("loans.index"))->with(
            "status",
            "Pomyślnie dodano kredyt"
        );
    }

    public function edit(Loan $loan)
    {
        return view("loans.edit", [
            "loan" => $loan,
            "accounts" => Account::all()
        ]);
    }

    public function update(Request $request, Loan $loan)
    {

        $start_date = $loan->start_date;

        $request->validate([
            "account" => "required|exists:Account,id",
            "amount" => "required|numeric|min:0|",
            "interest_rate" => "required|numeric|between:0,100",
            "end_date" => ["required", "date", "after:" . $start_date],
            "purpose" => "max:500"
        ]);

        Loan::where("id", $loan->id)->update([
            "purpose" => $request->purpose,
            "amount" => $request->amount,
            "end_date" => $request->end_date,
            "interest_rate" => $request->interest_rate,
            "account_id" => $request->account
        ]);


        return redirect(route("loans.index"))->with(
            "status",
            "Pomyślnie edytowano kredyt"
        );
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();

        return redirect(route("loans.index"))->with(
            "status",
            "Pomyślnie usunięto kredyt"
        );
    }
}
