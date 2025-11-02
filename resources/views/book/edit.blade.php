<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Editar libros</h2>
      <form action="{{ route('book.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" hidden="id" name="id" value="{{ $book->id }}">
        <div>
            <label>Nombre del autor</label>
            <input type="text" name="name" required value="{{ $book->name }}">
        </div>
        <br>
        <div>
            <label>Titulo del autor</label> 
            <input type="text" name="title" required value="{{ $book->title }}">
        </div>
        <br>
        <div>
            <label>Cantidad de libros</label>
            <input type="number" name="count" min="0" required value="{{ $book->count }}">
        </div>
        <br>
        <div>
            <label>Genero del libro</label>
            <select name="gender" required>
                <option value="">Seleccionar</option>
                <option value="accion" {{ $book->gender == 'accion' ? 'selected' : '' }}>Accion</option>
                <option value="comedia" {{ $book->gender == 'comedia' ? 'selected' : '' }}>Comedia</option>
                <option value="ficcion" {{ $book->gender == 'ficcion' ? 'selected' : '' }}>Ficcion</option>
            </select>
        </div>
        <br>
        <div>
            <label>Fecha de vencimiento del libro</label>
            <input type="date" name="due_date" required value="{{ $book->due_date }}">
        </div>
        <div>
            <label>Archivo actual</label>
            @if ($book->file_path)
                <a href="{{ asset('storage/' . $book->file_path) }}" target="_blank">Ver archivo</a>
            @else
             <span>Sin archivo</span>    
            @endif
            <label>Subir un nuevo archivo(opcional):</label>
            <input type="file" name="file" accept=".pdf,.docx,.doc">
        </div>
        <br>
        <a href="{{ route('book.index') }}">Regresar</a>
        <button type="submit">Enviar</button>
        </form>
</body>
</html>