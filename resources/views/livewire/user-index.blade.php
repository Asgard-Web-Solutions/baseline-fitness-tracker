<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <flux:table :paginate="$users" size="xs">
        <flux:columns>
            <flux:column sortable :sorted="$sortBy == 'name'" :direction="$sortDirection" wire:click="sort('name')">User</flux:column>
            <flux:column sortable :sorted="$sortBy == 'created_at'" :direction="$sortDirection" wire:click="sort('created_at')">Joined</flux:column>
            <flux:column>Role</flux:column>
        </flux:columns>

        <flux:rows>
            @foreach ($users as $user)
                <flux:row :key="$user->id">
                    <flux:cell class="flex items-center gap-3">
                        <flux:avatar size="xs" src="{{ $user->gravatarUrl() }}" />
                        {{ $user->name }}
                    </flux:cell>
                    <flux:cell class="whitespace-nowrap">{{ $user->created_at }}</flux:cell>
                    <flux:cell>
                        @if ($user->isAdmin())
                            <flux:badge size="sm" color="red" inset="top bottom">Admin</flux:badge>
                        @else
                            <flux:badge size="sm" color="blue" inset="top bottom">User</flux:badge>
                        @endif
                    </flux:cell>
                    <flux:cell align="right">
                        <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom"></flux:button>
                    </flux:cell>
                </flux:row>
            @endforeach
        </flux:rows>
    </flux:table>

    {{-- {{ $users->links() }} --}}
</div>
