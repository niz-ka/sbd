<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountType;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $search_phrase = $request->search;

        return view("accounts.index", [
            "accounts" => Account::when($search_phrase, function($query, $search_phrase) {
                return $query->search($search_phrase);
            })->paginate(8)
        ]);
    }

    public function show(Account $account) {
        return view("accounts.show", [
            "account" => $account
        ]);
    }

    public function create()
    {
        return view("accounts.create", [
            "account_types" => AccountType::all(),
            "customers" => Customer::all()
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            "number" => "required|max:250|unique:Account",
            "name" => "max:250",
            "interest_rate" => "required|numeric|between:0,100",
            "account_type" => "required|exists:AccountType,id",
            "customer" => "required|exists:Customer,id",
            "co_owner" => "nullable|exists:Customer,id|different:customer"
        ]);

        Account::create([
            "number" => $request->number,
            "name" => $request->name,
            "balance" => 0,
            "interest_rate" => $request->interest_rate,
            "opening_date" => Carbon::now(),
            "account_type_id" => $request->account_type,
            "customer_id" => $request->customer,
            "co_owner_id" => $request->co_owner
        ]);

        return redirect(route("accounts.index"))->with(
            "status",
            "Pomyślnie dodano rachunek"
        );
    }

    public function edit(Account $account)
    {
        return view("accounts.edit", [
            "account" => $account,
            "customers" => Customer::all(),
            "account_types" => AccountType::all(),
        ]);
    }

    public function update(Request $request, Account $account)
    {

        $request->validate([
            "number" => ["required", "max:250", Rule::unique("Account")->ignore($account->id)],
            "name" => "max:250",
            "balance" => "required|numeric|min:0",
            "interest_rate" => "required|numeric|between:0,100",
            "account_type" => "required|exists:AccountType,id",
            "co_owner" => ["nullable", "exists:Customer,id", function ($attribute, $value, $fail) use ($account) {
                if ($value === strval($account->customer_id)) {
                    $fail('Pole ID współwłaściciela musi być różne od ID właściciela');
                }
            },]
        ]);

        Account::where("id", $account->id)->update([
            "number" => $request->number,
            "name" => $request->name,
            "interest_rate" => $request->interest_rate,
            "balance" => $request->balance,
            "account_type_id" => $request->account_type,
            "co_owner_id" => $request->co_owner
        ]);


        return redirect(route("accounts.index"))->with(
            "status",
            "Pomyślnie edytowano rachunek"
        );
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return redirect(route("accounts.index"))->with(
            "status",
            "Pomyślnie usunięto rachunek"
        );
    }
}
