<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
        {{ __('Categories') }}
      </h2>
      <Link href="{{ route('categories.create') }}"
        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
      Create
      </Link>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <x-splade-table :for="$categories">
        @cell('action', $category)
          <Link href="{{ route('categories.show', $category->id) }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Show
          </Link>
          <Link href="{{ route('categories.edit', $category->id) }}"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-1">
          Edit
          </Link>
          <Link confirm="Delete Category..." confirm-text="Are you sure?" confirm-button="Yes, take me there!"
            cancel-button="No, keep me save!" href="{{ route('categories.destroy', $category->id) }}"
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" method="DELETE" preserve-scroll>
          Delete
          </Link>
        @endcell
      </x-splade-table>
    </div>
  </div>
</x-app-layout>
