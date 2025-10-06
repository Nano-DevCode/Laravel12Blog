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
                Creacion de Rol
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <form action="{{route('admin.roles.store')}}" method="POST" class="px-6 py-8 rounded shadow-lg space-y-4">
        @csrf

        <flux:field>
            <flux:label>Nombre del Rol</flux:label>
            <flux:input name="name" value="{{old('name')}}"/>
            <flux:error name="name" />
        </flux:field>

        <flux:field>
            <flux:label>Permisos</flux:label>
            <ul>
                @foreach ($permissions as $permission)
                    <li>
                        <label class="flex items-center">
                            <input type="checkbox" name="permissions[]" value="{{$permission->id}}" @checked(in_array($permission->id, old('permissions', [])))>
                            <span class="ml-1"> {{$permission->name}}</span>
                        </label>
                    </li>
                @endforeach
            </ul>
            <flux:error name="permissions[]" />
        </flux:field>

        <div class="flex justify-center">
            <flux:button variant="primary" type="submit">
                Crear Rol
            </flux:button>
        </div>
    </form>

</x-layouts.admin>
