<!DOCTYPE html>
<html>
<head>
    <title>Tạo người dùng mới</title>
    <style>
        /* CSS styles for the form */
    </style>
</head>
<body>
    <h1>Tạo người dùng mới</h1>
    <form method="POST" action="/users">
    @csrf
    <!-- Các trường và nút submit khác -->
</form>
            <label for="name">Tên:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="age">Tuổi:</label>
            <input type="number" id="age" name="age" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <button type="submit">Tạo</button>
        </div>
    </form>
</body>
</html>