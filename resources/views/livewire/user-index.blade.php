<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <flux:table :paginate="$users" size="xs" class="mt-8">
        <flux:columns>
            <flux:column sortable :sorted="$sortBy == 'name'" :direction="$sortDirection" wire:click="sort('name')">User</flux:column>
            <flux:column sortable :sorted="$sortBy == 'created_at'" :direction="$sortDirection" wire:click="sort('created_at')">Joined</flux:column>
            <flux:column>Role</flux:column>
        </flux:columns>

        <flux:rows>
            @foreach ($users as $user)
                <livewire:user-row :$user :key="$user->id" />
            @endforeach
        </flux:rows>
    </flux:table>

</div>
