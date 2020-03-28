<!DOCTYPE html>
<html lang='en'>
<head>
    <title>My Image App</title>
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="max-w-lg mx-auto py-8">
    <form action="/image" method="POST" class="flex align-items-center justify-content-between border border-gray-300 p-4 rounded" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="image"/>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload File</button>
    </form>
    <form action="/image/download/1" method="POST" class="flex align-items-center justify-content-between border border-gray-300 p-4 rounded" enctype="multipart/form-data">
        @csrf
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Download File</button>
    </form>
</div>
</body>
</html>
