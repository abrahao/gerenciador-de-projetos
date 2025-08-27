<x-layout titulo="Lista de Projetos">
    <div class="flex justify-end my-3">
        <a class="bg-green-500 hover:bg-green-600 border rounded-md p-2 px-4 text-white transition"
            href="{{ route('projetos.create') }} ">
            Criar Projeto
        </a>
    </div>

    <div class="relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs uppercase bg-gray-200 text-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3">Nome</th>
                    <th scope="col" class="px-6 py-3">Orçamento</th>
                    <th scope="col" class="px-6 py-3">Data Início</th>
                    <th scope="col" class="px-6 py-3">Data Final</th>
                    <th scope="col" class="px-6 py-3">Cliente</th>
                    <th scope="col" class="px-6 py-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projetos as $projeto)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $projeto->nome }}
                        </td>
                        <td class="px-6 py-4">
                            R$ {{ number_format($projeto->orcamento, 2, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($projeto->data_inicio)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($projeto->data_final)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $projeto->client->nome }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('projetos.edit', $projeto->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 border rounded-md p-2 px-4 text-white transition w-24 inline-block text-center">Editar</a>

                            <form action="{{ route('projetos.destroy', $projeto->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-500 hover:bg-red-600 border rounded-md p-2 px-4 text-white transition ml-2 w-24"
                                    onclick="return confirm('Tem certeza que deseja excluir este projeto?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500 italic">
                            Nenhum projeto cadastrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $projetos->links() }}
    </div>
</x-layout>