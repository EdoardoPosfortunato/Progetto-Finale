<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $id }}">
  Elimina
</button>

<!-- Modal -->
<div class="modal fade" id="modal-{{ $id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h1 class="modal-title fs-5" id="modalLabel-{{ $id }}">{{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
      </div>
      <div class="modal-body">
        {!! $message !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        <form action="{{ $route }}" method="POST">
          @csrf
          @method('DELETE')
          <input type="submit" class="btn btn-outline-danger" value="Elimina">
        </form>
      </div>
    </div>
  </div>
</div>

