@extends('admin.components.app')
@section('content')
<div class="p-6">

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Mobile</th>
                <th class="p-2 border">Company</th>
                <th class="p-2 border">City</th>
                <th class="p-2 border">Active</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody id="enquiriesTable">
            <!-- AJAX will populate rows here -->
        </tbody>
    </table>
</div>

<script>
async function loadEnquiries() {
    try {
        const response = await fetch('{{ route('contact_enquiries.json') }}');
        const data = await response.json();

        const tbody = document.getElementById('enquiriesTable');
        tbody.innerHTML = '';

        data.forEach(enquiry => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="p-2 border">${enquiry.name}</td>
                <td class="p-2 border">${enquiry.email}</td>
                <td class="p-2 border">${enquiry.mobile}</td>
                <td class="p-2 border">${enquiry.company || ''}</td>
                <td class="p-2 border">${enquiry.city || ''}</td>
                <td class="p-2 border">
                    <button onclick="toggleActive(${enquiry.id})" class="px-2 py-1 rounded ${enquiry.active ? 'bg-green-600' : 'bg-gray-400'} text-white">
                        ${enquiry.active ? 'Yes' : 'No'}
                    </button>
                </td>
                <td class="p-2 border flex gap-2">
                    <a href="/contact_enquiries/${enquiry.id}" class="bg-blue-600 px-2 py-1 rounded text-white">View</a>
                    <button onclick="deleteEnquiry(${enquiry.id})" class="bg-red-600 px-2 py-1 rounded text-white">Delete</button>
                </td>
            `;
            tbody.appendChild(row);
        });
    } catch (error) {
        console.error('Error loading enquiries:', error);
    }
}

// Initial load
loadEnquiries();
// Refresh table every 5 seconds
setInterval(loadEnquiries, 5000);

// Delete enquiry via AJAX
async function deleteEnquiry(id) {
    if (!confirm('Are you sure?')) return;
    await fetch(`/contact_enquiries/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    loadEnquiries();
}

// Toggle active via AJAX
async function toggleActive(id) {
    await fetch(`/contact_enquiries/toggle-active/${id}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    loadEnquiries();
}
</script>
@endsection