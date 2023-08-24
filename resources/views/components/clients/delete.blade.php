    <form action="{{ route('clients.destroy', $client->id) }}" method="post">
        <div class="modal-body">
            @csrf
            @method('DELETE')
            <h5 class="text-center">Você tem certeza que seja excluir o cliente: {{ $client->name }} ?</h5>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Sim, Excluir Cliente</button>
        </div>
    </form>
