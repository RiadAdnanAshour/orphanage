<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>تعديل دور</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>تعديل دور</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('role.index') }}">رجوع</a>
            </div>
        </div>
    </div>

    <form action="{{ route('role.update', $role->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- تحديد طريقة الإرسال للتعديل -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>اسم الدور:</strong>
                    <input type="text" name="name" value="{{ $role->name }}" class="form-control" placeholder="اسم الدور">
                </div>

                <div class="form-group">
                    <strong>الوصف:</strong>
                    <textarea class="form-control" style="height:150px" name="Description" placeholder="الوصف">{{ $role->description }}</textarea>
                </div>

                <div class="form-group">
                    <strong>الصلاحيات:</strong>
                    <input type="text" name="Permissions" value="{{ $role->permissions }}" class="form-control" placeholder="الصلاحيات">
                </div>
            </div>

            <button type="submit" class="btn btn-primary ml-3">حفظ التعديلات</button><br><br>
        </div>
    </form>
</div>
</body>

</html>
