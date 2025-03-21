<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Projects</h1>
            <a href="{{ route('admin.projects.create') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-500 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-teal focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">
                New Project
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden dark:bg-[#1E2234]">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-400">
                <thead class="bg-gray-50 dark:bg-[#2D334E]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">
                            Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">
                            Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">
                            Is Published</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-200 uppercase">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-400">
                    @foreach ($projects as $project)
                        <tr>
                            <td class="px-6 py-4">{{ $project->title }}</td>
                            <td class="px-6 py-4">{{ $project->project_date }}</td>
                            <td class="px-6 py-4">{{ $project->is_published == 0 ? 'No' : 'yes' }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                    class="text-teal hover:text-[#1aacac] dark:text-teal hover:dark:text-cyan transition-colors duration-150">Edit</a>
                                <form class="delete-form inline-block"
                                    action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-500 dark:text-red-400 hover:dark:text-red-300 transition-colors duration-150">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $projects->links() }} <!-- Pagination -->
    </div>

    <!-- Add this before the closing </body> tag in your layout file -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    if (confirm('Are you sure you want to delete this project?')) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</x-admin-layout>
