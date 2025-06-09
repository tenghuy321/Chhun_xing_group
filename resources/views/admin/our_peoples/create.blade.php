<x-app-layout>
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold">Add New People</h2>
        <form action="{{ route('our_people.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @component('admin.components.alert')
            @endcomponent
            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#966927] uppercase">English</h1>
                    <div>
                        <label for="name_en" class="block text-sm font-medium text-gray-700">Name</label>
                        <input value="{{ old('name.en') }}" type="text" name="name[en]" id="name_en"
                            class="mt-1 block w-full p-2 border rounded-md text-[#000] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('name.en')" />
                    </div>
                    <div>
                        <label for="position_en" class="block text-sm font-medium text-gray-700">Position</label>
                        <input value="{{ old('position.en') }}" type="text" name="position[en]" id="position_en"
                            class="mt-1 block w-full p-2 border rounded-md text-[#000] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('position.en')" />
                    </div>

                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#966927] uppercase">Khmer</h1>
                    <div>
                        <label for="name_kh" class="block text-sm font-medium text-gray-700">name</label>
                        <input value="{{ old('name.kh') }}" type="text" name="name[kh]" id="name_kh"
                            class="mt-1 block w-full p-2 border rounded-md text-[#000] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('name.kh')" />
                    </div>
                    <div>
                        <label for="position_kh" class="block text-sm font-medium text-gray-700">Position</label>
                        <input value="{{ old('position.kh') }}" type="text" name="position[kh]" id="position_kh"
                            class="mt-1 block w-full p-2 border rounded-md text-[#000] text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('position.kh')" />
                    </div>
                </div>
            </div>

            <!-- Dropzone for Image -->
            <div>
                <label for="dropzone-file" id="drop-area"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6 w-full h-full bg-contain bg-center bg-no-repeat rounded-md text-center"
                        id="img-preview">
                        <svg class="w-8 h-8 mb-4 text-[#000]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-[12px] sm:text-[14px] text-[#000]"><span class="font-semibold">Click to
                                upload</span> or drag and drop</p>
                        <p class="text-xs text-[#000]">SVG, PNG, JPG (Size 800 x 800 px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" name="image" accept="image/*"
                        onchange="uploadImage(event)" />
                </label>
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>

            <div class="flex justify-between w-full">
                <a href="{{ route('our_people.index') }}"
                    class="border border-[#966927] hover:!bg-[#966927] hover:!text-[#ffffff] px-4 py-1 md:px-6 rounded-[5px] text-[#966927]">
                    Back
                </a>

                <button type="submit" class="bg-[#966927] text-white px-4 py-1 md:px-6 rounded-[5px]">Submit</button>
            </div>
        </form>
    </div>

    <script>
        const dropArea = document.getElementById('drop-area');
        const imageFile = document.getElementById('dropzone-file');
        const imagePreview = document.getElementById('img-preview');

        function uploadImage(event) {
            const file = event.target.files[0];
            if (file) {
                const imgLink = URL.createObjectURL(file);
                imagePreview.style.backgroundImage = `url(${imgLink})`;
                imagePreview.style.backgroundSize = "contain";
                imagePreview.style.backgroundPosition = "center";
                imagePreview.innerHTML = "";
            }
        }

        // Drag-and-drop functionality
        dropArea.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropArea.classList.add('border-blue-500');
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('border-blue-500');
        });

        dropArea.addEventListener('drop', (event) => {
            event.preventDefault();
            dropArea.classList.remove('border-blue-500');
            const file = event.dataTransfer.files[0];
            if (file) {
                const imgLink = URL.createObjectURL(file);
                imagePreview.style.backgroundImage = `url(${imgLink})`;
                imagePreview.style.backgroundSize = "contain";
                imagePreview.style.backgroundPosition = "center";
                imagePreview.innerHTML = ""; // Clear the default content inside preview
                imageFile.files = event.dataTransfer.files; // Attach the dropped file to input
            }
        });
    </script>
</x-app-layout>
