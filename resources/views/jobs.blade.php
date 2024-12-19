<x-layout>
    <x-slot:heading>Jobs</x-slot:heading>

    <ul role="list" class="divide-y divide-gray-100">
        @foreach ($jobs as $job)
            <li class="flex justify-between items-center gap-x-6 py-5">
                <div class="flex min-w-0">
                    <div class="min-w-0 flex-auto">
                        <p class="text-l font-semibold text-gray-900">
                            {{ $job->title }}
                            -
                            <span>{{ $job->salary }} per year</span>
                        </p>
                        <p class="mt-1 truncate text-sm text-gray-500">
                            {{ $job['description'] }}
                        </p>
                    </div>
                </div>

                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <a href="/jobs/{{ $job->id }}"
                        class="bg-gray-900 rounded-md px-3 py-2 font-medium hover:bg-gray-700 hover:text-white text-sm text-white">
                        See Job
                    </a>
                </div>
            </li>
        @endforeach
    </ul>

</x-layout>
