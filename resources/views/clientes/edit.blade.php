 <x-layout titulo="Editar Cliente">
    <form method="post" action="{{ route('clients.update', $cliente) }}" class="max-w-6xl mx-auto">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do
                cliente</label>
            <input type="text" value="{{ $cliente->nome }}" id="nome" name="nome"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
        </div>
        <div class="mb-5">
            <label for="endereco" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço do
                cliente</label>
            <input type="text" value="{{ $cliente->endereco }}" id="endereco" name="endereco"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
        </div>
        <div class="mb-5">
            <label for="descricao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição do
                cliente</label>
            <input type="text" value="{{ $cliente->descricao }}" id="descricao" name="descricao"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Atualizar
            Cliente</button>
    </form>
</x-layout>