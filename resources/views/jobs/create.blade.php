<x-layout>
    <x-slot:heading>Create a Job</x-slot:heading>

    <form method="POST" action="{{ route('jobs.store') }}" autocomplete="off">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-8">
                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="title" id="title" placeholder="Laravel Developer"
                                value="{{ old('title') }}" required />
                            <x-form-error name="title" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="description">Description</x-form-label>
                        <div class="mt-2">
                            <x-form-textarea name="description" id="description" rows="3" required
                                placeholder="Ratione quia at et saepe. Qui dolorem eum aspernatur expedita temporibus et velit.">{{ old('description') }}</x-form-textarea>
                            <x-form-error name="description" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="salary" id="salary" placeholder="$50.000"
                                value="{{ old('salary') }}" required />
                            <x-form-error name="salary" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 gap-x-6">
            <x-form-button type="submit">Save</x-form-button>
        </div>
    </form>

</x-layout>
