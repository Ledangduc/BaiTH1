<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tài khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Danh sách tài khoản</h1>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Họ</th>
                <th>Tên</th>
                <th>Thành phố</th>
                <th>Email</th>
                <th>Khóa học</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Đường dẫn tới tệp CSV
            $file = 'accounts.csv';

            // Kiểm tra nếu tệp tồn tại
            if (file_exists($file)) {
                // Mở tệp ở chế độ đọc
                $handle = fopen($file, 'r');

                // Đọc dòng đầu tiên (header)
                $header = fgetcsv($handle);

                // Đọc từng dòng và hiển thị
                while (($row = fgetcsv($handle)) !== false) {
                    echo '<tr>';
                    foreach ($row as $cell) {
                        echo '<td>' . htmlspecialchars($cell) . '</td>';
                    }
                    echo '</tr>';
                }

                // Đóng tệp
                fclose($handle);
            } else {
                echo '<tr><td colspan="7">Tệp CSV không tồn tại.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
