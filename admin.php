<?php include 'flowers.php'; ?>
<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Tên hoa</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>CRUD</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($flowers as $index => $f): ?>
        <tr>
            <td><?= $f['name'] ?></td>
            <td><?= $f['desc'] ?></td>
            <td><img src="<?= $f['image'] ?>" width="80"></td>
            <td>
                <button>Sửa</button>
                <button>Xóa</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
