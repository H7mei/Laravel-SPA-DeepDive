<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
        {{ __('Posts') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <x-splade-form :action="route('posts.update', $post->id)" :default="$post" class="mx-auto p-4 bg-white rounded-md" method="PUT">
        <x-splade-select name="category_id" :options="$categories" label="Category" />

        <x-splade-input name="title" label="Title" />

        <x-splade-textarea name="description" label="Description" autosize />

        <x-splade-input name="slug" label="Slug" />

        <x-splade-submit class="mt-4" />
      </x-splade-form>
    </div>
  </div>
</x-app-layout>
