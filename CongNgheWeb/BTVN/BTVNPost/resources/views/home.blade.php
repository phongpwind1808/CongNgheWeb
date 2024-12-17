<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Quản lý nội dung</title>
</head>

<body>
    <nav class="navbar bg-dark p-4">
        <h3 class="text-light ">Quản lý nội dung</h3>
        <a href="{{route('posts.create')}}" class="btn btn-success">Thêm mới</a>
    </nav>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $index => $post)
                <tr>
                    <td class="col-1">{{$index+1}}</td>
                    <td class="col-1">{{$post->title}}</td>
                    <td class="col-5">{{$post->content}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td>
                        <a href="{{ route('posts.show', ['post' => $post]) }}" class="btn btn-success">Xem chi tiết</a>
                        <div class="btns">
                            <a href="{{route('posts.edit',['post' => $post])}}" class="btn btn-primary">Sửa</a>
                            <a href="{{route('posts.delete',['post' => $post])}}" class="btn btn-danger">Xóa</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>