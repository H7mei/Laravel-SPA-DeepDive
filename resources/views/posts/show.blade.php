<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
      {{ __('Posts') }}
    </h2>
    <Link href="{{ route('posts.index') }}"
      class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
    <- kembali </Link>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <dl class="bg-white shadow-lg p-4 rounded-lg">
        <dt class="text-lg font-semibold text-gray-700">Title</dt>
        <dd class="text-xl text-blue-500">{{ $post->title }}</dd>

        <dt class="text-lg font-semibold text-gray-700">Slug</dt>
        <dd class="text-xl text-blue-500">{{ $post->slug }}</dd>

        <dt class="text-lg font-semibold text-gray-700">Description</dt>
        <dd class="text-xl text-blue-500">{{ $post->description }}</dd>

        <dt class="text-lg font-semibold text-gray-700">Created At</dt>
        <dd class="text-xl text-blue-500">{{ $post->created_at }}</dd>
      </dl>
    </div>
  </div>
</x-app-layout>
