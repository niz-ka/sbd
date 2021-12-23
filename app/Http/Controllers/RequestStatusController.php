<?php

namespace App\Http\Controllers;

use App\Models\RequestStatus;
use Illuminate\Http\Request;

class RequestStatusController extends Controller
{
    public function index(Request $request)
    {
        $search_phrase = $request->search;

        return view("others.request-statuses.index", [
            "request_statuses" => RequestStatus::when($search_phrase, function($query, $search_phrase) {
                return $query->search($search_phrase);
            })->paginate(8)
        ]);
    }

    public function create()
    {
        return view("others.request-statuses.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:250"
        ]);

        RequestStatus::create([
            "name" => $request->name
        ]);

        return redirect(route("others.request-statuses.index"))->with(
            "status",
            "Pomyślnie dodano status wniosku"
        );
    }

    public function edit(RequestStatus $request_status)
    {
        return view("others.request-statuses.edit", [
            "request_status" => $request_status
        ]);
    }


    public function update(Request $request, RequestStatus $request_status)
    {
        $request->validate([
            "name" => "required|max:250"
        ]);

        RequestStatus::where("id", $request_status->id)->update([
            "name" => $request->name
        ]);

        return redirect(route("others.request-statuses.index"))->with(
            "status",
            "Pomyślnie edytowano status wniosku"
        );
    }


    public function destroy(RequestStatus $request_status)
    {
        $request_status->delete();

        return redirect(route("others.request-statuses.index"))->with(
            "status",
            "Pomyślnie usunięto status wniosku"
        );
    }
}
