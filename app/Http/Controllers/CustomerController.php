<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $search_phrase = $request->search;

        return view("customers.index", [
            "customers" => Customer::when($search_phrase, function($query, $search_phrase) {
                return $query->search($search_phrase);
            })->paginate(8)
        ]);
    }

    public function create()
    {
        return view("customers.create");
    }

    /**
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $request->validate([
            "customer_kind" => ["required", Rule::in(["indywidualny", "biznesowy"])],
            "full_name" => "required|max:250",
            "street" => "required|max:250",
            "number" => "required|max:250",
            "apartment" => "max:250",
            "postal_code" => "required|max:250",
            "city" => "required|max:250",
            "phone" => "max:250",
            "email" => "max:250"
        ]);

        if($request->customer_kind === "indywidualny") {
            $request->validate([
                "PESEL" => "required|max:250|unique:Customer"
            ]);
        } else if($request->customer_kind === "biznesowy") {
            $request->validate([
                "NIP" => "required|max:250|unique:Customer",
                "REGON" => "required|max:250|unique:Customer",
                "company_name" => "required|max:250"
            ]);
        } else {
            return redirect(route("customers.index"))->with(
                "status-error",
                "Nie udało się dodać klienta"
            );
        }

        DB::beginTransaction();
        try {
            $address = Address::create([
                "street" => $request->street,
                "number" => $request->number,
                "apartment" => $request->apartment,
                "city" => $request->city,
                "postal_code" => $request->postal_code
            ]);

            if ($request->customer_kind === "indywidualny") {
                Customer::create([
                    "full_name" => $request->full_name,
                    "phone" => $request->phone,
                    "email" => $request->email,
                    "address_id" => $address->id,
                    "customer_kind" => "indywidualny",
                    "PESEL" => $request->PESEL
                ]);
            } else if ($request->customer_kind === "biznesowy") {
                Customer::create([
                    "full_name" => $request->full_name,
                    "phone" => $request->phone,
                    "email" => $request->email,
                    "address_id" => $address->id,
                    "customer_kind" => "biznesowy",
                    "NIP" => $request->NIP,
                    "REGON" => $request->REGON,
                    "company_name" => $request->company_name
                ]);
            }

            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            return redirect(route("customers.index"))->with(
                "status-error",
                "Nie udało się dodać klienta"
            );
        }

        return redirect(route("customers.index"))->with(
            "status",
            "Pomyślnie dodano klienta"
        );
    }

    public function edit(Customer $customer)
    {
        return view("customers.edit", [
            "customer" => $customer
        ]);
    }


    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            "full_name" => "required|max:250",
            "street" => "required|max:250",
            "number" => "required|max:250",
            "apartment" => "max:250",
            "postal_code" => "required|max:250",
            "city" => "required|max:250",
            "phone" => "max:250",
            "email" => "max:250"
        ]);

        if($customer->customer_kind === "indywidualny") {
            $request->validate([
                "PESEL" => ["required","max:250", Rule::unique("Customer")->ignore($customer->id)]
            ]);
        } else if($customer->customer_kind === "biznesowy") {
            $request->validate([
                "NIP" => ["required","max:250", Rule::unique("Customer")->ignore($customer->id)],
                "REGON" => ["required","max:250", Rule::unique("Customer")->ignore($customer->id)],
                "company_name" => "required|max:250"
            ]);
        } else {
            return redirect(route("customers.index"))->with(
                "status-error",
                "Nie udało się dodać klienta"
            );
        }

        DB::beginTransaction();
        try {
            Address::where("id", $customer->address_id)->update([
                "street" => $request->street,
                "number" => $request->number,
                "apartment" => $request->apartment,
                "city" => $request->city,
                "postal_code" => $request->postal_code
            ]);

            if($customer->customer_kind === "indywidualny") {
                Customer::where("id", $customer->id)->update([
                    "full_name" => $request->full_name,
                    "phone" => $request->phone,
                    "email" => $request->email,
                    "PESEL" => $request->PESEL
                ]);
            } else if($customer->customer_kind === "biznesowy") {
                Customer::where("id", $customer->id)->update([
                    "full_name" => $request->full_name,
                    "phone" => $request->phone,
                    "email" => $request->email,
                    "NIP" => $request->NIP,
                    "REGON" => $request->REGON,
                    "company_name" => $request->company_name
                ]);
            }

            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            return redirect(route("customers.index"))->with(
                "status-error",
                "Nie udało się dodać klienta"
            );
        }

        return redirect(route("customers.index"))->with(
            "status",
            "Pomyślnie edytowano klienta"
        );
    }

    public function show(Customer $customer) {
        return view("customers.show", [
            "customer" => $customer
        ]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect(route("customers.index"))->with(
            "status",
            "Pomyślnie usunięto klienta"
        );
    }
}
