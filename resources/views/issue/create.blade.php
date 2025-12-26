<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm vấn đề sự cố</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 6px;
        }
        h1 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        .btn {
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-primary {
            background: #007bff;
            color: #fff;
        }
        .btn-secondary {
            background: #6c757d;
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 4px;
        }
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Thêm vấn đề sự cố mới</h1>

    {{-- FORM GỬI DỮ LIỆU --}}
    <form action="{{ route('issue.store') }}" method="POST">
        @csrf

        <label>Máy tính</label>
        <select name="computer_id" required>
            <option value="">-- Chọn máy --</option>
            @foreach($computers as $computer)
                <option value="{{ $computer->id }}">
                    {{ $computer->computer_name }} ({{ $computer->model }})
                </option>
            @endforeach
        </select>

        <label>Người báo cáo</label>
        <input type="text" name="reported_by" placeholder="Nhập tên người báo cáo" required>

        <label>Thời gian báo cáo</label>
        <input type="datetime-local" name="reported_date" required>

        <label>Mức độ</label>
        <select name="urgency">
            <option value="Low">Thấp</option>
            <option value="Medium">Trung bình</option>
            <option value="High">Cao</option>
        </select>

        <label>Trạng thái</label>
        <select name="status">
            <option value="Open">Mở</option>
            <option value="In Progress">Đang xử lý</option>
            <option value="Resolved">Đã giải quyết</option>
        </select>

        <div class="actions">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('issue.index') }}" class="btn-secondary">Quay lại</a>
        </div>
    </form>
</div>

</body>
</html>

