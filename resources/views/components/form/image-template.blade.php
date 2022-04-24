@props(['thumbnail' => ''])
<div x-data="imageViewer()" class="mx-auto max-w-md mt-5 rounded-2xl bg-gray-200 text-black">
    <div class="flex items-center mx-auto">
        <input type="file" accept="image/*" @change="fileChosen" name="thumbnail" class="mt-6 max-w-xs rounded-2xl text-black">
        <template x-if="imageUrl">
            <img
                :src="imageUrl"
                alt="Post Illustration"
                width="160"
                class="p-2 text-center object-cover rounded-2xl border border-gray-200" 
            >
        </template>
        <template x-if="!imageUrl">
            <img
                src="{{ asset('storage/' . $thumbnail) }}"
                alt="Post Illustration"
                width="160"
                class="p-2 text-center object-cover rounded-2xl bg-gray-300 border border-gray-200"
            >
        </template>
    </div>
</div>