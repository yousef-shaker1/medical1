<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب موعد - عيادة طبية</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('https://img.lovepik.com/photo/50070/4893.jpg_wh300.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            font-family: 'Montserrat', 'Open Sans', sans-serif;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            margin-top: 50px;
        }
        .btn-custom {
            background-color: #28a745;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 form-container">
          @if (Session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{ Session()->get('success') }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif         
          @if($errors->any())
          <div class='alert alert-danger'>
            <ul>
              @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
              @endforeach
            </ul>
          </div>
          @endif

            <form class="row mt-5" method="POST" action="{{ route('order.store') }}">
              @csrf
              <div class="col-sm-6">
                <div class="form-group mt-3">
                  <label for="service" class="font-weight-bold">اختر الخدمة</label>
                  <select name="service" id="service" class="form-control">
                    @foreach($serv as $se)
                      <option value="{{ $se->id }}">
                      {{ $se->srev_name }}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>
  
              <div class="col-sm-6">
                <div class="form-group mt-3">
                  <label for="city" class="font-weight-bold">اختر المدينة</label>
                  <select name="city" id="city" class="form-control">
                    @foreach($city as $ci) 
                    <option value="{{ $ci->id }}">
                      {{ $ci->city_name }}
                    </option>
                    @endforeach 
                  </select>
                </div>
              </div>
  
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="name" class="font-weight-bold">اكتب اسمك *</label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>
              </div>
  
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="email" class="font-weight-bold">اكتب بريدك الإلكتروني</label>
                  <input type="email" name="email" id="email" class="form-control">
                </div>
              </div>
  
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                  <label for="mobile" class="font-weight-bold">اكتب رقم هاتفك *</label>
                  <input type="text" name="mobile" id="mobile" class="form-control">
                </div>
              </div>
  
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="notes" class="font-weight-bold">اكتب ملاحظات</label>
                  <textarea name="notes" id="notes" class="form-control" rows="5"></textarea>
                </div>
              </div>
  
              <div class="col-sm-12">
                <div class="form-group">
                  <button type="submit" class="btn btn-custom form-control">إرسال</button>
                </div>
                <div class="form-group">
                  <a href='mailto:youssefshaker2cool@gmail.com' class="btn btn-custom form-control">إرسال إلى البريد الإلكتروني</a>
                </div>
                <div class="form-group">
                  <a href='tel:+201101336383' class="btn btn-custom form-control">اتصل بي</a>
                </div>
              </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>