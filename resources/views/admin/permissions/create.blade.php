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
                Crear
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="flex justify-end mb-6">
        <a class="btn btn-green" href="{{route('admin.categories.create')}}">
            Nueva Categoría
        </a>
    </div>
</x-layouts.admin>
