<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerRequest;
use App\Models\RequestStatus;
use App\Models\RequestType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CustomerRequestController extends Controller
{
    public function index(Request $request)
    {
        $search_phrase = $request->search;

        return view("customer-requests.index", [
            "customer_requests" => CustomerRequest::when($search_phrase, function($query, $search_phrase) {
                return $query->search($search_phrase);
            })->with(["request_status", "request_type"])->paginate(8)
        ]);
    }

    public function create()
    {
        return view("customer-requests.create", [
            "customers" => Customer::all(),
            "request_types" => RequestType::all(),
            "request_statuses" => RequestStatus::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "customer" => "required|exists:Customer,id",
            "request_type" => "required|exists:RequestType,id",
            "request_status" => "required|exists:RequestStatus,id",
            "comment" => "max:500"
        ]);

        CustomerRequest::create([
            "request_date" => Carbon::now(),
            "comment" => $request->comment,
            "customer_id" => $request->customer,
            "request_type_id" => $request->request_type,
            "request_status_id" => $request->request_status
        ]);

        return redirect(route("customer-requests.index"))->with(
            "status",
            "Pomyślnie dodano wniosek"
        );
    }

    public function edit(CustomerRequest $customer_request)
    {
        return view("customer-requests.edit", [
            "customer_request" => $customer_request,
            "customers" => Customer::all(),
            "request_types" => RequestType::all(),
            "request_statuses" => RequestStatus::all()
        ]);
    }


    public function update(Request $request, CustomerRequest $customer_request)
    {
        $request->validate([
            "customer" => "required|exists:Customer,id",
            "request_type" => "required|exists:RequestType,id",
            "request_status" => "required|exists:RequestStatus,id",
            "comment" => "max:500"
        ]);

        CustomerRequest::where("id", $customer_request->id)->update([
            "comment" => $request->comment,
            "customer_id" => $request->customer,
            "request_type_id" => $request->request_type,
            "request_status_id" => $request->request_status
        ]);


        return redirect(route("customer-requests.index"))->with(
            "status",
            "Pomyślnie edytowano wniosek"
        );
    }

    public function show(CustomerRequest $customer_request) {
        return view("customer-requests.show", [
            "customer_request" => $customer_request
        ]);
    }

    public function destroy(CustomerRequest $customer_request)
    {
        $customer_request->delete();

        return redirect(route("customer-requests.index"))->with(
            "status",
            "Pomyślnie usunięto wniosek"
        );
    }
}
