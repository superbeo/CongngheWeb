<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Computer;
class IssueController extends Controller
{
    // Hiển thị danh sách vấn đề (10 bản ghi / trang)
    public function index()
    {
        $issues = Issue::with('computer')->paginate(10);
        return view('issue.index', compact('issues'));
    }

       // 2. Form thêm mới
    public function create() {
	        $computers = Computer::all(); // Lấy danh sách máy tính để chọn trong dropdown
        return view('issue.create', compact('computers'));
	    }
	// lưu 
	    public function store(Request $request) {
	        $request->validate([
	            'computer_id' => 'required',
            'reported_by' => 'required|max:50',
            'reported_date' => 'required',
            'urgency' => 'required',
            'status' => 'required',
	        ]);
	        Issue::create($request->all());
	        return redirect()->route('issue.index')->with('success', 'Vấn đề đã được thêm mới!');
	    }
        //sửa
        public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issue.edit', compact('issue', 'computers'));
    }
//úpate
    public function update(Request $request, $id)
    {
        $issue = Issue::findOrFail($id);
        $issue->update($request->all());
        return redirect()->route('issue.index')->with('success', 'Cập nhật thành công!');
    }
//xoá
    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();
        return redirect()->route('issue.index')->with('success', 'Đã xóa vấn đề thành công!');
    }
}