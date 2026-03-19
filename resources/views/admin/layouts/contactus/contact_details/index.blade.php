@extends('admin.components.app')

@section('content')
<div class="p-6">

    {{-- Add Button --}}
    <a href="{{ route('contact_details.create') }}"
       class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">
        Add Contact
    </a>

    <table class="w-full border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Icon</th>
                <th class="p-2 border">Label</th>
                <th class="p-2 border">Value</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($contacts as $contact)
                <tr class="text-center">

                    {{-- Icon --}}
                    <td class="p-2 border">
                        @if($contact->icon)
                            <img src="{{ asset('storage/'.$contact->icon) }}"
                                 class="w-10 h-10 object-cover mx-auto">
                        @else
                            <span class="text-gray-400">No Icon</span>
                        @endif
                    </td>

                    {{-- Label --}}
                    <td class="p-2 border">
                        {{ $contact->label ?? '-' }}
                    </td>

                    {{-- Value --}}
                    <td class="p-2 border">
                        {{ $contact->value }}
                    </td>

                    {{-- Status --}}
                    <td class="p-2 border">
                        <span class="{{ $contact->is_active ? 'text-green-600' : 'text-red-600' }}">
                            {{ $contact->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>

                    {{-- Actions --}}
                    <td class="p-2 border">
                        <div class="flex justify-center gap-3">

                            <a href="{{ route('contact_details.edit', $contact->id) }}"
                               class="text-blue-600">
                                Edit
                            </a>

                            <form action="{{ route('contact_details.destroy', $contact->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this contact?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-red-600">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $contacts->links() }}
    </div>

</div>
@endsection