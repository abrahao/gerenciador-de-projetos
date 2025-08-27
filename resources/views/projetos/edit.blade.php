<x-layout titulo="Editar Cliente">
    <form method="post" action="{{ route('projetos.update', $projeto) }}" class="max-w-6xl mx-auto">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do
                projeto</label>
            <input type="text" value="{{ $projeto->nome }}" id="nome" name="nome" maxlength="100"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
        </div>
        <div class="mb-5">
            <label for="orcamento"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Orçamento</label>
            <input type="text" step="0.01" value="{{ $projeto->orcamento }}" id="orcamento" name="orcamento"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
        </div>
        <div class="mb-5">
            <label for="data_inicio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de
                Início</label>
            <input type="date" value="{{ \Carbon\Carbon::parse($projeto->data_inicio)->format('Y-m-d') }}"
                id="data_inicio" name="data_inicio"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">

        </div>
        <div class="mb-5">
            <label for="data_final" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data
                Final</label>
            <input type="date" value="{{ $projeto->data_final }}" id="data_final" name="data_final"                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">


        </div>
        <div class="mb-5">
            <label for="client_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cliente</label>
            <select id="client_id" name="client_id"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                <option value="">Selecione um cliente</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $projeto->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Atualizar
            Projeto</button>
    </form>

    @push('scripts')
        <script src="https://unpkg.com/imask"></script>
        <script>
            IMask(document.getElementById('cpf'), {
                mask: '000.000.000-00'
            });

            IMask(document.getElementById('cep'), {
                mask: '00000-000'
            });

            IMask(document.getElementById('data_contratacao'), {
                mask: '00/00/0000'
            });

            IMask(document.getElementById('orcamento'), {
                mask: Number,
                scale: 2,
                signed: false,
                thousandsSeparator: '.',
                padFractionalZeros: true,
                normalizeZeros: true,
                radix: ',',
                mapToRadix: ['.'],
                min: 1,
                autofix: true
            });
        </script>
    @endpush
</x-layout>