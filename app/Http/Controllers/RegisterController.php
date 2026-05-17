<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class RegisterController extends Controller
{
    public function index() {
        $participants = Participant::all();

        return view('registration.index', ['participants' => $participants]);
    }

    public function create() {
        return view('registration.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:8|max:65',
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'phone' => 'required|string|max:11',
            'email' => 'required|email|unique:participants,email',
            'address' => 'required|string|min:0|max:100',
            'marathon_category' => ['required', Rule::in(['3K', '5K', '10K', '21K'])],
            'emergency_contact' => 'required|string|min:0|max:11',
            'tshirt_size' => ['required', Rule::in(['XS', 'S', 'M', 'L', 'XL', 'XXL'])],
        ]);

        Participant::create([
            'full_name' => $validated['full_name'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'marathon_category' => $validated['marathon_category'],
            'registration_date' => now(),
            'emergency_contact' => $validated['emergency_contact'],
            'tshirt_size' => $validated['tshirt_size'],
        ]);

        return redirect()->route('registration.index');
    }
}
