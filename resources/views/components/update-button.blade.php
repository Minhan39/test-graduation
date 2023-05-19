@props(['id'])

<a href="{{route('student.edit', $id)}}" {{$attributes->merge(['class' => 'hover:text-gray-700'])}}>
  <i class="bi bi-pencil-fill"></i>
</a>