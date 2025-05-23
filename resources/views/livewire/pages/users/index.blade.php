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
                        <div class="extras">
                            <span wire:click="toggleStatus({{ $user->id }})" wire:loading.attr="disabled" wire:target="toggleStatus" class="{{ $user->isActive() ? 'border border-green-500 bg-green-100 text-green-900 text-xs p-1' : 'border border-red-500 bg-red-100 text-red-900 text-xs p-1' }}">{{ $user->status->label() }}</span>
                        </div>

                        <div class="info">
                            <div class="image {{ $user->isAdmin() ? 'border border-green-500 rounded-full' : '' }}">
                                <x-user-avatar :user="$user" />
                            </div>

                            <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
                            <p>{{ $user->email }}</p>
                            <p>{{ $user->phone_numbers }}</p>
                        </div>
                    </div>

                    <div class="actions">
                        <a href="{{ Route::has('user.edit') ? route('users.edit', $user->id) : '#' }}">Edit</a>
                        <form action="{{ Route::has('users.destroy') ? route('users.destroy', $user->id) : '#' }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>No users found.</p>
            @endforelse
        </div>
    </div>
</div>
