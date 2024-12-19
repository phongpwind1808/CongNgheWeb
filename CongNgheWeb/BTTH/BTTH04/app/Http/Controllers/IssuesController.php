<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Issue;

class IssuesController extends Controller
{
    public function index()
    {
        // Sử dụng paginate với số lượng bản ghi mỗi trang, ví dụ 5
        $data = Issue::with('computer')->paginate(10);

        // Truyền dữ liệu sang view
        return view('Issue.index', compact('data'));
    }

    public function create()
    {
        $data = Computer::all();
        return view('Issue.create', compact('data'));
    }

    public function store(Request $request)
    {
        //dd($request);
        // Validate dữ liệu
        $validatedData = $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reporter_by' => 'required|string|max:255',
            'reporter_date' => 'required|date',
            'description' => 'required|string|max:500',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,Resolved,In Process',
        ], [
            'computer_id.required' => 'Vui lòng chọn tên máy tính.',
            'computer_id.exists' => 'Máy tính đã chọn không tồn tại.',
            'reporter_by.required' => 'Vui lòng nhập tên người báo cáo.',
            'reporter_by.string' => 'Tên người báo cáo phải là chuỗi.',
            'reporter_by.max' => 'Tên người báo cáo không được vượt quá 255 ký tự.',
            'reporter_date.required' => 'Vui lòng chọn ngày báo cáo.',
            'reporter_date.date' => 'Ngày báo cáo phải đúng định dạng ngày.',
            'description.required' => 'Vui lòng nhập mô tả sự cố.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'description.max' => 'Mô tả không được vượt quá 500 ký tự.',
            'urgency.required' => 'Vui lòng chọn mức độ khẩn cấp.',
            'urgency.in' => 'Mức độ khẩn cấp phải là Low,Medium,High.',
            'status.required' => 'Vui lòng nhập trạng thái.',
            'status.in' => 'Trạng thái phải là Open,Resolved,In Process.',
        ]);
        Issue::create([
            'computer_id' => $request->computer_id,
            'reporter_by' => $request->reporter_by,
            'reporter_date' => $request->reporter_date,
            'description' => $request->description,
            'urgency' => $request->urgency,
            'status' => $request->status,
        ]);
        return redirect()->route('Issue.index')->with('success', 'Thêm
bài viết thành công!')
        ;
    }

    public function edit($id)
    {
        $Issue = Issue::with('computer')->findOrFail($id);
        $Computer = Computer::all();
        return view('Issue.edit', compact('Issue', 'Computer'));
    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $validatedData = $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reporter_by' => 'required|string|max:255',
            'reporter_date' => 'required|date',
            'description' => 'required|string|max:500',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Process,Resolved',
        ], [
            'computer_id.required' => 'Vui lòng chọn tên máy tính.',
            'computer_id.exists' => 'Máy tính đã chọn không tồn tại.',
            'reporter_by.required' => 'Vui lòng nhập tên người báo cáo.',
            'reporter_by.string' => 'Tên người báo cáo phải là chuỗi.',
            'reporter_by.max' => 'Tên người báo cáo không được vượt quá 255 ký tự.',
            'reporter_date.required' => 'Vui lòng chọn ngày báo cáo.',
            'reporter_date.date' => 'Ngày báo cáo phải đúng định dạng ngày.',
            'description.required' => 'Vui lòng nhập mô tả sự cố.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'description.max' => 'Mô tả không được vượt quá 500 ký tự.',
            'urgency.required' => 'Vui lòng chọn mức độ khẩn cấp.',
            'urgency.in' => 'Mức độ khẩn cấp phải là low, medium hoặc high.',
            'status.required' => 'Vui lòng nhập trạng thái.',
           
        ]);
        $Issue = Issue::find($id);

        $Issue->update([
            'computer_id' => $request->computer_id,
            'reporter_by' => $request->reporter_by,
            'reporter_date' => $request->reporter_date,
            'description' => $request->description,
            'urgency' => $request->urgency,
            'status' => $request->status,
        ]);
        return redirect()->route('Issue.index')->with('success', 'Cập nhật thành công.');
    }

    public function destroy($id)
    {
        $Issue = Issue::find($id);
        $Issue->delete();
        return redirect()->route('Issue.index')->with('success', 'Sản phẩm đã được xóa.');
    }
}
