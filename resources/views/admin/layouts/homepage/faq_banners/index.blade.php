@extends('admin.components.app')

@section('content')

<div class="p-6">

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-bold">FAQ Banner</h2>

        {{-- <a href="{{ route('faq_banners.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
           Add Banner
        </a> --}}
    </div>

    <table class="w-full border">

        <thead>
            <tr class="bg-gray-100">
                <th class="p-2">Image</th>
                <th class="p-2">Title</th>
                <th class="p-2">Action</th>
            </tr>
        </thead>

        <tbody>

        @foreach($banners as $banner)

        <tr class="border-t">

            <td class="p-2">
                <img src="{{ asset('storage/'.$banner->image) }}"
                     class="w-32">
            </td>

            <td class="p-2">
                {{ $banner->title }}
            </td>

            <td class="p-2 flex gap-2">

                <a href="{{ route('faq_banners.edit',$banner->id) }}"
                   class="bg-yellow-500 text-white px-3 py-1 rounded">
                   Edit
                </a>

                <form action="{{ route('faq_banners.destroy',$banner->id) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="bg-red-500 text-white px-3 py-1 rounded">
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