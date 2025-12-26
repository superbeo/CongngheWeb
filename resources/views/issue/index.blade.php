<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống Quản lý Phòng máy</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <style>
        /* CSS bổ trợ để bảng trông chuyên nghiệp khi không có Bootstrap */
        body { font-family: Arial, sans-serif; line-height: 1.6; background-color: #f4f4f4; padding: 20px; }
        .container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        .btn { padding: 8px 15px; text-decoration: none; border-radius: 4px; display: inline-block; border: none; cursor: pointer; }
        .btn-primary { background: #007bff; color: #fff; margin-bottom: 15px; }
        .btn-warning { background: #ffc107; color: #000; font-size: 0.8em; }
        .btn-danger { background: #dc3545; color: #fff; font-size: 0.8em; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f8f9fa; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .alert { padding: 10px; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 15px; }
        .pagination { margin-top: 20px; text-align: center; }
    </style>
</head>
<body>

<div class="container">
    <h1>Danh sách vấn đề sự cố</h1>

    <a href="{{ route('issue.create') }}" class="btn btn-primary">Thêm vấn đề mới</a>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Mã vấn đề</th>
                <th>Tên máy tính</th>
                <th>Tên phiên bản</th>
                <th>Người báo cáo</th>
                <th>Thời gian báo cáo</th>
                <th>Mức độ</th>
                <th>Trạng thái hiện tại</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($issues as $issue)
            <tr>
                <td>{{ $issue->id }}</td>
                <td><strong>{{ $issue->computer->computer_name ?? 'N/A' }}</strong></td>
                <td>{{ $issue->computer->model ?? 'N/A' }}</td>
                <td>{{ $issue->reported_by }}</td>
                <td>{{ \Carbon\Carbon::parse($issue->reported_date)->format('d/m/Y H:i') }}</td>
                <td>{{ $issue->urgency }}</td>
                <td>{{ $issue->status }}</td>
                <td>
                    <a href="{{ route('issue.edit', $issue->id) }}" class="btn btn-warning">Sửa</a>

                    <form action="{{ route('issue.destroy', $issue->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa vấn đề này?')">
                            Xóa
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align:center;">Không có dữ liệu nào được tìm thấy.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $issues->links() }}
    </div>
</div>

</body>
</html>