<<<<<<< HEAD
<?php

$filename = "cauhoi.txt";
$questions = [];
$current = [];


    $lines = file($filename, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        if (trim($line) === "") continue;
        if (str_starts_with($line, "ANSWER:")) {
            $current['answer'] = trim(str_replace('ANSWER:', '', $line));
            $questions[] = $current;
            $current = [];
        } elseif (!isset($current['question'])) {
            $current['question'] = $line;
        } else {
            $current['options'][] = $line;
        }
    }

$score = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    foreach ($questions as $i => $q) {
        $user = $_POST['q'.($i+1)] ?? "";
        if ($user === $q['answer']) $score++;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>localhost</title>
</head>
<body>
    <h2>Bài trắc nghiệm</h2>

    <form method="post">
        <?php foreach ($questions as $i => $q): ?>
            <p><?= $q['question'] ?></p>
            <?php foreach ($q['options'] as $opt): 
                $optLabel = substr($opt, 0, 1);
      ?>
                <label>
                    <input type="radio" name="q<?= $i+1 ?>" value="<?= $optLabel ?>"> <?= $opt ?>
                </label><br>
            <?php endforeach; ?>
            <br>
        <?php endforeach; ?>
        <button type="submit">Nộp bài</button>
    </form>
    <?php if ($score !== null): ?>
        <h3>Kết quả: <?= $score ?>/<?= count($questions) ?></h3>
    <?php endif; ?>
=======
<?php include "flowers.php"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Các Loại Hoa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
<h1>Các Loại Hoa</h1>
<table>
    <thead>
        <tr>
            <th>Tên hoa</th>
            <th>Ảnh</th>
            <th>Mô tả</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($flowers as $f): ?>
            <tr>
                <td><?= $f['name'] ?></td>
                <td><img src="<?= $f['image'] ?>" alt="<?= $f['name'] ?>"></td>
                <td><?= $f['desc'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
>>>>>>> bd5f4af (Thêm code mới từ Thuchanhweb1)
</body>
</html>
