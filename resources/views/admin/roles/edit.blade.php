<x-layouts.admin>
    <div class="flex items-center justify-between mb-6">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{route('admin.dashboard')}}">
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{route('admin.roles.index')}}">
                Roles
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">
                Edición de Rol
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <form action="{{route('admin.roles.update', $role)}}" method="POST" class="px-6 py-8 rounded shadow-lg space-y-4">
        @csrf

        @method('PUT')

        <flux:field>
            <flux:label>Nombre del Rol</flux:label>
            <flux:input name="name" value="{{old('name', $role->name)}}"/>
            <flux:error name="name" />
        </flux:field>

        <flux:field>
            <flux:label>Roles</flux:label>
            <ul>
                @foreach ($roles as $role)
                    <li>
                        <label class="flex items-center">
                            <input type="checkbox" name="roles[]" value="{{$role->id}}" @checked(in_array($role->id, old('roles',[])))>
                            <span class="ml-1"> {{$permission->name}}</span>
                        </label>
                    </li>
                @endforeach
            </ul>
            <flux:error name="roles[]" />
        </flux:field>

        <div class="flex justify-center">
            <flux:button variant="primary" type="submit">
                Actualizar Rol
            </flux:button>
        </div>
    </form>
</x-layouts.admin>
