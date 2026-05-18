<x-layout title=" Search Result || Milo Marathon Registration">
    <div class="overflow-x-auto min-h-screen">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">
            Search Results:
            <span class="text-indigo-600">{{ $results->count() }}</span> found
        </h1>
        <table class="min-w-full text-sm text-left text-gray-700">
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
                @forelse ($results as $result)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-medium">{{ $result->id }}</td>
                    <td class="px-6 py-4">{{ $result->full_name }}</td>
                    <td class="px-6 py-4">{{ $result->age }}</td>
                    <td class="px-6 py-4">{{ $result->gender }}</td>
                    <td class="px-6 py-4">{{ $result->email }}</td>
                    <td class="px-6 py-4">{{ $result->phone }}</td>
                    <td class="px-6 py-4">{{ $result->emergency_contact }}</td>
                    <td class="px-6 py-4">{{ $result->address }}</td>
                    <td class="px-6 py-4">{{ $result->marathon_category }}</td>
                    <td class="px-6 py-4">{{ $result->tshirt_size }}</td>
                    <td class="px-6 py-4">{{ $result->registration_date->format('M d, Y') }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('registration.edit', $result->id) }}" class="text-indigo-600 hover:text-indigo-800">Edit</a>
                        <form action="{{ route('registration.destroy', $result->id) }}"
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
                @empty
                <tr>
                    <td colspan="12" class="px-6 py-10 text-center text-gray-500">
                        No results found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layout>