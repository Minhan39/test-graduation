@props(['id'])

<form action="{{route('student.destroy', $id)}}" method="POST" id="deleteForm{{$id}}">
  @csrf
  @method('DELETE')

  <button type="button" onclick="confirmDelete({{$id}})" {{$attributes->merge(['class' => 'hover:text-gray-700'])}}><i class="bi bi-trash-fill"></i></button>
</form>