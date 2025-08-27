<x-layout titulo="Página Inicial">
    <style>
        .btn-primary {
            color: #fff;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 16px;
            font-weight: 500;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .btn-clientes {
            background-color: #2ecc71;
            border-color: #2ecc71;
        }

        .btn-clientes:hover {
            background-color: #27ae60;
            border-color: #27ae60;
        }

        .btn-funcionarios {
            background-color: #3498db;
            border-color: #3498db;
        }

        .btn-funcionarios:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .btn-projetos {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-projetos:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }

        @media (max-width: 768px) {
            .buttons-container {
                flex-direction: column;
                align-items: center;
            }
            .btn-primary {
                width: 80%;
                margin: 10px 0;
                text-align: center;
            }
        }
    </style>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="buttons-container d-flex justify-content-center gap-4">
            <a href="/clients" class="btn btn-primary btn-clientes">Clientes</a>
            <a href="/funcionarios" class="btn btn-primary btn-funcionarios">Funcionários</a>
            <a href="/projetos" class="btn btn-primary btn-projetos">Projetos</a>
        </div>
    </div>
</x-layout>
