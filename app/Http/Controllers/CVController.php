<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;

class CVController extends Controller
{
    /**
     * Hiển thị danh sách CV.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cvs = CV::all();
        return view('cv.index', compact('cvs'));
    }

    /**
     * Hiển thị form tạo CV mới.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.create');
    }

    /**
     * Lưu CV mới vào cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
            'job_title' => 'required',
            'summary' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'skills' => 'required',
        ]);

        CV::create($validatedData);

        return redirect()->route('cv.index')->with('success', 'CV created successfully.');
    }

    /**
     * Hiển thị thông tin chi tiết của CV.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cv = CV::findOrFail($id);
        return view('cv.show', compact('cv'));
    }

    /**
     * Hiển thị form chỉnh sửa thông tin CV.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cv = CV::findOrFail($id);
        return view('cv.edit', compact('cv'));
    }

    /**
     * Cập nhật thông tin CV trong cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
            'job_title' => 'required',
            'summary' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'skills' => 'required',
        ]);

        $cv = CV::findOrFail($id);
        $cv->update($validatedData);

        return redirect()->route('cv.index')->with('success', 'CV updated successfully.');
    }

    /**
     * Xóa CV khỏi cơ sở dữ liệu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cv = CV::findOrFail($id);
        $cv->delete();

        return redirect()->route('cv.index')->with('success', 'CV deleted successfully.');
    }
}
