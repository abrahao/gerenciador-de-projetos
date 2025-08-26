<nav class="bg-gray-300">
    <div class="container mx-auto flex items-center justify-between p-4">
        <a href="../" class="text-2xl font-semibold">MinhaAplicacao</a>

        <ul class="font-medium flex">
            <li class="px-4">
                <a href="{{ route('clients.create') }}">Cadastro de Clientes</a>
            </li>
            <li class="px-4">
                <a href="{{ route('funcionarios.create') }}">Cadastro de funcionário</a>
            </li>
        </ul>
    </div>
</nav>