<?php

namespace App\Http\Controllers;

use App\Models\RequestType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RequestTypeController extends Controller
{
    public function index(Request $request)
    {
        $search_phrase = $request->search;

        return view("others.request-types.index", [
            "request_types" => RequestType::when($search_phrase, function($query, $search_phrase) {
                return $query->search($search_phrase);
            })->paginate(8)
        ]);
    }

    public function create()
    {
        return view("others.request-types.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:250",
            "description" => "max:500"
        ]);

        RequestType::create([
            "name" => $request->name,
            "description" => $request->description
        ]);

        return redirect(route("others.request-types.index"))->with(
            "status",
            "Pomyślnie dodano rodzaj wniosku"
        );
    }

    public function edit(RequestType $request_type)
    {
        return view("others.request-types.edit", [
            "request_type" => $request_type
        ]);
    }


    public function update(Request $request, RequestType $request_type)
    {
        $request->validate([
            "name" => "required|max:250",
            "description" => "max:500"
        ]);

        RequestType::where("id", $request_type->id)->update([
            "name" => $request->name,
            "description" => $request->description
        ]);

        return redirect(route("others.request-types.index"))->with(
            "status",
            "Pomyślnie edytowano rodzaj wniosku"
        );
    }


    public function destroy(RequestType $request_type)
    {
        $request_type->delete();

        return redirect(route("others.request-types.index"))->with(
            "status",
            "Pomyślnie usunięto rodzaj wniosku"
        );
    }
}
