<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
      {{ __('New Categories') }}
    </h2>
    <Link href="{{ route('categories.index') }}"
      class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
    <- kembali </Link>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <x-splade-form :action="route('categories.store')" class="mx-auto p-4 bg-white rounded-md" method="POST">
        <x-splade-input name="name" label="Name" />

        <x-splade-input name="slug" label="slug" />

        <x-splade-submit class="mt-4" />
      </x-splade-form>
    </div>
  </div>
</x-app-layout>
