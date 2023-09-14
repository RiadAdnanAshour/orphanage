<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>قائمة الأيتام</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>قائمة الأيتام</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> رجوع</a>
            </div><br>
            <div class="pull-right">
                @can('orphanage-create')
                <a class="btn btn-success" href="{{ route('orphan.create') }}">إضافة يتيم جديد</a>
                @endcan
            </div>
        </div>
    </div><br>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>الرقم</th>
            <th>الاسم الشخصي</th>
            <th>اسم الأب</th>
            <th>اسم الجد</th>
            <th>اسم العائلة</th>
            <th>اسم الأم</th>
            <th>المدينة</th>
            <th>المحافظة</th>
            <th>الحي</th>
            <th>تاريخ الميلاد</th>
            <th>رقم التلفون</th>
            <th>رقم الجوال</th>
            <th>الاجراءات</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orphans as $orphan)
            <tr>
                <td>{{ $orphan->id }}</td>
                <td>{{ $orphan->personanName }}</td>
                <td>{{ $orphan->dad }}</td>
                <td>{{ $orphan->grandfather }}</td>
                <td>{{ $orphan->family }}</td>
                <td>{{ $orphan->mother }}</td>
                <td>{{ $orphan->city->Namecity }}</td>
                <td>{{ $orphan->governorate->Namegovernorate }}</td>
                <td>{{ $orphan->district->Namedistrict }}</td>
                <td>{{ $orphan->birthdate }}</td>
                <td>{{ $orphan->telephone }}</td>
                <td>{{ $orphan->mobile }}</td>
                <td>
                    <form action="{{ route('orphan.destroy', $orphan->id) }}" method="POST">

                        <div>
                            @can('orphanage-edit')
                            <a class="btn btn-primary" href="{{ route('orphan.edit', $orphan->id) }}">تعديل</a>
                            @endcan
                        </div><br>

                        <div>

                            @csrf
                            @method('DELETE')
                            @can('orphanage-delete')
                            <button type="submit" class="btn btn-danger">حذف</button>
                            @endcan
                        </div><br>


                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
