<x-layout>
    <x-slot:heading>Jobs</x-slot:heading>

    <div class="grid grid-cols-2 gap-4 mb-4">
        @foreach ($jobs as $job)
            <div class="bg-white p-4 rounded shadow flex flex-col justify-between">
                <div class="mb-2">
                    <p class="font-bold text-xl text-blue-950">
                        {{ $job->employer->name }}
                    </p>
                </div>
                <div class="flex justify-between">
                    <p class="mb-2 text-l font-semibold text-gray-900">
                        {{ $job->title }}
                    </p>
                    <span class="mb-2 text-sm">
                        ${{ $job->salary }} / year
                    </span>
                </div>
                <div>
                    <p class="mb-4 truncate text-sm text-gray-500">
                        {{ $job['description'] }}
                    </p>
                </div>
                <div>
                    <a href="/jobs/{{ $job->id }}"
                        class="bg-gray-900 rounded-md px-3 py-2 font-medium text-sm text-white hover:bg-gray-800">
                        See Job
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        {{ $jobs->links() }}
    </div>

</x-layout>
