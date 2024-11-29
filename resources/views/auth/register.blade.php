<x-layouts.front>
    <main class="flex h-full min-h-screen items-center justify-center p-4">
        <div class="-mt-28 w-[450px] rounded-xl bg-surface p-4">
            <form action="{{ route("auth.register_submit") }}" method="POST">
                @csrf

                <h1 class="mb-4 text-2xl font-medium text-white">Register</h1>

                <label for="name" class="mb-4 block">
                    <span class="mb-2 block font-medium">Name</span>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-input block w-full rounded bg-background/50"
                    />
                </label>

                <label for="email" class="mb-4 block">
                    <span class="mb-2 block font-medium">Email</span>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-input block w-full rounded bg-background/50"
                    />
                </label>

                <label for="password" class="mb-4 block">
                    <span class="mb-2 block font-medium">Password</span>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-input block w-full rounded bg-background/50"
                    />
                </label>

                <label for="password_confirmation" class="mb-4 block">
                    <span class="mb-2 block font-medium">Confirm Password</span>
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="form-input block w-full rounded bg-background/50"
                    />
                </label>

                <button
                    type="submit"
                    class="block w-full rounded bg-primary px-4 py-2 text-center font-medium text-gray-900"
                >
                    Register
                </button>
            </form>
        </div>
    </main>
</x-layouts.front>
