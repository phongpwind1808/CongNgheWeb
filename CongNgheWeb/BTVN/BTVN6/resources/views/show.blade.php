<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Nội dung chi tiết</title>
</head>

<body>
    <nav class="navbar bg-dark p-4">
        <h3 class="text-light ">Nội dung chi tiết</h3>
        <a href="{{route('posts.index')}}" class="btn btn-success">Quay lại</a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>{{$post->title}}</h3>
                <p>{{$post->content}}</p>
                <p>Ngày tạo: {{$post->created_at}}</p>
                <p>Ngày cập nhật: {{$post->updated_at}}</p>
            </div>
        </div>
</body>

</html>