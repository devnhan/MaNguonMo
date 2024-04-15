<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Hiển thị danh sách đơn xin việc.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::all();
        return view('applications.index', compact('applications'));
    }

    /**
     * Hiển thị form tạo đơn xin việc mới.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applications.create');
    }

    /**
     * Lưu đơn xin việc mới vào cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'cover_letter' => 'required',
        ]);

        $application = new Application();
        $application->name = $request->input('name');
        $application->email = $request->input('email');
        $application->cover_letter = $request->input('cover_letter');
        $application->save();

        return redirect()->route('applications.index')->with('success', 'Application created successfully');
    }

    /**
     * Hiển thị thông tin chi tiết của đơn xin việc.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::find($id);
        return view('applications.show', compact('application'));
    }

    /**
     * Hiển thị form chỉnh sửa thông tin đơn xin việc.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::find($id);
        return view('applications.edit', compact('application'));
    }

    /**
     * Cập nhật thông tin đơn xin việc trong cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'cover_letter' => 'required',
        ]);

        $application = Application::find($id);
        $application->name = $request->input('name');
        $application->email = $request->input('email');
        $application->cover_letter = $request->input('cover_letter');
        $application->save();

        return redirect()->route('applications.index')->with('success', 'Application updated successfully');
    }

    /**
     * Xóa đơn xin việc khỏi cơ sở dữ liệu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = Application::find($id);
        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Application deleted successfully');
    }
}