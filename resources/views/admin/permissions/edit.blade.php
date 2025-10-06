<x-layouts.admin>

    <div class="flex items-center justify-between mb-6">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{route('admin.dashboard')}}">
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{route('admin.permissions.index')}}">
                Persmisos
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">
                Editar
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <form action="{{route('admin.permissions.update', $permission)}}" method="POST" class="px-6 py-8 rounded shadow-lg space-y-4">
        @csrf

        @method('PUT')

        <flux:field>
            <flux:label>Nombre del Persmiso</flux:label>
            <flux:input name="name" value="{{old('name', $permission->name)}}"/>
            <flux:error name="name" />
        </flux:field>

        <div class="flex justify-center">
            <flux:button variant="primary" type="submit">
                Actualizar Permiso
            </flux:button>
        </div>
    </form>

</x-layouts.admin>
