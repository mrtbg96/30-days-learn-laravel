<x-layout>
    <x-slot:heading>Job Details</x-slot:heading>

    <div>
        <div class="mt-2 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-900">Job Title</dt>
                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ $job->title }}
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-900">Job Description</dt>
                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ $job->description }}
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm/6 font-medium text-gray-900">Job Salary</dt>
                    <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ $job->salary }} / per year
                    </dd>
                </div>
            </dl>
            @can('edit', $job)
                <div class="mt-6 flex">
                    <a href="{{ route('jobs.edit', $job) }}"
                        class="rounded-md bg-gray-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-700">
                        Edit
                    </a>
                    <form method="POST" action="{{ route('jobs.destroy', $job) }}" class="ms-4">
                        @csrf

                        @method('DELETE')

                        <button type="submit"
                            class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                            Delete
                        </button>
                    </form>
                </div>
            @endcan
        </div>
    </div>

</x-layout>
