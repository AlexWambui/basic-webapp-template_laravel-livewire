<div class="Users">
    <div class="container">
        <div class="header">
            <h2>Users</h2>
            <div class="search">
                <input type="text" placeholder="Search...">
                <button>Search</button>
            </div>
            <div class="button">
                <a href="{{ Route::has('users.create') ? route('users.create') : '#' }}">Create User</a>
            </div>
        </div>

        <div class="users">
            @forelse ($users as $user)
                <div class="user" wire:key="user-{{ $user->id }}">
                    <div class="details">
                        <div class="info">
                            <div class="image {{ $user->isAdmin() ? 'border border-green-500 rounded-full' : '' }}">
                                <x-user-avatar :user="$user" />
                            </div>

                            <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                            <p class="{{ $user->email_verified_at === null ? 'text-red-600 font-bold' : '' }}">{{ $user->email }}</p>
                            <p>{{ $user->phone_numbers }}</p>
                        </div>
                    </div>

                    @if(!$user->isAdmin())
                        <div class="actions">
                            <div class="others">
                                <span wire:click="toggleStatus({{ $user->id }})" wire:loading.attr="disabled" wire:target="toggleStatus" class="{{ $user->isActive() ? 'border border-green-500 bg-green-100 text-green-900 text-xs p-1' : 'border border-red-500 bg-red-100 text-red-900 text-xs p-1' }}">{{ $user->status->label() }}</span>
                            </div>
                            <div class="crud">
                                <a href="{{ Route::has('users.edit') ? route('users.edit', ['uuid' => $user->uuid]) : '#' }}" class="inline-flex items-center">
                                    <x-svgs.edit class="w-4 h-4 mr-1 text-green-600" />
                                </a>
                                <button x-data="" x-on:click.prevent="$wire.set('delete_user_id', {{ $user->id }}); $dispatch('open-modal', 'confirm-user-deletion')" class="btn_transparent" >
                                    <x-svgs.trash class="w-4 h-4 text-red-600" />
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            @empty
                <p>No users found.</p>
            @endforelse
        </div>
    </div>

    <x-modal name="confirm-user-deletion" :show="$delete_user_id !== null" focusable>
        <div class="custom_form">
            <form wire:submit="deleteUser" @submit="$dispatch('close-modal', 'confirm-user-deletion')" class="p-6">
                <h2 class="text-lg font-semibold text-gray-900">
                    Confirm Deletion
                </h2>

                <p class="mt-2 mb-4 text-sm text-gray-600">
                    Are you sure you want to permanently delete this user?
                </p>

                <div class="mt-6 flex justify-start">
                    <button type="button" class="mr-2" x-on:click="$dispatch('close-modal', 'confirm-user-deletion')">
                        Cancel
                    </button>
                    <button type="submit" class="btn_danger">
                        Delete User
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</div>
