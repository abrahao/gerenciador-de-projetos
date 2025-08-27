<x-layout titulo="Cadastrar novo Projeto">
    <form method="post" action="{{ route('projetos.store') }}" class="max-w-6xl mx-auto">
        @csrf
        <div class="mb-5">
            <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nome do
                Projeto</label>
            <input type="text" value="{{old('nome')}}" id="nome" name="nome" maxlength="100"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
        </div>
        <div class="mb-5">
            <label for="orcamento"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Orçamento</label>
            <input type="text" step="0.01" value="{{ old('orcamento') }}" id="orcamento" name="orcamento"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
        </div>
        <div class="mb-5">
            <label for="data_inicio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Data de
                Início</label>
            <input type="text" id="data_inicio" name="data_inicio"
                value="{{ old('data_inicio') ? \Carbon\Carbon::createFromFormat('d/m/Y', old('data_inicio'))->format('Y-m-d') : '' }}"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
        </div>

        <div class="mb-5">
            <label for="data_final" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Data
                Final</label>
            <input type="text" id="data_final" name="data_final"
                value="{{ old('data_final') ? \Carbon\Carbon::createFromFormat('d/m/Y', old('data_final'))->format('Y-m-d') : '' }}"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
        </div>
        <div class="mb-5">
            <label for="client_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Cliente</label>
            <select id="client_id" name="client_id"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                <option value="">Selecione um cliente</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                        {{ $client->nome }}
                    </option>
                @endforeach
            </select>

        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cadastrar
            Projeto</button>
    </form>

    @push('scripts')
        <script src="https://unpkg.com/imask"></script>
        <script>
            IMask(
                document.getElementById('data_inicio'), {
                mask: '00/00/0000'
            });
            IMask(
                document.getElementById('data_final'), {
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