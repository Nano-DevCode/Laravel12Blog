<x-layouts.admin>

    <div class="flex items-center justify-between mb-6">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{route('admin.dashboard')}}">
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{route('admin.users.index')}}">
                Usuarios
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">
                Editar
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <form action="{{route('admin.users.update', $user)}}" method="POST" class="px-6 py-8 rounded shadow-lg space-y-4">
        @csrf

        @method('PUT')

        <flux:field>
            <flux:label>Nombre Usuario</flux:label>
            <flux:input name="name" value="{{old('name', $user->name)}}"/>
            <flux:error name="name" />
        </flux:field>

        <flux:field>
            <flux:label>Correo del Usuario</flux:label>
            <flux:input type="email" name="email" value="{{old('email', $user->email)}}"/>
            <flux:error name="email" />
        </flux:field>

        <flux:field>
            <flux:label>Contraseña del Usuario</flux:label>
            <flux:input type="password" name="password"/>
            <flux:error name="password" />
        </flux:field>

        <flux:field>
            <flux:label>Confirmar contraseña del Usuario</flux:label>
            <flux:input type="password" name="password_confirmation"/>
            <flux:error name="password_confirmation" />
        </flux:field>

        <flux:field>
            <flux:label>Permisos</flux:label>
            <ul>
                @foreach ($roles as $role)
                    <li>
                        <label class="flex items-center">
                            <input type="checkbox" name="roles[]" value="{{$role->id}}" >
                            <span class="ml-1"> {{$role->name}}</span>
                        </label>
                    </li>
                @endforeach
            </ul>
            <flux:error name="roles[]" />
        </flux:field>

        <div class="flex justify-center">
            <flux:button variant="primary" type="submit">
                Actualizar Permiso
            </flux:button>
        </div>
    </form>

</x-layouts.admin>
