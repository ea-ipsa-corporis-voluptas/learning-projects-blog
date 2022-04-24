<x-layout>
    <x-setting :class="'mt-32 max-w-5xl mx-auto'" :heading="'New Post'">
        <form action="/admin/posts" method="post" enctype="multipart/form-data" class="mt-20 text-center">
            @csrf
            <x-custom-panel :padding="'p-1 max-w-xl'" :opacity="'700'">
                <!-- title -->
                <x-form.input :name="'title'" :padding="'mt-16 mb-2'" :sizing="'w-96'" />
                <!-- status -->
                <x-admin.value-dropdown :name="'status'" :heading="'Status'">
                    <option
                        value="draft"
                        class="tracking-tight"
                        style="font-family: monospace, cursive; font-weight: 500;"
                        {{ (old('status') ?? '') === 'draft' ? 'selected' : '' }}
                    >draft</option>
                    <option
                        value="published"
                        class="tracking-tight"
                        style="font-family: monospace, cursive; font-weight: 500;"
                        {{ (old('status') ?? '') === 'published' ? 'selected' : '' }}
                    >published</option>
                </x-admin.value-dropdown>
                <!-- slug -->
                <x-form.input :name="'slug'" :padding="'mt-16 mb-2'" :sizing="'mb-16 w-96'" />
                <!-- category -->
                <x-admin.value-dropdown :name="'category_id'" :heading="'Category'">
                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            class="tracking-tight"
                            value="{{ $category->id }}"
                            style="font-family: Lucida Console, cursive; font-weight: 500;"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </x-admin.value-dropdown>
                <!-- author -->
                <x-form.input :name="'author'" :padding="'mt-3 mb-2'" :sizing="'mb-16 w-96'" />
            </x-custom-panel>
            <x-custom-panel :padding="'mt-20 w-10/12 p-3'" :opacity="'700'">
                <x-form.image-template />
                <!-- excerpt -->
                <x-form.textarea :name="'excerpt'" :padding="'mt-3 mb-2'" :sizing="'w-9/12'" :rows="'4'" />
            </x-custom-panel>
            <x-custom-panel :padding="'w-10/12 p-3'" :opacity="'700'" :class="'mt-10'">
                <!-- body -->
                <x-form.textarea :name="'body'" :padding="'mb-2'" :sizing="'w-9/12'" :rows="'8'" />
            </x-custom-panel>
            <x-custom-submit-button :opacity="'700'" :class="'mt-10'">Publish</x-custom-submit-button>
        </form>
    </x-setting>
</x-layout>
<x-js.image-viewer />