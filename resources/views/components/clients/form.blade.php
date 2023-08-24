<div class="container">
    <div class="overflow-hidden card table-nowrap table-card mb-10">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Cliente</h4>
        </div>
    </div>
    <br>
    <div class="row">
        <form action="{{ $action }}" method="post">
            @csrf

            @if ($update)
                @mehod('PUT')
            @endif
            <div class="form-group mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control"
                    @isset($client->nome)value="{{ $client->nome }}" @endisset readonly disabled>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="nome@exemplo.com"
                    @isset($client->email)value="{{ $client->email }}" @endisset readonly disabled>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF"
                        @isset($client->cpf)value="{{ $client->cpf }}" @endisset readonly disabled>
                </div>
                <div class="col">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="text" id="data_nascimento" name="data_nascimento" class="form-control"
                        placeholder="Data de Nascimento"
                        @isset($client->data_nascimento)value="{{ $client->data_nascimento }}" @endisset readonly
                        disabled>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="rua">Rua:</label>
                    <input type="text" id="rua" name="rua" class="form-control" placeholder="Rua"
                        @isset($client->rua)value="{{ $client->rua }}" @endisset readonly disabled>
                </div>
                <div class="col">
                    <label for="numero_rua">Número da Rua:</label>
                    <input type="text" id="numero_rua" name="numero_rua" class="form-control"
                        placeholder="Número da Rua"
                        @isset($client->numero_rua)value="{{ $client->numero_rua }}" @endisset readonly
                        disabled>
                </div>
                <div class="col">
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" class="form-control" placeholder="CEP"
                        @isset($client->cep)value="{{ $client->cep }}" @endisset readonly disabled>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade"
                        @isset($client->cidade)value="{{ $client->cidade }}" @endisset readonly disabled>
                </div>
                <div class="col">
                    <label for="estado">Estado:</label>
                    <input type="text" id="estado" name="estado" class="form-control" placeholder="Estado"
                        @isset($client->estado)value="{{ $client->estado }}" @endisset readonly disabled>
                </div>
                <div class="col">
                    <label for="ativo">Ativo:</label>
                    <input type="text" id="ativo" name="ativo" class="form-control" placeholder="Ativo"
                        @isset($client->ativo)value="{{ $client->ativo }}" @endisset readonly disabled>
                </div>
            </div>

            @if ($button)
                <button type="submit" class="btn btn-primary">Editar</button>
            @endif
        </form>
    </div>
</div>
