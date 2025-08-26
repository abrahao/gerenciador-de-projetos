<x-layout titulo="Lista de Clientes">
    <div class="flex justify-end my-3">
        <a class="bg-green-500 hover:bg-green-600 border rounded-md p-2 px-4 text-white transition"
            href="{{ route('clients.create') }} ">
            Criar cliente
        </a>
    </div>

    <div class="relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs uppercase bg-gray-200 text-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3">Nome</th>
                    <th scope="col" class="px-6 py-3">Endereço</th>
                    <th scope="col" class="px-6 py-3">Descrição</th>
                    <th scope="col" class="px-6 py-3">Projetos</th>
                    <th scope="col" class="px-6 py-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clientes as $cliente)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $cliente->nome }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cliente->endereco }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $cliente->descricao }}
                        </td>
                        <td class="px-6 py-4">
                            @forelse ($cliente->projects as $projeto)
                                {{ $projeto->nome }}@if (!$loop->last), @endif
                            @empty
                                <span class="text-gray-400 italic">Nenhum projeto</span>
                            @endforelse
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('clients.edit', $cliente->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 border rounded-md p-2 px-4 text-white transition w-24 inline-block text-center">Editar</a>

                            <form action="{{ route('clients.destroy', $cliente->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-600 border rounded-md p-2 px-4 text-white transition ml-2 w-24"
                                    onclick="return confirm('Tem certeza que deseja excluir este cliente?')">
                                    Excluir
                                </button>

                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 italic">
                            Nenhum cliente cadastrado.
                        </td>
                    </tr>

                @endforelse
            </tbody>
        </table>

        {{ $clientes->links()  }}
    </div>
</x-layout>