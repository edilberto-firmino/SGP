<h2 class="mb-4">Adicionar Gasto</h2>
<form method="post" action="{{ route('gastos.store') }}">
    @csrf

    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input type="text" class="form-control" name="descricao" required>
    </div>

    <div class="form-group">
        <label for="data">Data:</label>
        <input type="date" class="form-control" name="data" required>
    </div>

    <div class="form-group">
        <label for="valor">Valor:</label>
        <input type="text" class="form-control" name="valor" required>
    </div>

    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
