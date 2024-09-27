<flux:row>
    <flux:cell class="flex items-center gap-3" variant="strong">
        <flux:avatar size="xs" src="{{ $user->gravatarUrl() }}"/>
        {{ $user->name }}
    </flux:cell>

    <flux:cell class="whitespace-nowrap">{{ $user->created_at->format('d M, Y') }}</flux:cell>

    <flux:cell>
        @if ($user->isAdmin())
            <flux:badge size="sm" color="orange" inset="top bottom">Admin</flux:badge>
        @else
            <flux:badge size="sm" color="blue" inset="top bottom">User</flux:badge>
        @endif
    </flux:cell>

    <flux:cell align="right">
        <flux:dropdown align="end" offset="-15">
            <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom"></flux:button>

            <flux:menu class="min-w-32">
                <flux:modal.trigger name="edit-user-modal" >
                    <flux:menu.item icon="pencil-square">Edit</flux:menu.item>
                </flux:modal.trigger>
                @if (auth()->user()->id != $user->id)
                    <flux:menu.item wire:click="remove" icon="trash" variant="danger">Delete</flux:menu.item>
                @endif
            </flux:menu>
        </flux:dropdown>

        <flux:modal name="user-delete" class="min-w-[22rem]">
            <form class="space-y-6" wire:submit="$parent.deleteUser({{ $user->id }})">
                <div>
                    <flux:heading size="lg">Delete User?</flux:heading>
                    <flux:subheading>
                        <p>Do you want to delete this user?</p>
                        <p>This action cannot be undone!</p>
                    </flux:subheading>
                </div>
                <div class="flex">
                    <flux:spacer />
                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="danger">Delete User</flux:button>
                </div>
            </form>
        </flux:modal>

    </flux:cell>



</flux:row>
