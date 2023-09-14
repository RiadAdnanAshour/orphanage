<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>إضافة مدينة</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>إضافة مدينة</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('city.index') }}"> رجوع</a>
            </div>
        </div>
    </div>

    <form action="{{ route('city.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">



                <div class="form-group">
                    <strong>:اسم المدينة</strong>
                    <input type="text" name="city" class="form-control" placeholder="اسم المدينة">
                </div>

                <div class="form-group">
                    <strong>:المحافظة</strong>
                    <select name="governorate_id" class="form-control">
                        @foreach ($governorates as $governorate)
                            <option value="{{ $governorate->id }}">{{ $governorate->Namegovernorate }}</option>
                        @endforeach
                    </select>
                </div><br><br>




            </div>




            <button type="submit" class="btn btn-primary ml-3">إرسال</button><br><br>
        </div>
    </form>
</div>
</body>

</html>
