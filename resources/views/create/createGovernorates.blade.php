<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>إضافة محافظة</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>إضافة محافظة</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('governorate.index') }}"> رجوع</a>
            </div>
        </div>
    </div>

    <form action="{{ route('governorate.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">



                <div class="form-group">
                    <strong>:اسم المحافظة</strong>
                    <input type="text" name="Namegovernorate" class="form-control" placeholder="اسم المحافظة">
                </div>


            </div>




            <button type="submit" class="btn btn-primary ml-3">إرسال</button><br><br>
        </div>
    </form>
</div>
</body>

</html>
