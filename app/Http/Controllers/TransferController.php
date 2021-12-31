<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transfer;
use App\Models\TransferType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    public function index(Request $request)
    {
        $search_phrase = $request->search;

        return view("transfers.index", [
            "transfers" => Transfer::when($search_phrase, function($query, $search_phrase) {
                return $query->search($search_phrase);
            })->with(["account"])->paginate(8)
        ]);
    }

    public function show(Transfer $transfer) {
        return view("transfers.show", [
            "transfer" => $transfer
        ]);
    }

    public function create() {
        return view("transfers.create", [
            "transfer_types" => TransferType::all(),
            "accounts" => Account::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "account" => "required|exists:Account,id",
            "receiver_number" => ["required", "max:250", function ($attribute, $value, $fail) use ($request) {
                $accounts = Account::where("id", $request->account)->get();
                if(!$accounts->isEmpty()) {
                    if ($value === $accounts[0]->number) {
                        $fail('Rachunek odbiorcy i nadawcy muszą się różnić.');
                    }
                }
            }],
            "receiver_data" => "max:500",
            "amount" => "required|numeric|min:0",
            "title" => "required|max:250",
            "transfer_type" => "required|exists:TransferType,id"
        ]);


        Transfer::create([
            "receiver_number" => $request->receiver_number,
            "transfer_date" => Carbon::now(),
            "amount" => $request->amount,
            "title" => $request->title,
            "receiver_data" => $request->receiver_data,
            "transfer_type_id" => $request->transfer_type,
            "account_id" => $request->account
        ]);

        return redirect(route("transfers.index"))->with(
            "status",
            "Pomyślnie dodano przelew"
        );
    }

    public function edit(Transfer $transfer)
    {
        return view("transfers.edit", [
            "transfer_types" => TransferType::all(),
            "accounts" => Account::all(),
            "transfer" => $transfer
        ]);
    }

    public function update(Request $request, Transfer $transfer)
    {
        $request->validate([
            "account" => "required|exists:Account,id",
            "receiver_number" => ["required", "max:250", function ($attribute, $value, $fail) use ($request) {
                $accounts = Account::where("id", $request->account)->get();
                if(!$accounts->isEmpty()) {
                    if ($value === $accounts[0]->number) {
                        $fail('Rachunek odbiorcy i nadawcy muszą się różnić.');
                    }
                }
            }],
            "receiver_data" => "max:500",
            "amount" => "required|numeric|min:0",
            "title" => "required|max:250",
            "transfer_type" => "required|exists:TransferType,id"
        ]);

        Transfer::where("id", $transfer->id)->update([
            "receiver_number" => $request->receiver_number,
            "amount" => $request->amount,
            "title" => $request->title,
            "receiver_data" => $request->receiver_data,
            "transfer_type_id" => $request->transfer_type,
            "account_id" => $request->account
        ]);

        return redirect(route("transfers.index"))->with(
            "status",
            "Pomyślnie edytowano przelew"
        );
    }

    public function destroy(Transfer $transfer)
    {
        $transfer->delete();

        return redirect(route("transfers.index"))->with(
            "status",
            "Pomyślnie usunięto przelew"
        );
    }

    public function report(Request $request) {
        $validation = \Validator::make($request->all(),[
            "transfer_date" => "required|date"
        ]);

        if($validation->fails()) {
            return response()->json("err");
        }

        $result = DB::select('CALL transfer_report("'.$request->transfer_date.'")');
        return response()->json($result);
    }
}
