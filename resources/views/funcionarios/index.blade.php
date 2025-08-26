<x-layout titulo="Lista de Funcionários">
    <div class="flex justify-end my-3">
        <a class="bg-green-500 hover:bg-green-600 border rounded-md p-2 px-4 text-white transition"
            href="{{ route('funcionarios.create') }} ">
            Criar Funcionário
        </a>
    </div>

    <div class="relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs uppercase bg-gray-200 text-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3">Nome</th>
                    <th scope="col" class="px-6 py-3">CPF</th>
                    <th scope="col" class="px-6 py-3">Endereco</th>
                    <th scope="col" class="px-6 py-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($funcionarios as $funcionario)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $funcionario->nome }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $funcionario->cpf  }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $funcionario->address->endereco_completo ?? ''}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('funcionarios.edit', $funcionario->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 border rounded-md p-2 px-4 text-white transition w-24 inline-block text-center">Editar</a>

                            <form action="{{ route('funcionarios.demitir', $funcionario->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('PATCH')
                                <button
                                    class="bg-yellow-500 hover:bg-yellow-300 border rounded-md p-2 px-4 text-black disabled:text-white disabled:bg-gray-400 transition ml-2 w-24"
                                    onclick="return confirm('Tem certeza que deseja excluir este funcionario?')"
                                    {{ $funcionario->data_demissao ? 'disabled' : '' }}>
                                    {{ $funcionario->data_demissao ? 'Demitido' : 'Demitir' }}
                                </button>
                            </form>

                            <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-500 hover:bg-red-600 border rounded-md p-2 px-4 text-white transition ml-2 w-24"
                                    onclick="return confirm('Tem certeza que deseja excluir este funcionario?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 italic">
                            Nenhum funcionario cadastrado.
                        </td>
                    </tr>

                @endforelse
            </tbody>
        </table>

        {{ $funcionarios->links()  }}
    </div>
</x-layout>