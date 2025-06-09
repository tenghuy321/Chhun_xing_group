@extends('admin.layouts.app')
@section('header')
    Contact Page
@endsection
@section('content')
    <div class="">
        <div class="my-3 md:my-4 px-2 md:px-4 text-end">
            {{-- <a href="{{ route('contact.create') }}"
                class="hover:!bg-[#966927] hover:!text-[#ffffff] text-[#966927] px-4 py-2 my-3 rounded-[5px] border-2 border-[#966927] text-[12px] sm:text-[14px]">
                <span class="">Add new</span>
            </a> --}}
        </div>

        @component('admin.components.alert')
        @endcomponent

        <div class="overflow-x-auto px-0 sm:px-2 md:px-4">
            <div class="border border-[#966927] max-h-[80vh] overflow-y-auto">
                <table class="min-w-full table-fixed">
                    <thead class="text-black sticky top-0 z-10">
                        <tr>
                            <th class="text-left py-3 px-4 text-xs w-8 border-r border-[#966927]">#</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#966927]">Image</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#966927]">Phone Number</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#966927]">Email</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#966927]">Location</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#966927]">Social</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px]">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($contacts as $index => $contact)
                            <tr class="border-t border-[#966927]">
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#966927]">{{ $index + 1 }}
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#966927]">
                                    <img src="{{ asset($contact->image) }}" alt="" class="w-20 h-auto object-cover">
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#966927]">
                                    <span>{{ $contact->phone_number1 }}</span> / <span>{{ $contact->phone_number2 }}</span>
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#966927]">
                                    <p>{{ $contact->email }}</p>
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#966927]">
                                    <div class="flex flex-col">
                                        <div class="line-clamp-1">
                                            {{ $contact->location['en'] ?? '' }}
                                        </div>
                                        <div class="line-clamp-1">
                                            {{ $contact->location['kh'] ?? '' }}
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#966927]">
                                    <div class="flex flex-col">
                                        <div class="line-clamp-1">
                                            {{ $contact->facebook }}
                                        </div>
                                        <div class="line-clamp-1">
                                            {{ $contact->telegram }}
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px]">
                                    <div class="flex items-center">
                                        <a href="{{ route('contact.edit', $contact->id) }}" title="Edit">
                                            <svg class="w-6 h-6 text-green-500 hover:text-green-700 transition"
                                                xmlns="http://www.w3.org/2FF3217/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
