<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="overflow-hidden card table-nowrap table-card mb-10">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Cliente @isset($client->nome)
                    - {{ $client->nome }}
                @endisset
                @if ($update)
                    - Editar
                @elseif ($create)
                    - Cadastrar
                @else
                    - Visualizar
                @endif
            </h4>
        </div>
    </div>
    <br>
    <div class="row">
        <form action="{{ $action }}" method="post">
            @csrf

            @if ($update)
                @method('PUT')
            @endif
            <div class="form-group mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control"
                    @isset($client->nome)value="{{ $client->nome }}" @endisset
                    @if (!$update && !$create) readonly disabled @endif>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com"
                    @isset($client->email)value="{{ $client->email }}" @endisset
                    @if (!$update && !$create) readonly disabled @endif>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF"
                        @isset($client->cpf)value="{{ $client->cpf }}" @endisset
                        @if (!$update && !$create) readonly disabled @endif>
                </div>
                <div class="col">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="text" id="data_nascimento" name="data_nascimento" class="form-control datepicker"
                        data-format="dd/MM/yyyy" placeholder="Data de Nascimento"
                        @isset($client->data_nascimento)value="{{ $diff = Carbon\Carbon::parse($client->data_nascimento)->format('d-m-Y') }}" @endisset
                        @if (!$update && !$create) readonly disabled @endif>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                        </i>
                    </span>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="rua">Rua:</label>
                    <input type="text" id="rua" name="rua" class="form-control" placeholder="Rua"
                        @isset($client->rua)value="{{ $client->rua }}" @endisset
                        @if (!$update && !$create) readonly disabled @endif>
                </div>
                <div class="col">
                    <label for="numero_rua">Número da Rua:</label>
                    <input type="text" id="numero_rua" name="numero_rua" class="form-control"
                        placeholder="Número da Rua"
                        @isset($client->numero_rua)value="{{ $client->numero_rua }}" @endisset
                        @if (!$update && !$create) readonly disabled @endif>
                </div>
                <div class="col">
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" class="form-control" placeholder="CEP"
                        @isset($client->cep)value="{{ $client->cep }}" @endisset
                        @if (!$update && !$create) readonly disabled @endif>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade"
                        @isset($client->cidade)value="{{ $client->cidade }}" @endisset
                        @if (!$update && !$create) readonly disabled @endif>
                </div>
                <div class="col">
                    <label for="estado">Estado:</label>
                    <input type="text" id="estado" name="estado" class="form-control" placeholder="Estado"
                        @isset($client->estado)value="{{ $client->estado }}" @endisset
                        @if (!$update && !$create) readonly disabled @endif>
                </div>
                <div class="col">
                    <label for="ativo">Ativo:</label>
                    <select class="form-select" id="ativo" name="ativo" aria-label="Status"
                        @if (!$update && !$create) readonly disabled @endif>
                        @if (isset($client->ativo))
                            <option value="0" @if ($client->ativo === 0) selected @endif>Inativo</option>
                            <option value="1" @if ($client->ativo === 1) selected @endif>Ativo</option>
                        @else
                            <option value="0">Inativo</option>
                            <option value="1">Ativo</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{ route('clients.index') }}" class="btn btn-primary">Voltar</a>
                @if ($button)
                    <button type="submit" class="btn btn-primary">Salvar</button>
                @endif
            </div>
        </form>
    </div>
</div>
