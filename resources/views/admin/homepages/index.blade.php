@extends('admin.layouts.app')
@section('header')
    Home Page Content
@endsection
@section('content')
    <div class="">
        <div class="my-4 px-2 md:px-4 text-end">
            <a href="{{ route('homepage.create') }}"
                class="hover:!bg-[#966927] hover:!text-[#ffffff] text-[#966927] px-4 py-2 my-3 rounded-[5px] border-2 border-[#966927] text-[12px] sm:text-[14px]">
                <span class="">Add new</span>
            </a>
        </div>

        @component('admin.components.alert')
        @endcomponent

        <div class="overflow-x-auto px-0 sm:px-2 md:px-4">
            <div class="border border-[#966927] max-h-[80vh] overflow-y-auto">
                <table class="min-w-full table-fixed">
                    <thead class="text-black sticky top-0 z-10">
                        <tr>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#966927]">#</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#966927]">Image</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#966927]">Title</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#966927]">Sub_title</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px]">Actions</th>
                        </tr>
                    </thead>
                    <tbody x-ref="tableBody" class="text-gray-700">
                        @foreach ($homepages as $index => $homepage)
                            <tr class="border-t border-[#966927]">
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#966927]">{{ $index + 1 }}
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#966927]">
                                    <img src="{{ asset($homepage->image) }}" alt="" class="w-20 h-12">
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#966927]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $homepage->title['en'] ?? '' }}</p>
                                        <p>{{ $homepage->title['kh'] ?? '' }}</p>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#966927]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $homepage->sub_title['en'] ?? '' }} {{ $homepage->sub_title1['en'] ?? '' }}
                                        </p>
                                        <p>{{ $homepage->sub_title['kh'] ?? '' }} {{ $homepage->sub_title1['kh'] ?? '' }}
                                        </p>
                                    </div>
                                </td>
                                <td class="py-3 px-4 h-full max-w-[200px]">
                                    <a href="{{ route('homepage.edit', $homepage->id) }}" title="Edit">
                                        <svg class="w-6 h-6 text-green-500 hover:text-green-700 transition"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
