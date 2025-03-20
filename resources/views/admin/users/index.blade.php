<x-layouts.app :title="__('Dashboard')">
  <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <h1>User Management</h1>
       <!-- Users Table -->
       <x-table>        
        <x-slot name="advancedheader">
            @if (session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-sm relative mb-4">
                {{ session('message') }}
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                    &times;
                </button>
            </div>
            @endif
        
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <flux:input icon="magnifying-glass" placeholder="Search users" />
                </div>
                
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 shrink-0">
                    <!-- Roles & Permissions Button -->
                    <flux:button href="{{ route('admin.users.roles') }}" icon="plus">Roles & Permissions</flux:button>
                    <!-- Add User Button -->
                    <flux:modal.trigger name="add-user">
                        <flux:button icon="user-plus">Add User</flux:button>
                    </flux:modal.trigger>
                </div>
            </div>
        </x-slot>
        <x-slot name="head">
            <x-table.heading>Avatar</x-table.heading>
            <x-table.heading>Username</x-table.heading>
            <x-table.heading>Email</x-table.heading>
            <x-table.heading>Email Verified</x-table.heading>
            <x-table.heading>Account Created</x-table.heading>
            <x-table.heading>Status</x-table.heading>
            <x-table.heading>Role</x-table.heading>
            <x-table.heading>2fa Status</x-table.heading>
            <x-table.heading>Actions</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @foreach ( $users as $user )
            <x-table.row> 
                <x-table.cell><img src="{{asset('/assets/img/avatars/'. ($user->profile_photo_path ?? 'default-avatar.jpg'))}}" class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" alt="avatar"></x-table.cell>
                <x-table.cell>{{ $user->name }}</x-table.cell>
                <x-table.cell>{{ $user->email }}</x-table.cell>
                <x-table.cell>{{ $user->email_verified_at }}</x-table.cell>
                <x-table.cell>{{ $user->created_at }}</x-table.cell>
                <x-table.cell>Soon</x-table.cell>
                <x-table.cell>{{ $user->getRoleNames()->implode(', ') }}</x-table.cell>
                <x-table.cell>{{ $user->two_factor_confirmed_at }}</x-table.cell>
                <x-table.cell>
                    <div class="flex items-center space-x-4">
                        <!-- View Button -->
                            <flux:button class="cursor-pointer" href="{{ route('admin.users.show', $user->id) }}" icon="eye">View</flux:button>

                            <!-- Edit Button -->
                            <flux:button class="cursor-pointer" href="{{ route('admin.users.edit', $user->id) }}" icon="pencil-square">Edit</flux:button>

                        <!-- Delete Button -->
                        {{-- <form method="POST" action="{{ route('admin.users.delete', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <flux:modal.trigger name="delete-user-{{ $user->id }}">
                                <flux:button class="cursor-pointer" icon="trash" variant="danger">Delete</flux:button>
                            </flux:modal.trigger>
                           
                        </form> --}}

                        <flux:modal.trigger name="delete-user-{{ $user->id }}">
                            <flux:button class="cursor-pointer" icon="trash" variant="danger">Delete</flux:button>
                        </flux:modal.trigger>
                    </div>
                </x-table.cell>
            </x-table.row>
            @endforeach

        </x-slot>

        
    </x-table>
    <div class="py-2 px-2">
        {{ $users->links() }}
    </div>
  </div>



<flux:modal name="delete-user-{{ $user->id }}" class="min-w-[22rem]">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Delete User?</flux:heading>

            <flux:subheading>
                <p>You're about to delete <strong>{{ $user->name }}</strong>.</p>
                <p>This action cannot be reversed.</p>
            </flux:subheading>
        </div>

        <div class="flex gap-2">
            <flux:spacer />

            <flux:modal.close>
                <flux:button variant="ghost">Cancel</flux:button>
            </flux:modal.close>

             <flux:button variant="danger" wire:click="deleteUser({{ $user->id }})"
                >Delete User</flux:button>
        </div>
    </div>
</flux:modal>

<flux:modal name="add-user" class="md:w-96">
    <form method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
        @csrf
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Create User</flux:heading>
            <flux:subheading>Adding a new user.</flux:subheading>
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
            {{-- <flux:select variant="listbox" placeholder="Select role...">
                <flux:select.option>
                    <div class="flex items-center gap-2">
                        <flux:icon.shield-check variant="mini" class="text-zinc-400" /> Owner
                    </div>
                </flux:select.option>
            
                <flux:select.option>
                    <div class="flex items-center gap-2">
                        <flux:icon.key variant="mini" class="text-zinc-400" /> Administrator
                    </div>
                </flux:select.option>
            
                <flux:select.option>
                    <div class="flex items-center gap-2">
                        <flux:icon.user variant="mini" class="text-zinc-400" /> Member
                    </div>
                </flux:select.option>
            
                <flux:select.option>
                    <div class="flex items-center gap-2">
                        <flux:icon.eye variant="mini" class="text-zinc-400" /> Viewer
                    </div>
                </flux:select.option>
            </flux:select> --}}
        </div>

        <div class="flex">
            <flux:spacer />

            <flux:button type="submit" variant="primary">{{ __('Create User') }}</flux:button>
        </div>
    </div>
    </form>
</flux:modal>
</x-layouts.app>
