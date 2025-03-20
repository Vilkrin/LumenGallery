<x-layouts.app :title="__('Create User')">
  <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <h2 class="text-2xl font-semibold mb-4">Create User</h2>
    <form method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
        <div>
            <flux:input wire:model="name" label="Username" />
        </div>
        <div>
            <flux:input class="mb-6" label="Email" wire:model="email" />
        </div>
        <div class="mb-6 flex *:w-1/2 gap-4">
            <flux:input type="password" label="Password" />
            <flux:input type="password" label="Confirm password" wire:model="password_confirmation" />
        </div>
        <div class="mb-6 flex *:w-1/2 gap-4">
            <flux:checkbox.group wire:model="role" label="Role">
                <flux:checkbox label="Admin" value="admin" />
                <flux:checkbox label="Editor" value="editor" />
                <flux:checkbox label="User" value="user" />
            </flux:checkbox.group>
        </div>
        <div class="flex items-center justify-between">
            <flux:button variant="primary" type="submit">{{ __('Save') }}</flux:button>
            {{-- <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none">Save Changes</button> --}}
            <a href="/admin/users" class="text-gray-600 dark:text-gray-300 hover:underline">Cancel</a>
        </div>
    </form>
  </div>
</x-layouts.app>
