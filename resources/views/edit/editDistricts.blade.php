<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>تعديل حي</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>تعديل حي</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('district.index') }}">رجوع</a>
            </div>
        </div>
    </div>

    <form action="{{ route('district.update', $district->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- تحديد طريقة الإرسال للتعديل -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>:اسم الحي</strong>
                    <input type="text" name="district" value="{{ $district->district }}" class="form-control" placeholder="اسم الحي">
                </div>

                <div class="form-group">
                    <strong>:المدينة</strong>
                    <select name="city_id" class="form-control">
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" @if($city->id === $district->city_id) selected @endif>{{ $city->Namecity }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary ml-3">حفظ التعديلات</button><br><br>
        </div>
    </form>
</div>
</body>

</html>
