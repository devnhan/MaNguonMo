<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Job</title>
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
        input[type="number"],
        textarea,
        input[type="datetime-local"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
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
        <h1>Create Job</h1>

        <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" required>
            </div>

            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" required></textarea>
            </div>

            <div>
                <label for="location">Location</label>
                <input type="text" name="location" id="location" required>
            </div>

            <div>
                <label for="deadline">Deadline</label>
                <input type="datetime-local" name="deadline" id="deadline" required>
            </div>

            <div>
                <label for="type">Type</label>
                <input type="text" name="type" id="type" required>
            </div>

            <div>
                <label for="salary">Salary</label>
                <input type="number" name="salary" id="salary" required>
            </div>

            <div>
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
            </div>

            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
