<x-layout title=" Edit || Milo Marathon Registration">
    <div class="flex items-center justify-center min-h-screen px-4 py-10">
        <form action="{{ route('registration.update', $participant->id) }}" method="post" class="w-full max-w-4xl bg-white p-6 rounded-xl shadow-lg space-y-6">
            @csrf
            @method('PUT')

            <h1 class="text-4xl font-bold tracking-tight text-gray-800"> Update Form</h1>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label for="full_name" class="block text-sm mb-1">Name:</label>
                <input 
                type="text"
                name="full_name"
                id="full_name"
                value="{{ $participant->full_name }}"
                required
                class="w-full px-4 py-2 border border-gray-700 rounded-lg focus:ring-indigo-500 focus:outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="age" class="block text-sm mb-1">Age:</label>
                    <input 
                    type="number"
                    name="age"
                    id="age"
                    value="{{ $participant->age }}"
                    required
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg focus:ring-indigo-500 focus:outline-none">
                </div>

                <div>
                    <label for="gender" class="block text-sm mb-1">Gender:</label>
                    <select 
                    name="gender" 
                    id="gender"
                    class="w-full px-4 py-2 border border-gray-700 text-center rounded-lg text-sm focus:ring-indigo-500 focus:outline-none"
                    required>
                        <option value="" class="text-gray-400">--Select--</option>
                        <option value="Male" {{ old('gender', $participant->gender) == 'Male' ? 'selected' : '' }}>
                            Male
                        </option>
                        <option value="Female" {{ old('gender', $participant->gender) == 'Female' ? 'selected' : '' }}>
                            Female
                        </option>
                        <option value="Other" {{ old('gender', $participant->gender) == 'Other' ? 'selected' : '' }}>
                            Other
                        </option>
                    </select>
                </div>

                <div>
                    <label for="phone" class="block text-sm mb-1">Phone Number:</label>
                    <input 
                    type="text"
                    name="phone"
                    id="phone"
                    value="{{ $participant->phone }}"
                    required
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg focus:ring-indigo-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="email" class="block text-sm mb-1">Email Address:</label>
                    <input 
                    type="email"
                    name="email"
                    id="email"
                    value="{{ $participant->email }}"
                    required
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg focus:ring-indigo-500 focus:outline-none">
                </div>

                <div>
                    <label for="address" class="block text-sm mb-1">Address:</label>
                    <input 
                    type="text"
                    name="address"
                    id="address"
                    value="{{ $participant->address }}"
                    required
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg focus:ring-indigo-500 focus:outline-none">
                </div>

                <div>
                    <label for="marathon_category" class="block text-sm mb-1">Marathon Category:</label>
                    <select 
                    name="marathon_category" 
                    id="marathon_category"
                    class="w-full px-4 py-2 border border-gray-700 text-center rounded-lg text-sm focus:ring-indigo-500 focus:outline-none"
                    required>
                        <option value="" class="text-gray-400">--Select--</option>
                        <option value="3K" {{ old('marathon_category', $participant->marathon_category) == '3K' ? 'selected' : '' }}>
                            3K
                        </option>
                        <option value="5K" {{ old('marathon_category', $participant->marathon_category) == '5K' ? 'selected' : '' }}>
                            5K
                        </option>
                        <option value="10K" {{ old('marathon_category', $participant->marathon_category) == '10K' ? 'selected' : '' }}>
                            10K
                        </option>
                        <option value="21K" {{ old('marathon_category', $participant->marathon_category) == '21K' ? 'selected' : '' }}>
                            21K
                        </option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="emergency_contact" class="block text-sm mb-1">Emergency Contact:</label>
                    <input 
                    type="text"
                    name="emergency_contact"
                    id="emergency_contact"
                    value="{{ $participant->emergency_contact }}"
                    required
                    class="w-full px-4 py-2 border border-gray-700 rounded-lg focus:ring-indigo-500 focus:outline-none">
                </div>

                <div>
                    <label for="tshirt_size" class="block text-sm mb-1">T-Shirt Size:</label>
                    <select 
                    name="tshirt_size" 
                    id="tshirt_size"
                    class="w-full px-4 py-2 border border-gray-700 text-center rounded-lg text-sm focus:ring-indigo-500 focus:outline-none"
                    required>
                        <option value="" class="text-gray-400">--Select--</option>
                        <option value="XS" {{ old('tshirt_size', $participant->tshirt_size) == 'XS' ? 'selected' : '' }}>
                            XS
                        </option>
                        <option value="S" {{ old('tshirt_size', $participant->tshirt_size) == 'S' ? 'selected' : '' }}>
                            S
                        </option>
                        <option value="M" {{ old('tshirt_size', $participant->tshirt_size) == 'M' ? 'selected' : '' }}>
                            M
                        </option>
                        <option value="L" {{ old('tshirt_size', $participant->tshirt_size) == 'L' ? 'selected' : '' }}>
                            L
                        </option>
                        <option value="XL" {{ old('tshirt_size', $participant->tshirt_size) == 'XL' ? 'selected' : '' }}>
                            XL
                        </option>
                        <option value="XXL" {{ old('tshirt_size', $participant->tshirt_size) == 'XXL' ? 'selected' : '' }}>
                            XXL
                        </option>
                    </select>
                </div>
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 transition-colors py-2 rounded-lg text-white font-medium">Update</button>
        </form>
    </div>
</x-layout>