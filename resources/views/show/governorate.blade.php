<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>قائمة المحافظات</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>قائمة المحافظات</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> رجوع</a>
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('governorate.create') }}">إضافة محافظة جديد</a>
            </div>
        </div>
    </div><br>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>الرقم</th>
            <th>اسم المحافظة</th>
            <th>الاجراءات</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($governorates as $governorate)
            <tr>
                <td>{{ $governorate->id }}</td>
                <td>{{ $governorate->Namegovernorate }}</td>

                <td>
                    <form action="{{ route('governorate.destroy', $governorate->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('governorate.edit', $governorate->id) }}">تعديل</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
