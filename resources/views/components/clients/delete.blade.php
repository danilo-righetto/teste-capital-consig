<div class="modal fade" id="exampleModal{{ $client->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="{{ route('clients.destroy', $client->id) }}" method="post">
        @csrf
        @method('DELETE')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar cliente - {{ $client->nome }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja excluir o cliente {{ $client->nome }} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fehcar</button>
                    <button type="submit" class="btn btn btn-danger">Sim, Excluir</button>
                </div>
            </div>
        </div>
    </form>
</div>
