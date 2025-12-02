<x-app-layout>
    <div class="w-full" x-data="{editData: {id: '', title: ''}}">
        <div class="w-full">
            <x-breadcrumb :items="[
                ['label' => 'Category', 'route' => route('admin.notification.list'), 'is_active' => true],
            ]" />
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-10 mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Category</h2>

            <button  onclick="openModal('createCategoryModal')"  class="mt-3 sm:mt-0 inline-flex items-center px-3 py-2 gap-x-1 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
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
                        <th width="75%" class="px-4 py-3 text-left hidden sm:table-cell">Title</th>
                        <th class="px-4 py-3 text-left hidden sm:table-cell">Actions</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="divide-y divide-gray-200">
                    @foreach ($categories as $key => $category)
                        <tr class="hover:bg-gray-50">
                            <!-- ID -->
                            <td class="px-4 py-3 block sm:table-cell">
                                {{ $key+1 }}
                            </td>

                            <!-- NAME -->
                            <td class="px-4 py-3 block sm:table-cell capitalize">
                                {{ $category->title }}
                            </td>

                            <!-- ACTION -->
                            <td class="px-4 py-3 block sm:table-cell">
                                <div class="w-full flex gap-2">
                                    <button type="submit" class="text-green-600 font-semibold hover:underline"
                                    @click="
                                        editData.id = {{ $category->id }};
                                        editData.title = '{{ $category->title }}';
                                        openModal('editCategoryModal');
                                    ">
                                        Edit
                                    </button>
                                    <form method="POST"
                                          action="{{ route('admin.category.delete', $category->id) }}"
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
            {{ $categories->links() }}
        </div>

        {{-- create modal --}}
        <x-modal id="createCategoryModal" title="Create Category">
            <form method="POST" action="{{route('admin.category.store')}}" class="space-y-4">
                @csrf
                <div>
                    <label class="text-sm font-medium">Title</label>
                    <input type="text" name="title" class="w-full mt-1 border rounded-lg px-3 py-2" required>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('createCategoryModal')"
                            class="px-4 py-2 bg-gray-200 rounded-lg">
                        Cancel
                    </button>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                        Create
                    </button>
                </div>
            </form>
        </x-modal>

        {{--edit modal--}}
        <x-modal id="editCategoryModal" title="Create Category">
            <form method="POST" action="{{route('admin.category.update')}}" class="space-y-4">
                @csrf
                <div>
                    <label class="text-sm font-medium">Title</label>
                    <input type="text" x-model="editData.title" name="title" class="w-full mt-1 border rounded-lg px-3 py-2" required>
                    <input type="hidden" x-model="editData.id" name="id">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('editCategoryModal')"
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
