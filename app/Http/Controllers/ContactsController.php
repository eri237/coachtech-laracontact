<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use App\Rules\ZipCodeRule;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function top()
    {
        return view('contacts.top');
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'last_name'     => 'required|max:10',
            'first_name'     => 'required|max:10',
            'gender'   => 'required',
            'email'    => 'required|email',
            'zip'      => ['required', new ZipCodeRule()],
            'address'   => 'required',
            'opinion' => 'required|max:120',
        ]);
        $inputs = $request->all();

        return view('contacts.confirm', ['inputs' => $inputs]);
    }

    public function process(Request $request)
    {
        $action = $request->get('action', 'return');
        $input  = $request->except('action');

        if ($action === 'submit') {

            // DBにデータを保存
            $contact = new Contact();
            $contact->fill($input);
            $contact->save();

            return redirect()->route('complete');
        } else {
            return redirect()->route('top')->withInput($input);
        }
    }

    public function complete()
    {
        return view('contacts.complete');
    }

    public function index(Request $request)
    {
        $query = Contact::query();

        $last_name = $request->input('last_name');
        $first_name = $request->input('first_name');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $created_at = $request->input('created_at');

        if (!empty($last_name)) {
            $query->where('last_name', 'like', '%' . $last_name . '%');
        }
        if (!empty($first_name)) {
            $query->where('first_name', 'like', '%' . $first_name . '%');
        }
        if (!empty($gender)) {
            $query->where('gender', 'like', '%' . $gender . '%');
        }
        if (!empty($email)) {
            $query->where('email', 'like', '%' . $email . '%');
        }
        if (!empty($created_at)) {
            $query->where('created_at', 'like', '%' . $created_at . '%');
        }

        $contacts = $query->get();

        return view('contacts.index', compact('contacts'));

    }
}
