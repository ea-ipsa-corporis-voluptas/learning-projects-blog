<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <x-form-header>Log In</x-form-header>
                <form method="POST" action="/login" class="mt-10">
                    @csrf
                    <!-- email -->
                    <x-div-wrapper class="mb-6 text-center">
                        <x-form.input :name="'email'" :padding="'mt-32 mb-2'" :sizing="'w-64 h-9 p-2'" :type="'email'" :autocomplete="'email'" />
                    </x-div-wrapper>
                    <!-- password -->
                    <div class="mb-6 text-center">
                        <x-form.input :name="'password'" :padding="'mt-8 mb-2'" :sizing="'w-48 h-7 p-2'" :type="'password'" :autocomplete="'new-password'" />
                        <button type="button" class="mt-3 font-mono font-bold" onclick="passwordVisibility()">show</button>
                    </div>
                    <!-- submit -->
                    <x-div-wrapper class="mt-16 mb-6">
                        <x-submit-button>Submit</x-submit-button>
                    </x-div-wrapper>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
<x-js.show-function />