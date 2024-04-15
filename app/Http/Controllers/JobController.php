<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Hiển thị danh sách công việc.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::all();
        return view('job.index', compact('jobs'));
    }

    /**
     * Hiển thị form tạo công việc mới.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job.create');
    }

    /**
     * Lưu công việc được tạo mới vào cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'deadline' => 'required',
            'type' => 'required',
            'salary' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Thêm trường image vào validate
        ]);

        

        $job = new Job();
        $job->title = $validatedData['title'];
        $job->description = $validatedData['description'];
        $job->location = $validatedData['location'];
        $job->deadline = $validatedData['deadline'];
        $job->type = $validatedData['type'];
        $job->salary = $validatedData['salary'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $job->image = 'images/' . $imageName;
        }
        $job->user_id = session('user_id'); // Lấy ID người dùng từ session

        $job->save();

        return redirect()->route('job.index', $job->id);
    }
    
    /**
     * Cập nhật thông tin công việc trong cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'deadline' => 'required',
            'type' => 'required',
            'salary' => 'required',
        ]);

        $job = Job::find($id);
        $job->title = $validatedData['title'];
        $job->description = $validatedData['description'];
        $job->location = $validatedData['location'];
        $job->deadline = $validatedData['deadline'];
        $job->type = $validatedData['type'];
        $job->salary = $validatedData['salary'];
        $job->user_id = session('user_id'); // Lấy ID người dùng từ session

        $job->save();

        return redirect()->route('job.index', $job->id);
    }
}