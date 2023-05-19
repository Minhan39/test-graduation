<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\StudentImport;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(10);
        return view('student.index', compact('students'))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Student::create($request->all());
        return redirect()->route('student.index')->with('message', 'Thêm thông tin thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);

        if(!$student){
            return redirect()->route('student.index');
        }

        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);

        if(!$student){
            return redirect()->route('student.index')->with('error', 'Thông tin không tồn tại.');
        }

        $student->student_id = $request->input('student_id');
        $student->name = $request->input('name');
        $student->image = $request->input('image');
        $student->degree = $request->input('degree');
        $student->majour = $request->input('majour');
        $student->participation_time = $request->input('participation_time');
        $student->location = $request->input('location');
        $student->seat = $request->input('seat');

        $student->save();

        return redirect()->route('student.index')->with('message', 'Cập nhật thông tin thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        if(!$student){
            return redirect()->route('student.index');
        }

        $student->delete();

        return redirect()->route('student.index')->with('message', 'Xoá thông tin thành công.');
    }

    public function upload(Request $request)
    {
        $file = $request->file('excelFile');

        Excel::import(new StudentImport, $file);

        return redirect()->back()->with('message', 'Tệp đã được tải lên và dữ liệu đã được lưu vào cơ sở dữ liệu.');
    }
}
