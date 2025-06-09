@extends('admin.layouts.app')
@section('header')
    Our Team Content
@endsection
@section('content')
    <div class="" x-data="reorderTable()" x-init="initSortable()">
        <div class="my-4 px-2 md:px-4 text-end">
            {{-- <a href="{{ route('our_people.create') }}"
                class="hover:!bg-[#966927] hover:!text-[#ffffff] text-[#966927] px-4 py-2 my-3 rounded-[5px] border-2 border-[#966927] text-[12px] sm:text-[14px]">
                <span class="">Add new</span>
            </a> --}}

            <a href="{{ route('aboutlist.index') }}"
                class="hover:!bg-[#966927] hover:!text-[#ffffff] text-[#966927] px-4 py-2 my-3 rounded-[5px] border-2 border-[#966927] text-[12px] sm:text-[14px]">
                <span class="">Back</span>
            </a>
        </div>

        @component('admin.components.alert')
        @endcomponent

        <div class="overflow-x-auto px-0 sm:px-2 md:px-4">
            <div class="border border-[#966927] max-h-[70vh] overflow-y-auto">
                <table class="min-w-full table-fixed">
                    <thead class="text-black sticky top-0 z-10">
                        <tr>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#966927]">#</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#966927]">Image</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#966927]">Title</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px] border-r border-[#966927]">Position</th>
                            <th class="text-left py-3 px-4 text-xs w-[200px]">Actions</th>
                        </tr>
                    </thead>
                    <tbody x-ref="tableBody" class="text-gray-700">
                        @foreach ($our_peoples as $index => $our_people)
                            <tr class="border-t border-[#966927] cursor-move" draggable="true"
                                x-bind:data-id="{{ $our_people->id }}" @dragstart="dragStart($event, {{ $our_people->id }})"
                                @dragover.prevent @drop="drop($event, {{ $our_people->id }})">
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#966927]">{{ $our_people->order }}
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#966927]">
                                    <img src="{{ asset($our_people->image) }}" alt="" class="w-12 h-auto">
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#966927]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $our_people->name['en'] ?? '' }}</p>
                                        <p>{{ $our_people->name['kh'] ?? '' }}</p>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-xs max-w-[200px] border-r border-[#966927]">
                                    <div class="flex flex-col truncate">
                                        <p>{{ $our_people->position['en'] ?? '' }}</p>
                                        <p>{{ $our_people->position['kh'] ?? '' }}</p>
                                    </div>
                                </td>

                                <td class="py-3 px-4 text-xs max-w-[200px]">
                                    <div class="flex space-x-1 items-center">
                                        {{-- <a href="{{ route('our_people.delete', $our_people->id) }}" title="Delete"
                                            onclick="event.preventDefault(); deleteRecord('{{ route('our_people.delete', $our_people->id) }}')">
                                            <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </a> --}}
                                        <a href="{{ route('our_people.edit', $our_people->id) }}" title="Edit">
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
@section('js')
    <script>
        function reorderTable() {
            return {
                initSortable() {
                    this.$nextTick(() => {
                        let tableBody = this.$refs.tableBody;
                        new Sortable(tableBody, {
                            animation: 150,
                            ghostClass: "bg-gray-100",
                            onEnd: async (event) => {
                                let newOrder = [...tableBody.children].map((row, index) => ({
                                    id: row.getAttribute("data-id"),
                                    order: index + 1
                                }));

                                let response = await fetch("{{ route('our_people.reorder') }}", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                    },
                                    body: JSON.stringify({
                                        newOrder
                                    })
                                });

                                if (response.ok) {
                                    location.reload();
                                } else {
                                    console.error("Failed to reorder.");
                                }
                            }
                        });
                    });
                }
            };
        }
    </script>
@endsection
