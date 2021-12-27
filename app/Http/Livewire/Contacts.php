<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Rules\ZipCodeRule;
use Livewire\Component;

class Contacts extends Component
{
    public $last_name;
    public $first_name;
    public $gender;
    public $email;
    public $zip;
    public $address;
    public $opinion;

    protected $rules = [
        'last_name'     => 'required|max:10',
        'first_name'     => 'required|max:10',
        'gender'   => 'required',
        'email'    => 'required|email',
        'zip'      => ['required', new ZipCodeRule()],
        'address'   => 'required',
        'opinion' => 'required|max:120',
    ];

    // inputタグが更新された際に、validateを行う。validateOnlyメソッドはinputタグ一つ一つに対してvalidateを行うことができます。
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveContact()
    {
        $validatedData = $this->validate();

        Contact::create($validatedData);
    }

    public function render()
    {
        return view('contacts.top');
    }
}
