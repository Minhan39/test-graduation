<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Sửa thông tin sinh viên/học viên') }}
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <form action="{{route('student.update', $student->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="student_id" class="form-label">Mã số sinh viên/học viên</label>
              <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Nhập MSSV/MSHV" value="{{$student->student_id}}">
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Họ tên sinh viên/học viên</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên đầy đủ của sinh viên/học viên" value="{{$student->name}}">
            </div>
            <div class="mb-3">
              <label for="degree" class="form-label">Loại bằng</label>
              <input type="text" class="form-control" id="degree" name="degree" placeholder="Nhập loại bằng được nhận" value="{{$student->degree}}">
            </div>
            <div class="mb-3">
              <label for="majour" class="form-label">Chuyên ngành</label>
              <input type="text" class="form-control" id="majour" name="majour" placeholder="Nhập chuyên ngành tốt nghiệp" value="{{$student->majour}}">
            </div>
            <div class="mb-3">
              <label for="participation_time" class="form-label">Thời gian nhận bằng</label>
              <input type="text" class="form-control" id="participation_time" name="participation_time" placeholder="Nhập thời gian tham gia nhận bằng" value="{{$student->participation_time}}">
            </div>
            <div class="mb-3">
              <label for="location" class="form-label">Địa điểm nhận bằng</label>
              <input type="text" class="form-control" id="location" name="location" placeholder="Nhập địa điểm tham gia nhận bằng" value="{{$student->location}}">
            </div>
            <div class="mb-3">
              <label for="seat" class="form-label">Vị trí ngồi</label>
              <input type="text" class="form-control" id="seat" name="seat" placeholder="Nhập vị trí ngồi" value="{{$student->seat}}">
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Hình ảnh</label>
              <input type="file" class="form-control" id="image" name="image">
            </div>
            <x-primary-button>
              {{__('Sửa')}}
            </x-primary-button>
            |
            <x-link route="student.index" text="Trở lại" color="red"/>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>