<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Sửa nội dung</title>
</head>

<body>
    <nav class="navbar bg-dark p-4 mb-3">
        <h3 class="text-light">Sửa nội dung </h3>
        <a href="{{route('posts.index')}}" class="btn btn-danger">Quay lại</a>
    </nav>
    <div class="container">
        <form action="{{route('posts.update',['post'=>$post])}}">
            <div class="form-group" method="post">
                <label for="" class="form-label">Title</label>
                <input name="title" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Content</label>
                <input name="content" type="text" class="form-control">
            </div>
            <input name="submit" class="btn btn-success float-end mt-3" type="submit" value="Sửa">
        </form>
    </div>
</body>

</html>