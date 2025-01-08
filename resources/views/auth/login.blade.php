<x-layout>
    <x-slot:heading>Login</x-slot:heading>

    <form method="POST" action="{{ route('auth.doLogin') }}" autocomplete="off">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-8">
                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" name="email" id="email" value="{{ old('email') }}"
                                placeholder="johndoe@example.com" required />
                            <x-form-error name="email" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password" id="password" placeholder="****************"
                                required />
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 gap-x-6">
            <x-form-button type="submit">Log In</x-form-button>
        </div>
    </form>

</x-layout>
