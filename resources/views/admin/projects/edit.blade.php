<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold">Edit Project</h2>
        <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PATCH')
            @component('admin.components.alert')
            @endcomponent

            <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#966927] uppercase">English</h1>
                    <div>
                        <label for="name_en" class="block text-sm font-medium text-gray-700">Name</label>
                        <input value="{{ old('name.en', $project->name['en'] ?? '') }}" type="text" name="name[en]"
                            id="name_en" class="mt-1 block w-full p-2 border rounded-md text-black text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('name.en')" />
                    </div>
                    <div>
                        <label for="content_en" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="content[en]" id="content_en" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content.en', $project->content['en'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.en')" />
                    </div>
                </div>

                <div class="p-0 space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#966927] uppercase">Khmer</h1>
                    <div>
                        <label for="name_kh" class="block text-sm font-medium text-gray-700">Name</label>
                        <input value="{{ old('name.kh', $project->name['kh'] ?? '') }}" type="text" name="name[kh]"
                            id="name_kh" class="mt-1 block w-full p-2 border rounded-md text-black text-sm">
                        <x-input-error class="mt-2" :messages="$errors->get('name.kh')" />
                    </div>
                    <div>
                        <label for="content_kh" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea name="content[kh]" id="content_kh" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content.kh', $project->content['kh'] ?? '') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content.kh')" />
                    </div>
                </div>
            </div>

            <!-- Dropzone for Image -->
            <div>
                <label for="dropzone-file{{ $project->id }}" id="drop-area"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">

                    <input id="dropzone-file{{ $project->id }}" type="file" class="hidden" name="images[]"
                        accept="image/*" multiple onchange="uploadImages(event)" />
                    <p class="mt-2 text-sm text-gray-500">Click or drag images here to upload</p>
                </label>
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>

            <!-- Preview Container -->
            <div id="img-preview"
                class="flex flex-wrap gap-2 justify-center items-center w-full h-full bg-gray-50 rounded-md overflow-y-auto p-4">
                @php
                    $images = json_decode($project->image, true);
                @endphp

                @if (!empty($images))
                    @foreach ($images as $img)
                        <div class="relative group">
                            <img src="{{ asset($img) }}" alt="Uploaded Image"
                                class="w-20 h-20 object-cover rounded border" />
                            <button type="button"
                                class="absolute -top-2 -right-2 bg-[#966927] text-white flex items-center justify-center rounded-full w-6 h-6"
                                onclick="removeExistingImage('{{ $img }}', this)">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    strokeWidth={2} stroke="currentColor" class="w-4 h-4">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>


                            </button>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-400 text-sm">No images available</p>
                @endif
            </div>

            <input type="hidden" name="removed_images" id="removed_images" />

            <div class="flex justify-between">
                <a href="{{ route('project.index') }}"
                    class="border border-[#966927] hover:!bg-[#966927] hover:!text-[#ffffff] px-4 py-1 md:px-6 rounded-[5px] text-[#966927]">
                    Back
                </a>

                <button type="submit"
                    class="bg-[#966927] text-white px-4 py-1 md:px-6 rounded-[5px] hover:!text-[#415464]">Submit</button>
            </div>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#content_en'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                    'undo', 'redo', 'code', 'codeBlock'
                ]
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#content_kh'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                    'undo', 'redo', 'code', 'codeBlock'
                ]
            })
            .catch(error => {
                console.error(error);
            });

        let selectedImages = []; // newly added files
        let removedImages = []; // existing images marked for removal
        const previewContainer = document.getElementById("img-preview");
        const removedImagesInput = document.getElementById('removed_images');
        const fileInput = document.getElementById("dropzone-file{{ $project->id }}");

        function uploadImages(event) {
            const files = Array.from(event.target.files);
            selectedImages.push(...files);
            renderPreview();
        }

       async function renderPreview() {
            previewContainer.innerHTML = '';

            // Render existing images (excluding removed ones)
            let existingImages = @json($images);
            existingImages.forEach(img => {
                if (!removedImages.includes(img)) {
                    const wrapper = document.createElement('div');
                    wrapper.classList.add('relative', 'group');

                    const imageEl = document.createElement('img');
                    imageEl.src = "{{ asset('') }}" + img;
                    imageEl.className = "w-20 h-20 object-cover rounded border";

                    const btn = document.createElement('button');
                    btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                strokeWidth={2} stroke="currentColor" class="w-4 h-4">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>`;
                    btn.type = 'button';
                    btn.className =
                        "absolute -top-2 -right-2 bg-[#FF3217] text-white flex items-center justify-center rounded-full w-6 h-6";
                    btn.onclick = () => removeExistingImage(img, btn);

                    wrapper.appendChild(imageEl);
                    wrapper.appendChild(btn);
                    previewContainer.appendChild(wrapper);
                }
            });

            // Render selected new images in order
            for (let i = 0; i < selectedImages.length; i++) {
                const file = selectedImages[i];
                const imageURL = await readFileAsDataURL(file);

                const wrapper = document.createElement('div');
                wrapper.classList.add('relative', 'group');

                const img = document.createElement('img');
                img.src = imageURL;
                img.className = "w-20 h-20 object-cover rounded border";

                const btn = document.createElement('button');
                btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            strokeWidth={2} stroke="currentColor" class="w-4 h-4">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>`;
                btn.type = 'button';
                btn.className =
                    "absolute -top-2 -right-2 bg-[#FF3217] text-white flex items-center justify-center rounded-full w-6 h-6";
                btn.onclick = () => {
                    selectedImages.splice(i, 1);
                    renderPreview();
                };

                wrapper.appendChild(img);
                wrapper.appendChild(btn);
                previewContainer.appendChild(wrapper);
            }

            removedImagesInput.value = JSON.stringify(removedImages);
        }

        // Wrap FileReader in a Promise
        function readFileAsDataURL(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onload = e => resolve(e.target.result);
                reader.onerror = e => reject(e);
                reader.readAsDataURL(file);
            });
        }

        function removeExistingImage(imagePath, btn) {
            removedImages.push(imagePath);
            removedImagesInput.value = JSON.stringify(removedImages);

            // Remove from DOM
            const wrapper = btn.closest('div');
            wrapper.remove();
        }
    </script>
</x-app-layout>
