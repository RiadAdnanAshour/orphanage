<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>قائمة الأدوار</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>قائمة الأدوار</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> رجوع</a>
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('role.create') }}">إضافة دور جديد</a>
            </div>
        </div>
    </div><br>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>الرقم</th>
            <th>اسم الدور</th>
            <th>الوصف</th>
            <th>الصلاحيات</th>
            <th>الاجراءات</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->Description }}</td>
                <td>{{ $role->Permissions }}</td>
                <td>
                    <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('role.edit', $role->id) }}">تعديل</a>
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
