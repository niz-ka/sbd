<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    public function index(Request $request)
    {
        $search_phrase = $request->search;

        return view("others.account-types.index", [
            "account_types" => AccountType::when($search_phrase, function($query, $search_phrase) {
                return $query->search($search_phrase);
            })->paginate(8)
        ]);
    }

    public function create()
    {
        return view("others.account-types.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:250",
            "symbol" => "required|max:5",
            "description" => "max:500"
        ]);

        AccountType::create([
            "name" => $request->name,
            "symbol" => $request->symbol,
            "description" => $request->description
        ]);

        return redirect(route("others.account-types.index"))->with(
            "status",
            "Pomyślnie dodano rodzaj rachunku"
        );
    }

    public function edit(AccountType $account_type)
    {
        return view("others.account-types.edit", [
            "account_type" => $account_type
        ]);
    }


    public function update(Request $request, AccountType $account_type)
    {
        $request->validate([
            "name" => "required|max:250",
            "symbol" => "required|max:5",
            "description" => "max:500"
        ]);

        AccountType::where("id", $account_type->id)->update([
            "name" => $request->name,
            "symbol" => $request->symbol,
            "description" => $request->description
        ]);

        return redirect(route("others.account-types.index"))->with(
            "status",
            "Pomyślnie edytowano rodzaj rachunku"
        );
    }


    public function destroy(AccountType $account_type)
    {
        $account_type->delete();

        return redirect(route("others.account-types.index"))->with(
            "status",
            "Pomyślnie usunięto rodzaj rachunku"
        );
    }
}
