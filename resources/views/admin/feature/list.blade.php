<x-app-layout>
    <div class="w-full" x-data="{editData: {id: '', category_id: '', title: ''}}">
        <div class="w-full">
            <x-breadcrumb :items="[
                ['label' => 'Feature', 'route' => route('admin.feature.list'), 'is_active' => true],
            ]" />
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-10 mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Feature List</h2>

            <button  onclick="openModal('createFeatureModal')"  class="mt-3 sm:mt-0 inline-flex items-center px-3 py-2 gap-x-1 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
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
                        <th class="px-4 py-3 text-left hidden sm:table-cell">Title</th>
                        <th class="px-4 py-3 text-left hidden sm:table-cell">Category</th>
                        <th width="15%" class="px-4 py-3 text-left hidden sm:table-cell">Actions</th>
                    </tr>
                </thead>
                <!-- BODY -->
                <tbody class="divide-y divide-gray-200">
                    @foreach ($features as $key => $feature)
                        <tr class="hover:bg-gray-50">
                            <!-- ID -->
                            <td class="px-4 py-3 block sm:table-cell">
                                {{ $key+1 }}
                            </td>

                            <!-- NAME -->
                            <td class="px-4 py-3 block sm:table-cell capitalize">
                                {{ $feature->title }}
                            </td>

                            <td class="px-4 py-3 block sm:table-cell capitalize">
                                {{ $feature->category->title }}
                            </td>

                            <!-- ACTION -->
                            <td class="px-4 py-3 block sm:table-cell">
                                <div class="w-full flex gap-2">
                                    <button type="submit" class="text-green-600 font-semibold hover:underline"
                                    @click="
                                        editData.id = {{ $feature->id }};
                                        editData.category_id = {{ $feature->category_id }};
                                        editData.title = '{{ $feature->title }}';
                                        openModal('editFeatureModal');
                                    ">
                                        Edit
                                    </button>
                                    <form method="POST"
                                          action="{{ route('admin.feature.delete', $feature->id) }}"
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
            {{ $features->links() }}
        </div>

        {{-- create modal --}}
        <x-modal id="createFeatureModal" title="Create Feature">
            <form method="POST" action="{{route('admin.feature.store')}}" class="space-y-4">
                @csrf
                <div>
                    <label class="text-sm font-medium">Title</label>
                    <input type="text" name="title" class="w-full mt-1 border rounded-lg px-3 py-2" required>
                </div>
                <div>
                    <label class="text-sm font-medium">Category</label>
                    <select name="category_id" class="w-full mt-1 border rounded-lg px-3 py-2">
                        <option selected hidden value="">Select Once</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('createFeatureModal')" class="px-4 py-2 bg-gray-200 rounded-lg">
                        Cancel
                    </button>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                        Create
                    </button>
                </div>
            </form>
        </x-modal>

        {{--edit modal--}}
        <x-modal id="editFeatureModal" title="Edit Feature">
            <form method="POST" action="{{route('admin.feature.update')}}" class="space-y-4">
                @csrf
                <div>
                    <label class="text-sm font-medium">Title</label>
                    <input type="text" x-model="editData.title" name="title" class="w-full mt-1 border rounded-lg px-3 py-2" required>
                    <input type="hidden" x-model="editData.id" name="id">
                </div>
                <div>
                    <label class="text-sm font-medium">Category</label>
                    <select name="category_id" class="w-full mt-1 border rounded-lg px-3 py-2" x-model="editData.category_id">
                        <option selected hidden value="">Select Once</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('editFeatureModal')"
                            class="px-4 py-2 bg-gray-200 rounded-lg">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                        Update
                    </button>
                </div>
            </form>
        </x-modal>
    </div>

    <script>
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
