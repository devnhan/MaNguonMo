<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo CV mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tạo CV mới</h1>

        <form action="{{ route('cvs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="full-name">Họ và tên:</label>
            <input type="text" id="full-name" name="full_name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone_number" required>

            <label for="address">Địa chỉ:</label>
            <input type="text" id="address" name="address" required>

            <label for="job-title">Chức danh công việc:</label>
            <input type="text" id="job-title" name="job_title" required>

            <label for="summary">Mô tả ngắn gọn:</label>
            <textarea id="summary" name="summary" required></textarea>

            <label for="education">Học vấn:</label>
            <textarea id="education" name="education" required></textarea>

            <label for="experience">Kinh nghiệm:</label>
            <textarea id="experience" name="experience" required></textarea>

            <label for="skills">Kỹ năng:</label>
            <input type="text" id="skills" name="skills" required>

            <button type="submit">Tạo</button>
        </form>
    </div>
</body>
</html>
