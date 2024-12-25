<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
            padding: 30px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            color: #212529;
        }

        .form-group label {
            font-weight: bold;
            color: #495057;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="form-title">EDIT</h2>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Chỉnh sửa thông tin bán hàng</title>
        </head>

        <body>
            <form action="{{ route('product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method ('PUT')
                <div class="mb-3 form-group">
                    <label for="product_name" class="form-label">Product name</label>
                    <input class="form-control @error('product_name') is-invalid @enderror" type="text" name="product_name" id="product_name" value="{{ old('product_name', $item->product_name) }}">
                    @error('product_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label for="description" class="form-label">Description</label>
                    <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description' , $item->description) }}">
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label for="price" class="form-label">Price</label>
                    <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price',$item->price) }}">
                    @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Hiển thị ảnh cũ (nếu có) -->
                <div class="mb-3">
                    <label>Ảnh hiện tại:</label><br>
                    <img src="{{ asset('storage/' . $item->image) }}" alt="" width="100">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Chọn ảnh:</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/* " value="{{old('image', $item->image)}}">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="category_name" class="form-label">Category</label>
                    @php
                    $category_name = ['comedy', 'detective', 'romantic'];
                    @endphp
                    <select class="form-control" name="category_name" id="category_name">
                        @foreach($category_name as $value)
                        <option value="{{$value}}" {{$item->category_name==$value?'selected':''}}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </body>

        </html>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>