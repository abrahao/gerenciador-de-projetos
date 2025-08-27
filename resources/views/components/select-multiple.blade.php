@php
    $nome = $attributes->get('name');
    $labelTitulo = $attributes->get('labelTitulo', 'Estado');
@endphp

<div class="mb-5">
    <x-label for="{{ $nome }}" titulo="{{ $labelTitulo }}" />

    <select
    multiple
        id="{{ $nome }}"
        name="{{ $nome }}[]"
        {{ $attributes->except(['name', 'labelTitulo', 'lista']) }}
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
               focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600
               dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
    >
        <option value="">UF</option>

        @foreach($lista as $item)
            <option value="{{ $item->name }}" {{ old($nome) == $item->name ? 'selected' : '' }}>
                {{ $item->value }}
            </option>
        @endforeach
    </select>
</div>
