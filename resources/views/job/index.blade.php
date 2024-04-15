<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Job Listing</h1>

        @if (auth()->check() && auth()->user()->hasRole('admin'))
            <a href="{{ route('job.create') }}" class="btn btn-primary">Create</a>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Deadline</th>
                    <th>Type</th>
                    <th>Salary</th>
                    <th>Image</th>
                    <!-- Other columns -->
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->description }}</td>
                        <td>{{ $job->location }}</td>
                        <td>{{ $job->deadline }}</td>
                        <td>{{ $job->type }}</td>
                        <td>{{ $job->salary }}</td>
                        <td><img src="{{ $job->image }}" alt="Job Image"></td>
                        <!-- Other columns -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
