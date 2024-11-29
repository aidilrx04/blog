<x-layouts.front>
    <main class="flex h-full min-h-screen items-center justify-center p-4">
        <div class="-mt-28 w-[450px] rounded-xl bg-surface p-4">
            <form action="{{ route("auth.login_submit") }}" method="POST">
                @csrf

                <h1 class="mb-4 text-2xl font-medium text-white">Login</h1>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div
                            class="mb-2 rounded border-2 border-red-900 bg-red-100 px-4 py-2 text-red-900"
                        >
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

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

                <button
                    type="submit"
                    class="block w-full rounded bg-primary px-4 py-2 text-center font-medium uppercase text-gray-900"
                >
                    Login
                </button>
            </form>
        </div>
    </main>
</x-layouts.front>
