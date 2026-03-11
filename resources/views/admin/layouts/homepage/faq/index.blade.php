@extends('admin.components.app')

@section('content')
<div class="p-6">

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">FAQ</h2>
        <a href="{{ route('faq.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Add FAQ
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-3 border">Question</th>
                <th class="p-3 border">Status</th>
                <th class="p-3 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faqs as $faq)
                <tr>
                    <td class="p-3 border">{{ $faq->question }}</td>
                    <td class="p-3 border">
                        {{ $faq->is_active ? 'Active' : 'Inactive' }}
                    </td>
                    <td class="p-3 border space-x-2">
                        <a href="{{ route('faq.edit', $faq) }}"
                           class="text-blue-600">Edit</a>

                        <form action="{{ route('faq.destroy', $faq) }}"
                              method="POST"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600"
                                    onclick="return confirm('Delete this FAQ?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection