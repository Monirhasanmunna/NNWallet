<x-app-layout>
    <div class="w-full" x-data="bannerManager()">
        <div class="w-full">
            <x-breadcrumb :items="[
                ['label' => 'Banner', 'route' => route('admin.banner.list'), 'is_active' => true],
            ]" />
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-10 mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Banner List</h2>

            <button  @click="openCreateModal()"  class="mt-3 sm:mt-0 inline-flex items-center px-3 py-2 gap-x-1 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                <i class="fa-solid fa-plus"></i>
                Add New
            </button>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full text-sm">
                <!-- HEADER -->
                <thead class="bg-gray-200 text-gray-600 uppercase text-xs">
                    <tr>
                        <th width="15%" class="px-4 py-3 text-left hidden sm:table-cell">#</th>
                        <th class="px-4 py-3 text-left hidden sm:table-cell">Image</th>
                        <th class="px-4 py-3 text-left hidden sm:table-cell">Link</th>
                        <th width="15%" class="px-4 py-3 text-left hidden sm:table-cell">Actions</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="divide-y divide-gray-200">
                    @foreach ($banners as $key => $banner)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 block sm:table-cell">
                                {{ $key+1 }}
                            </td>

                            <td class="px-4 py-3 block sm:table-cell capitalize">
                                @if(isset($banner->image) && asset($banner->image))
                                    <div class="w-14 h-10 rounded overflow-hidden">
                                        <img src="{{asset($banner->image)}}" alt="{{asset($banner->image)}}" class="w-full h-full object-cover rounded">
                                    </div>
                                @else
                                    <div class="w-14 h-10 rounded bg-gray-300"></div>
                                @endif
                            </td>

                            <td class="px-4 py-3 block sm:table-cell">
                                {{$banner->link}}
                            </td>

                            <!-- ACTION -->
                            <td class="px-4 py-3 block sm:table-cell">
                                <div class="w-full flex gap-2">
                                    <button type="submit" class="text-green-600 font-semibold hover:underline"
                                    @click="openEditModal({
                                        id: {{ $banner->id }},
                                        link: '{{ $banner->link }}',
                                        image: '{{$baseUrl}}/{{ $banner->image }}'
                                    })"
                                    >
                                        Edit
                                    </button>
                                    <form method="POST"
                                          action="{{ route('admin.banner.delete', $banner->id) }}"
                                          onsubmit="confirmDelete(event)">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="text-red-600 font-semibold hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $banners->links() }}
        </div>

        {{-- create modal --}}
        <x-modal id="createBannerModal" title="Create Banner">
            <form method="POST"
                  action="{{ route('admin.banner.store') }}"
                  class="space-y-4"
                  enctype="multipart/form-data">
                @csrf

                <div>
                    <label class="text-sm font-medium">Link</label>
                    <input type="text" name="link" class="w-full mt-1 border rounded-lg px-3 py-2">
                </div>

                <!-- IMAGE UPLOADER -->
                <div class="space-y-3">
                    <label class="block text-sm font-medium">Image</label>

                    <div class="flex items-center gap-3">
                        <label class="w-full inline-flex items-center gap-2 px-3 py-2 border border-gray-300 rounded-md cursor-pointer hover:bg-gray-50">
                            <i class="fa-solid fa-image"></i>
                            <span class="text-sm">Choose image</span>

                            <input
                                x-ref="createFileInput"
                                type="file"
                                name="image"
                                accept="image/*"
                                class="hidden"
                                @change="updatePreview"
                            >
                        </label>

                        <button
                            type="button"
                            x-show="preview"
                            @click="clearPreview"
                            class="inline-flex items-center gap-1 text-xs text-red-600 hover:text-red-700">
                            <i class="fa-solid fa-xmark"></i> Remove
                        </button>
                    </div>

                    <div x-show="preview">
                        <img :src="preview"
                             class="h-32 rounded border object-cover">
                    </div>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button"
                            onclick="closeModal('createBannerModal')"
                            class="px-4 py-2 bg-gray-200 rounded-lg">
                        Cancel
                    </button>

                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                        Create
                    </button>
                </div>
            </form>
        </x-modal>

        {{--edit modal--}}
        <x-modal id="editBannerModal" title="Edit Banner">
            <form method="POST"
                  action="{{ route('admin.banner.update') }}"
                  class="space-y-4"
                  enctype="multipart/form-data">
                @csrf

                <div>
                    <label class="text-sm font-medium">Link</label>
                    <input type="text" x-model="editData.link" name="link" class="w-full mt-1 border rounded-lg px-3 py-2" >
                    <input type="hidden" x-model="editData.id" name="id">
                </div>

                <!-- IMAGE UPLOADER -->
                <div class="space-y-3">
                    <label class="text-sm font-medium">Image</label>

                    <div class="flex items-center gap-3">

                        <label class="w-full inline-flex items-center gap-2 px-3 py-2 border border-gray-300 rounded-md cursor-pointer hover:bg-gray-50">
                            <i class="fa-solid fa-image"></i>
                            <span class="text-sm">Choose image</span>

                            <input
                                x-ref="fileInput"
                                type="file"
                                name="image"
                                accept="image/*"
                                class="hidden"
                                @change="updatePreview"
                            >
                        </label>

                        <button
                            type="button"
                            x-show="preview"
                            @click="clearPreview"
                            class="inline-flex items-center gap-1 text-xs text-red-600 hover:text-red-700">
                            <i class="fa-solid fa-xmark"></i> Remove
                        </button>
                    </div>

                    <div x-show="preview">
                        <img :src="preview"
                             class="h-32 rounded border object-cover">
                    </div>
                </div>

                <div class="flex justify-end gap-2">

                    <button type="button"
                            onclick="closeModal('editBannerModal')"
                            class="px-4 py-2 bg-gray-200 rounded-lg">
                        Cancel
                    </button>

                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                        Update
                    </button>
                </div>
            </form>
        </x-modal>
    </div>

    <script>
        function bannerManager() {
            return {
                // For edit modal
                editData: { id: '', link: '', image: '' },

                preview: null,
                // Called when clicking EDIT
                openEditModal(data) {
                    this.editData = data;
                    this.preview = data.image;
                    openModal('editBannerModal');
                },

                // Called when opening CREATE modal
                openCreateModal() {
                    this.editData = { id: '', link: '', image: '' };
                    this.preview = null;
                    // this.$refs.createFileInput.value = null;
                    openModal('createBannerModal');
                },

                updatePreview(event) {
                    const file = event.target.files[0];
                    if (!file) {
                        this.preview = this.editData.image || null;
                        return;
                    }
                    this.preview = URL.createObjectURL(file);
                },

                clearPreview() {
                    this.preview = null;
                    this.$refs.fileInput.value = null;
                    if (this.$refs.createFileInput) this.$refs.createFileInput.value = null;
                }
            }
        }

        function confirmDelete(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e11d48',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        }
    </script>

</x-app-layout>
