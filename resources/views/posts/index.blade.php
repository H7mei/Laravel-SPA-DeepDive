<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
        {{ __('Posts') }}
      </h2>
      <Link href="{{ route('posts.create') }}"
        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
      Create
      </Link>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <x-splade-table :for="$posts">
        @cell('action', $post)
          <Link href="{{ route('posts.show', $post->id) }}"
            class="bg-indigo-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Show
          </Link>
          <Link href="{{ route('posts.edit', $post->id) }}"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-1">
          Edit
          </Link>
          <Link confirm="Delete Post..." confirm-text="Are you sure?" confirm-button="Yes, take me there!"
            cancel-button="No, keep me save!" href="{{ route('posts.destroy', $post->id) }}"
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" method="DELETE" preserve-scroll>
          Delete
          </Link>
        @endcell
      </x-splade-table>
    </div>
  </div>
</x-app-layout>
