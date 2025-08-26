<x-layout titulo="Cadastrar novo Funcionário">
    <form method="post" action="{{ route('funcionarios.store') }}" class="max-w-6xl mx-auto">
        @csrf
        <fieldset class="border p-4 rounded-lg mb-5">
            <legend class="text-lg font-medium text-gray-900 px-2">Dados do Funcionário </legend>
            <div class="mb-5">
                <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nome do
                    funcionário</label>
                <input type="text" value="{{old('nome')}}" id="nome" name="nome"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="mb-5">
                <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">CPF do
                    funcionário</label>
                <input type="text" value="{{ old('cpf') }}" id="cpf" name="cpf"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="mb-5">
                <label for="data_contratacao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Data
                    de
                    Contratacão</label>
                <input type="text" value="{{ old('data_contratacao') }}" id="data_contratacao" name="data_contratacao"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
        </fieldset>

        <fieldset class="border p-4 rounded-lg mb-5">
            <legend class="text-lg font-medium text-gray-900 px-2">Endereço</legend>
            <div class="mb-5">
                <label for="logradouro"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Logradouro</label>
                <input type="text" value="{{ old('logradouro') }}" id="logradouro" name="logradouro"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="mb-5">
                <label for="numero" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Número</label>
                <input type="text" value="{{ old('numero') }}" id="numero" name="numero" maxlength="5"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="mb-5">
                <label for="bairro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Bairro</label>
                <input type="text" value="{{ old('bairro') }}" id="bairro" name="bairro" maxlength="50"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="mb-5">
                <label for="cidade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Cidade</label>
                <input type="text" value="{{ old('cidade') }}" id="cidade" name="cidade" maxlength="50"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="mb-5">
                <label for="complemento"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Complemento</label>
                <input type="text" value="{{ old('complemento') }}" id="complemento" name="complemento" maxlength="50"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <div class="mb-5">
                <label for="cep" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">CEP</label>
                <input type="text" value="{{ old('cep') }}" id="cep" name="cep" maxlength="9"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <x-select name="estado" labelTitulo="Estado" :lista="$lista"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
           focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600
           dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" />

        </fieldset>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cadastrar
            Funcionário</button>
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
        </script>
    @endpush
</x-layout>