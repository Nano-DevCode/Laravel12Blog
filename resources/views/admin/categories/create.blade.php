<x-layouts.admin>
    <div class="flex items-center justify-between mb-6">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{route('admin.dashboard')}}">
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{route('admin.categories.index')}}">
                Categorías
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="#">
                Creacion de Categoría
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <form action="{{route('admin.categories.store')}}" method="POST" class="px-6 py-8 rounded shadow-lg space-y-4">
        @csrf

        <flux:field>
            <flux:label>Nombre de la Categoria</flux:label>
            <flux:input name="name" value="{{old('name')}}"/>
            <flux:error name="name" />
        </flux:field>

        <div class="flex justify-center">
            <flux:button variant="primary" type="submit">
                Crear Categoria
            </flux:button>
        </div>
    </form>

</x-layouts.admin>
