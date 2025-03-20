<x-layouts.app :title="__('Create User')">

    <h2 class="text-2xl font-semibold mb-4">Edit User</h2>
    <form method="POST" action="{{ route('admin.users.update', $users->id) }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PATCH')
        <div class="flex items-center space-x-4">
            <div class="w-24 h-24 rounded-full overflow-hidden border border-gray-300 dark:border-gray-600">
                <img id="avatarPreview" src="{{asset('/assets/img/avatars/'. ($user->profile_photo_path ?? 'default-avatar.jpg'))}}" alt="Avatar" class="w-full h-full object-cover">
            </div>
            <div>
                <flux:input type="file" wire:model="avatar" label="Avatar"/>                    
            </div>
        </div>
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

            <flux:checkbox.group wire:model="group" label="Group">
                <flux:checkbox label="Admins" value="admin" />
                <flux:checkbox label="Editor" value="editor" />
                <flux:checkbox label="User" value="user" />
            </flux:checkbox.group>
        </div>
        <div class="flex items-center justify-between">
            <flux:button variant="primary" type="submit">{{ __('Save') }}</flux:button>
            {{-- <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none">Save Changes</button> --}}
            <a href="{{ route('admin.users.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline">Cancel</a>
        </div>
    </form>

</x-layouts.app>
