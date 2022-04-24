<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <x-form-header>Register</x-form-header>
                <form method="POST" action="/register" class="mt-10">
                    @csrf
                    <!-- name -->
                    <x-div-wrapper class="mb-6 text-center">
                        <x-form.input :name="'name'" :padding="'mt-32 mb-2'" :sizing="'w-64 h-9 p-2'" />
                    </x-div-wrapper>
                    <!-- userName -->
                    <x-div-wrapper class="mb-6 text-center">
                        <x-form.input :name="'username'" :padding="'mt-8 mb-2'" :sizing="'w-64 h-9 p-2'" />
                    </x-div-wrapper>
                    <!-- email -->
                    <x-div-wrapper class="mb-6 text-center">
                        <x-form.input :name="'email'" :padding="'mt-8 mb-2'" :type="'email'" :sizing="'w-64 h-9 p-2'" />
                    </x-div-wrapper>
                    <!-- password -->
                    <x-div-wrapper class="mb-2 text-center">
                        <x-form.input :name="'password'" :padding="'mt-32 mb-2'" :sizing="'w-64 h-7 p-2'" :type="'password'" />
                    </x-div-wrapper>
                    <x-div-wrapper class="mb-2 text-center">
                        <button type="button" class="font-mono font-bold" onclick="passwordVisibility()">show</button>
                    </x-div-wrapper>
                    <x-div-wrapper class="mb-6 text-center">
                        <x-form.input :name="'password_confirmation'" :padding="'mb-2'" :sizing="'w-64 h-7 p-2'" :heading="'Confirm the password'" :type="'password'" />
                    </x-div-wrapper>
                    <x-div-wrapper class="mt-16 mb-6">
                        <x-submit-button>Submit</x-submit-button>
                        <!-- <button type="submit"
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        >
                            Submit
                        </button> -->
                    </x-div-wrapper>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
<x-js.show-function />