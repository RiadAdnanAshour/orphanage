<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>تعديل مدينة</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>تعديل مدينة</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('city.index') }}">رجوع</a>
            </div>
        </div>
    </div>

    <form action="{{ route('city.update', $city->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- تحديد طريقة الإرسال للتعديل -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>:اسم المدينة</strong>
                    <input type="text" name="city" value="{{ $city->city }}" class="form-control" placeholder="اسم المدينة">
                </div>

                <div class="form-group">
                    <strong>:المحافظة</strong>
                    <select name="governorate_id" class="form-control">
                        @foreach ($governorates as $governorate)
                            <option value="{{ $governorate->id }}" @if($governorate->id === $city->governorate_id) selected @endif>{{ $governorate->Namegovernorate }}</option>
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
