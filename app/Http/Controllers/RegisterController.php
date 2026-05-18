<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    // Retrieves all participants using: Participant::all() and passes them to the registration.index view.
    public function index() {
        $participants = Participant::all();

        return view('registration.index', ['participants' => $participants]);
    }

    // Displays the form for creating a new participant registration.
    public function create() {
        return view('registration.create');
    }

    // Validates the incoming request data and creates a new participant record in the database.
    public function store(Request $request) {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:8|max:65',
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'phone' => 'required|string|digits:11',

            // Checks for unique email, ignoring the current participant's email during updates
            'email' => ['required', 'email', Rule::unique('participants', 'email')],

            'address' => 'required|string|max:100',
            'marathon_category' => ['required', Rule::in(['3K', '5K', '10K', '21K'])],
            'emergency_contact' => 'required|string|digits:11',
            'tshirt_size' => ['required', Rule::in(['XS', 'S', 'M', 'L', 'XL', 'XXL'])],
        ]);

        $validated['registration_date'] = now()->toDateString();
        Participant::create($validated);

        return redirect()->route('registration.index')->with('success', 'Successfully registered!');
    }

    // Displays the edit form for a specific participant.
    public function edit(Participant $participant) {
        return view('registration.edit', ['participant' => $participant]);
    }

    // Handles the search functionality for participants based on the query input.
    public function search_result (Request $request) {
        $query = $request->input('query');

        $results = Participant::where('full_name', 'like', "%{$query}%")
                ->orWhere('phone', 'like', "%{$query}%")
                ->orWhere('email', 'like', "%{$query}%")
                ->orWhere('address', 'like', "%{$query}%")
                ->orWhere('marathon_category', 'like', "%{$query}%")
                ->get();

        return view('registration.search', ['results' => $results]);
    }

    // Updates an existing participant's information in the database after validating the incoming request data.
    public function update(Request $request, Participant $participant) {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:8|max:65',
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'phone' => 'required|string|digits:11',
            'email' => ['required', 'email', Rule::unique('participants', 'email')->ignore($participant->id)],
            'address' => 'required|string|max:100',
            'marathon_category' => ['required', Rule::in(['3K', '5K', '10K', '21K'])],
            'emergency_contact' => 'required|string|digits:11',
            'tshirt_size' => ['required', Rule::in(['XS', 'S', 'M', 'L', 'XL', 'XXL'])],
        ]);

        $participant->update($validated);

        return redirect()->route('registration.index')->with('success', 'Participant updated successfully!');
    }

    // Deletes a participant record from the database and redirects back to the registration index page.
    public function destroy(Participant $participant) {
        $participant->delete();

        return redirect()->route('registration.index')->with('success', 'Participant deleted successfully!');
    }
}
