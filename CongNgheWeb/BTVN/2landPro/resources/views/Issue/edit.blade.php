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
            <form action="{{ route('Issue.update', $Issue->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method ('PUT')
                <div class="mb-3 form-group">
                    <label for="name" class="form-label">Name</label>
                    <select class="form-control @error('name') is-invalid @enderror" name="computer_id" id="id">
                        <option value="">Computer Name</option>
                        @foreach ($Computer as $item)
                        <option value="{{ $item->id }}" {{ $Issue->Computer->computer_name == $item->computer_name ? 'selected' : '' }}>
                            {{ $item->computer_name }}
                        </option>
                        @endforeach
                    </select>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label for="reporter_by" class="form-label">Reporter_by</label>
                    <input class="form-control @error('reporter_by') is-invalid @enderror" type="text" name="reporter_by" id="reporter_by" value="{{ old('reporter_by' , $Issue->reporter_by) }}">
                    @error('reporter_by')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label for="reporter_date" class="form-label">Reporter_date</label>
                    <input class="form-control @error('reporter_date') is-invalid @enderror" type="datetime-local" name="reporter_date" id="reporter_date" value="{{ old('reporter_date',$Issue->reporter_date) }}">
                    @error('reporter_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label for="description" class="form-label">description</label>
                    <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description', $Issue->description) }}">
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="urgency" class="form-label">Urgency</label>
                    @php
                    $urgency = ['Low', 'Medium', 'High'];
                    @endphp
                    <select class="form-control" name="urgency" id="urgency">
                        @foreach($urgency as $value)
                        <option value="{{$value}}" {{$Issue->urgency==$value?'selected':''}}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="status" class="form-label">Status</label>
                    @php
                    $status = ['Open', 'In Process', 'Resolved'];
                    @endphp
                    <select class="form-control" name="status" id="status">
                        @foreach($status as $value)
                        <option value="{{$value}}" {{$Issue->status==$value?'selected':''}}>{{$value}}</option>
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