<x-layout>
    <x-slot:heading>Create a Job</x-slot:heading>

    <form method="POST" action="{{ route('jobs.store') }}" autocomplete="off">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-8">
                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">
                            Title
                        </label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-gray-600">
                                <input type="text" name="title" id="title"
                                    class="block min-w-0 grow py-2 px-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                    placeholder="Laravel Developer">
                            </div>
                            @error('title')
                                <small class="mt-1 font-weight-semibold italic text-red-500 text-xs">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="about" class="block text-sm/6 font-medium text-gray-900">
                            Description
                        </label>
                        <div class="mt-2">
                            <textarea name="description" id="description" rows="3"
                                class="block w-full rounded-md bg-white py-2 px-4 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-gray-600 sm:text-sm/6 resize-none"
                                placeholder="Ratione quia at et saepe. Qui dolorem eum aspernatur expedita temporibus et velit."></textarea>
                            @error('description')
                                <small class="mt-1 font-weight-semibold italic text-red-500 text-xs">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">
                            Salary
                        </label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-gray-600">
                                <input type="text" name="salary" id="salary"
                                    class="block min-w-0 grow py-2 px-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6"
                                    placeholder="$50.000">
                            </div>
                            @error('salary')
                                <small class="mt-1 font-weight-semibold italic text-red-500 text-xs">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 gap-x-6">
            <button type="submit"
                class="rounded-md bg-gray-900 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-700">
                Save
            </button>
        </div>
    </form>

</x-layout>
