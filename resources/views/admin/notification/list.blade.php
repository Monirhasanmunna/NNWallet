<x-app-layout>
    <div class="w-full">
        <div class="w-full">
            <x-breadcrumb :items="[
                ['label' => 'Notification', 'route' => route('admin.notification.list'), 'is_active' => true],
            ]" />
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-10 mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Notifications</h2>

            <button  onclick="openModal('createNotificationModal')"  class="mt-3 sm:mt-0 inline-flex items-center px-3 py-2 gap-x-1 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                <i class="fa-solid fa-plus"></i>
                Add New
            </button>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full text-sm">
                <!-- HEADER -->
                <thead class="bg-gray-200 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left hidden sm:table-cell">#</th>
                        <th class="px-4 py-3 text-left hidden sm:table-cell">Title</th>
                        <th class="px-4 py-3 text-left hidden sm:table-cell">Type</th>
                        <th class="px-4 py-3 text-left hidden sm:table-cell">Message</th>
                        <th class="px-4 py-3 text-left hidden sm:table-cell">Created At</th>
                        <th class="px-4 py-3 text-left hidden sm:table-cell">Actions</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="divide-y divide-gray-200">
                    @foreach ($notifications as $key => $notification)
                        <tr class="hover:bg-gray-50">
                            <!-- ID -->
                            <td class="px-4 py-3 block sm:table-cell">
                                {{ $key+1 }}
                            </td>

                            <!-- NAME -->
                            <td class="px-4 py-3 block sm:table-cell capitalize">
                                {{ $notification->title }}
                            </td>

                            <!-- EMAIL -->
                            <td class="px-4 py-3 block sm:table-cell capitalize">
                                {{ $notification->type }}
                            </td>

                            <!-- EMAIL -->
                            <td class="px-4 py-3 block sm:table-cell capitalize">
                                {{ Str::words($notification->message, 8, '...') }}
                            </td>

                            <!-- JOINED -->
                            <td class="px-4 py-3 block sm:table-cell">
                                {{ $notification->created_at->format('d M Y') }}
                            </td>

                            <!-- ACTION -->
                            <td class="px-4 py-3 block sm:table-cell">
                                <form method="POST"
                                      action="{{ route('admin.notification.delete', $notification->id) }}"
                                      onsubmit="confirmDelete(event)">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-red-600 hover:underline">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <x-modal id="createNotificationModal" title="Create Notification">
            <form method="POST" action="{{route('admin.notification.store')}}" class="space-y-4">
                @csrf
                <div>
                    <label class="text-sm font-medium">Title</label>
                    <input type="text" name="title" class="w-full mt-1 border rounded-lg px-3 py-2" required>
                </div>
                <div>
                    <label class="text-sm font-medium">Type</label>
                    <select name="type" class="w-full mt-1 border rounded-lg px-3 py-2" required>
                        @foreach($notificationTypes as $key => $type)
                            <option value="{{$key}}">{{$type}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-sm font-medium">Message</label>
                    <textarea name="message" rows="4" class="w-full mt-1 border rounded-lg px-3 py-2" required></textarea>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal('createNotificationModal')"
                            class="px-4 py-2 bg-gray-200 rounded-lg">
                        Cancel
                    </button>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                        Create
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
