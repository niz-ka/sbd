<?php

namespace App\Http\Controllers;

use App\Models\TransferType;
use Illuminate\Http\Request;

class TransferTypeController extends Controller
{
    public function index(Request $request)
    {
        $search_phrase = $request->search;

        return view("others.transfer-types.index", [
            "transfer_types" => TransferType::when($search_phrase, function($query, $search_phrase) {
                return $query->search($search_phrase);
            })->paginate(8)
        ]);
    }

    public function create()
    {
        return view("others.transfer-types.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:250",
            "description" => "max:500"
        ]);

        TransferType::create([
            "name" => $request->name,
            "description" => $request->description
        ]);

        return redirect(route("others.transfer-types.index"))->with(
            "status",
            "Pomyślnie dodano rodzaj przelewu"
        );
    }

    public function edit(TransferType $transfer_type)
    {
        return view("others.transfer-types.edit", [
            "transfer_type" => $transfer_type
        ]);
    }


    public function update(Request $request, TransferType $transfer_type)
    {
        $request->validate([
            "name" => "required|max:250",
            "description" => "max:500"
        ]);

        TransferType::where("id", $transfer_type->id)->update([
            "name" => $request->name,
            "description" => $request->description
        ]);

        return redirect(route("others.transfer-types.index"))->with(
            "status",
            "Pomyślnie edytowano rodzaj przelewu"
        );
    }


    public function destroy(TransferType $transfer_type)
    {
        $transfer_type->delete();

        return redirect(route("others.transfer-types.index"))->with(
            "status",
            "Pomyślnie usunięto rodzaj przelewu"
        );
    }
}
