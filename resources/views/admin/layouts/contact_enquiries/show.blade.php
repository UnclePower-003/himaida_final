@extends('admin.components.app')

@section('content')
<div class="p-6 max-w-3xl mx-auto bg-white rounded shadow">

    <h2 class="text-2xl font-bold mb-4">Contact Enquiry Details</h2>

    <div class="space-y-4">
        <div>
            <strong>Name:</strong> {{ $contactEnquiry->name }}
        </div>
        <div>
            <strong>Email:</strong> {{ $contactEnquiry->email }}
        </div>
        <div>
            <strong>Mobile:</strong> {{ $contactEnquiry->mobile }}
        </div>
        <div>
            <strong>Company:</strong> {{ $contactEnquiry->company ?? 'N/A' }}
        </div>
        <div>
            <strong>City:</strong> {{ $contactEnquiry->city ?? 'N/A' }}
        </div>
        <div>
            <strong>Message / Requirement:</strong>
            <p class="border p-3 rounded bg-gray-50">{{ $contactEnquiry->message ?? 'No message provided.' }}</p>
        </div>
        <div>
            <strong>Active:</strong> {{ $contactEnquiry->active ? 'Yes' : 'No' }}
        </div>
        <div>
            <strong>Created At:</strong> {{ $contactEnquiry->created_at->format('d M, Y H:i') }}
        </div>
        <div>
            <strong>Last Updated:</strong> {{ $contactEnquiry->updated_at->format('d M, Y H:i') }}
        </div>
    </div>

    <div class="mt-6 flex gap-2">
        <a href="{{ route('contact_enquiries.index') }}" 
           class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Back</a>
    </div>
</div>
@endsection