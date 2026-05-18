<x-layout title=" Participants || Milo Marathon Registration">
    <div class="overflow-x-auto min-h-screen">

      @if (@session('success'))
        <div class="mb-4 p-4 bg-green-500 text-white rounded-lg">
            {{ session('success') }}
        </div>
        
      @endif

      <table class="min-w-full text-sm text-left text-gray-700">
        
        <!-- Table Head -->
        <thead class="bg-gray-50 border-b border-gray-200 text-gray-600 uppercase text-xs tracking-wider">
          <tr>
            <th class="px-6 py-4">ID</th>
            <th class="px-6 py-4">Name</th>
            <th class="px-6 py-4">Age</th>
            <th class="px-6 py-4">Gender</th>
            <th class="px-6 py-4">Email</th>
            <th class="px-6 py-4">Phone Number</th>
            <th class="px-6 py-4">Emergency Contact</th>
            <th class="px-6 py-4">Address</th>
            <th class="px-6 py-4">Marathon Category</th>
            <th class="px-6 py-4">T-Shirt Size</th>
            <th class="px-6 py-4">Registration Date</th>
            <th class="px-6 py-4 text-right">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach ($participants as $participant)
            <tr class="hover:bg-gray-300 transition">
                <td class="px-6 py-4 font-medium">{{ $participant->id }}</td>
                <td class="px-6 py-4">{{ $participant->full_name }}</td>
                <td class="px-6 py-4">{{ $participant->age }}</td>
                <td class="px-6 py-4">{{ $participant->gender }}</td>
                <td class="px-6 py-4">{{ $participant->email }}</td>
                <td class="px-6 py-4">{{ $participant->phone }}</td>
                <td class="px-6 py-4">{{ $participant->emergency_contact }}</td>
                <td class="px-6 py-4">{{ $participant->address }}</td>
                <td class="px-6 py-4">{{ $participant->marathon_category }}</td>
                <td class="px-6 py-4">{{ $participant->tshirt_size }}</td>
                <td class="px-6 py-4">{{ $participant->registration_date->format('M d, Y') }}</td>
                <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('registration.edit', $participant->id) }}" class="text-indigo-600 hover:text-indigo-800">Edit</a>
                    <form action="{{ route('registration.destroy', $participant->id) }}"
                      method="POST"
                      class="inline">

                          @csrf
                          @method('DELETE')

                          <button type="submit"
                          class="text-red-600 hover:text-red-800 font-medium"
                          onclick="return confirm('Delete this record?')">
                              Delete
                          </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>

</x-layout>