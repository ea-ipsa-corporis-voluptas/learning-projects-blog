<x-layout>
    <x-setting :class="'max-w-5xl mx-auto'" :heading="'Edit Post'" :edit="$post->title" :headerWidth="'max-w-xl'">
        <form action="/admin/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data" class="mt-20">
            @csrf
            @method('PATCH')
            <x-custom-panel :padding="'w-8/12 p-6'" :opacity="'700'">
                <!-- title -->
                <x-form.input :name="'title'" :sizing="'w-full'" :value="old('title', $post->title)" />
                <!-- status -->
                <x-admin.value-dropdown :name="'status'" :heading="'Status'">
                    <option
                        value="draft"
                        class="tracking-tight"
                        style="font-family: monospace, cursive; font-weight: 500;"
                        {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}
                    >draft</option>
                    <option
                        value="published"
                        class="tracking-tight"
                        style="font-family: monospace, cursive; font-weight: 500;"
                        {{ old('status', $post->status) === 'published' ? 'selected' : '' }}
                    >published</option>
                </x-admin.value-dropdown>
                <!-- slug -->
                <x-form.input :name="'slug'" :sizing="'w-full'" :value="old('slug', $post->slug)" />
                <!-- category -->
                <x-admin.value-dropdown :name="'category_id'" :heading="'Category'">
                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            class="tracking-tight"
                            value="{{ $category->id }}"
                            style="font-family: Lucida Console, cursive; font-weight: 500;"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </x-admin.value-dropdown>
                <!-- author -->
                <x-form.input :name="'author'" :sizing="'w-full'" :value="old('author', $post->author->userName)" />
            </x-custom-panel>
            <x-custom-panel :padding="'w-9/12 p-3 mt-20'" :opacity="'700'">
                <!-- thumbnail -->
                <x-form.image-template :thumbnail="$post->thumbnail" />
                <!-- excerpt -->
                <x-form.textarea :name="'excerpt'" :padding="false" :sizing="'w-full'" :class="'mt-16 mb-8'" :type="'file'" :rows="'4'"
                :value="old('excerpt', $post->excerpt)" />
            </x-custom-panel>
            <x-custom-panel :padding="'w-11/12 p-3'" :opacity="'700'" :class="'mt-10'">
                <!-- body -->
                <x-form.textarea :name="'body'" :sizing="'w-full'" :rows="'8'" :value="old('body', $post->body)" />
            </x-custom-panel>
            <x-custom-submit-button :opacity="'700'" :class="'mt-10'">Update</x-custom-submit-button>
        </form>
    </x-setting>
</x-layout>
<x-js.image-viewer />