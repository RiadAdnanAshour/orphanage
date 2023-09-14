<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>إضافة يتيم</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>إضافة يتيم</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('orphan.index') }}"> رجوع</a>
            </div>
        </div>
    </div>

    <form action="{{ route('orphan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <strong>:الهوية</strong>
                    <input type="number" name="id" class="form-control" required placeholder="الهوية">
                </div>

                <div class="form-group">
                    <strong>:الاسم الشخصي</strong>
                    <input type="text" name="personanName" class="form-control" required placeholder="الاسم الشخصي">
                </div>

                <div class="form-group">
                    <strong>:اسم الأب</strong>
                    <input type="text" name="dad" class="form-control" required placeholder="اسم الأب">
                </div>

                <div class="form-group">
                    <strong>:اسم الجد</strong>
                    <input type="text" name="grandfather" required class="form-control" placeholder="اسم الجد">
                </div>

                <div class="form-group">
                    <strong>:اسم العائلة</strong>
                    <input type="text" name="family" required class="form-control" placeholder="اسم العائلة">
                </div>

                <div class="form-group">
                    <strong>:اسم الأم</strong>
                    <input type="text" name="mother" required class="form-control" placeholder="اسم الأم">
                </div>

            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <strong>:المحافظة</strong>
                    <select name="governorate_id" class="form-control" id="governorate">
                        @foreach ($governorates as $governorate)
                            <option value="{{ $governorate->id }}">{{ $governorate->Namegovernorate }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <strong>:المدينة</strong>
                    <select name="city_id" class="form-control" id="city">
                        @foreach ($cities as $city)
                            @if ($city->governorate_id)
                                <option value="{{ $city->id }}">{{ $city->Namecity }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <strong>:الحي</strong>
                    <select name="district_id" class="form-control" id="district">
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->Namedistrict }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <strong>:تاريخ الميلاد</strong>
                    <input type="date" name="birthdate" class="form-control" required placeholder="تاريخ الميلاد">
                </div>

                <div class="form-group">
                    <strong>:رقم التلفون</strong>
                    <input type="number" name="telephone" class="form-control" required placeholder="رقم التلفون">
                </div>

                <div class="form-group">
                    <strong>:رقم الجوال</strong>
                    <input type="number" name="mobile" class="form-control" required placeholder="رقم الجوال">
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">إرسال</button>
            </div>
        </div>

    </form>
</div>
</body>

</html>
