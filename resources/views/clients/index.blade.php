<x-layout title="Clients">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3 mb-lg-5">
                <div class="overflow-hidden card table-nowrap table-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Clientes</h5>
                        <a href="{{ route('clients.destroyAll') }}" class="btn btn-light btn-sm">Deletar todos</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Idade</th>
                                    <th>Data Nasc.</th>
                                    <th class="text-end">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr class="align-middle">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="h6 mb-0 lh-1">{{ $client->nome }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td> <span
                                                class="d-inline-block align-middle">{{ Str::limit($client->cpf, 7) }}</span>
                                        </td>
                                        <td>{{ $diff = Carbon\Carbon::parse($client->data_nascimento)->diff(Carbon\Carbon::now())->format('%Y') }}
                                            anos
                                        </td>
                                        <td><span>{{ date('d-m-Y', strtotime($client->data_nascimento)) }}</span></td>
                                        <td class="text-end">
                                            <div class="drodown">
                                                <a data-bs-toggle="dropdown" href="#" class="btn p-1"
                                                    aria-expanded="false">
                                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" style>
                                                    <a href="{{ route('clients.show', $client) }}"
                                                        class="dropdown-item">Detalhes</a>
                                                    <a href="{{ route('clients.edit', $client->id) }}"
                                                        class="dropdown-item">Editar</a>
                                                    <a href="{{ route('clients.destroy', $client->id) }}"
                                                        class="dropdown-item">Excluir</a>
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
