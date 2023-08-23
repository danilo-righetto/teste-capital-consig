<x-layout title="Clients">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3 mb-lg-5">
                <div class="overflow-hidden card table-nowrap table-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Clientes</h5>
                        <a href="#!" class="btn btn-light btn-sm">Deletar todos</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>CPF</th>
                                    <th>Data Nasc.</th>
                                    <th>Cidade / Estado</th>
                                    <th class="text-end">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    {{-- {{ dd($client) }} --}}
                                    <tr class="align-middle">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="h6 mb-0 lh-1">{{ $client->nome }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $client->email }}</td>
                                        <td> <span
                                                class="d-inline-block align-middle">{{ Str::limit($client->cpf, 3) }}</span>
                                        </td>
                                        <td><span>{{ date('d-m-Y', strtotime($client->data_nascimento)) }}</span></td>
                                        <td>{{ $client->cidade . '/' . $client->estado }}</td>
                                        <td class="text-end">
                                            <div class="drodown">
                                                <a data-bs-toggle="dropdown" href="#" class="btn p-1"
                                                    aria-expanded="false">
                                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" style>
                                                    <a href="#!" class="dropdown-item">Detalhes</a>
                                                    <a href="#!" class="dropdown-item">Editar</a>
                                                    <a href="#!" class="dropdown-item">Excluir</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
