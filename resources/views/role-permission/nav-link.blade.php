<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold  text-gray-800 leading-tight">
        {{ __('Permissions') }}
    </h2>
</x-slot>

<div class="container mt-3">
    <a href="{{ url('roles') }}" class="btn btn-primary mx-1">Roles</a>
    <a href="{{ url('permissions') }}" class="btn btn-info mx-1">Permissions</a>
    <a href="{{ url('users') }}" class="btn btn-warning mx-1">Users</a>


</div>
</x-app-layout>