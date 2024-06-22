@extends('layouts.master_admin')

@section('title')

@endsection

@section('css')

@endsection


@section('content')

@if ($errors->any())
<div class='alert alert-danger'>
    @foreach ($errors->all() as $error)
        {{ $error }}
        <br>
    @endforeach
</div>
@endif

     @if (Session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    @if (Session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif 
        
        
    @if (Session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ Session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- @if (Session()->has('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ Session()->get('Error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif --}}


    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        @can("اضافة اودر")
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#exampleModal">اضافة اوردر</a>
                            @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">اسم المستخدم</th>
                                    <th class="border-bottom-0">ايميل المستخدم</th>
                                    <th class="border-bottom-0">موبايل المستخدم</th>
                                    <th class="border-bottom-0">ملاحظات المستخدم</th>
                                    <th class="border-bottom-0">الخدمة</th>
                                    <th class="border-bottom-0">مدينة المستخدم</th>
                                    <th class="border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;?>
                                @foreach ($order as $ord)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $ord->order_name }}</td>
                                    <td>{{ $ord->order_email }}</td>
                                    <td>{{ $ord->order_mobile }}</td>
                                    <td>{{ $ord->order_note }}</td>
                                    <td>{{ $ord->services->srev_name }}</td>
                                    <td>{{ $ord->cities->city_name }}</td>
                                    <td>
                                        @can("تعديل اوردر")
                                        <button class="btn btn-outline-success btn-sm"
                                        data-order_name="{{ $ord->order_name }}" data-order_moblie="{{ $ord->order_mobile }}"
                                        data-order_email="{{ $ord->order_email }}" data-order_city ="{{ $ord->cities->city_name }}"
                                        data-order_service="{{ $ord->services->srev_name }}"
                                        data-note="{{ $ord->order_note }}"
                                        data-id="{{ $ord->order_id }}"
                                        data-toggle="modal"
                                        data-target="#edit_Product">تعديل</button>
                                            @endcan
                                            
                                            @can("حذف اوردر")
                                            <button class="btn btn-outline-danger btn-sm " 
                                            data-pro_id="{{ $ord->order_id }}"
                                            data-order_name="{{ $ord->order_name }}" data-toggle="modal"
                                            data-target="#modaldemo9">حذف</button>
                                            @endcan
                                    </td>
                              </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- add -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">اضافة طلب</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('checkorder') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم المستخدم</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ايميل الطلب</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">رقم الموبايل</label>
                                <input type="text" class="form-control" id="mobile" name="mobile">
                            </div>


                            <label for="city" class="font-1">اختار مدينة</label>
                            <select name="city" id="city" class="form-control font-1">
                                <option value="" selected disabled>المدن المتاحة</option>
                               @foreach($city as $citys) 
                              <option value="{{ $citys->id }}">
                              {{ $citys->city_name }}
                              </option>
                              @endforeach 
                            </select>
                            <label for="service" class="font-1">اختار خدمة</label>
                            <select name="service" id="service" class="form-control font-1">
                                <option value="" selected disabled>الخدمات المتاحة</option>
                               @foreach($service as $serv) 
                              <option value="{{ $serv->id }}">
                              {{ $serv->srev_name }}
                              </option>
                              @endforeach 
                            </select>
                            <div class="form-group">
                                <label for="exampleInputEmail1">اي ملاحظة</label>
                                <input type="text" class="form-control" id="notes" name="notes">
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- edit -->
        <div class="modal fade" id="edit_Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات المستخدم</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('order.update', $i) }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" id="id" value="">
                                <label for="title">اسم المستخدم</label>
                                <input type="text" class="form-control" name="order_name" id="order_name" value=''>
                                <label for="title">ايميل المستخدم</label>
                                <input type="text" class="form-control" name="order_email" id="order_email" value=''>
                                <label for="title">موبايل المستخدم</label>
                                <input type="text" class="form-control" name="order_moblie" id="order_moblie" value=''>
                                <label for="city" class="font-1">اختار مدينة</label>
                                <select name="order_city" id="order_city" class="form-control font-1">
                                    @foreach($city as $citys) 
                                        <option value="{{ $citys->id }}">{{ $citys->city_name }}</option>
                                    @endforeach 
                                </select>
                                <label for="service" class="font-1">اختار خدمة</label>
                                <select name="order_service" id="order_service" class="form-control font-1">
                                   @foreach($service as $serv) 
                                  <option value="{{ $serv->id }}">
                                  {{ $serv->srev_name }}
                                  </option>
                                  @endforeach 
                                </select>
                                <label for="title">ملاحظات</label>
                                <input type="text" class="form-control" name="note" id="note" value=''>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
    </div>
    <!-- row closed -->
</div>

        <!-- delete -->
        <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">حذف المنتج</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('order.destroy', $i) }}" method="post">
                        @method('delete');
                        @csrf
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="pro_id" id="pro_id" value="">
                            <input class="form-control" name="order_name" id="order_name" type="text" vlaue="" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Container closed -->
    </div>
@endsection



@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
      $('#edit_Product').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var order_name = button.data('order_name')
          var order_email = button.data('order_email')
          var order_moblie = button.data('order_moblie')
          var order_service = button.data('order_service')
          var order_city = button.data('order_city')
          var note = button.data('note')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #order_name').val(order_name);
          modal.find('.modal-body #order_email').val(order_email);
          modal.find('.modal-body #order_moblie').val(order_moblie);
          modal.find('.modal-body #order_service').val(order_service);
          modal.find('.modal-body #order_city').val(order_city);
          modal.find('.modal-body #note').val(note);
      
      })
      
      
              $('#modaldemo9').on('show.bs.modal', function(event) {
                  var button = $(event.relatedTarget)
                  var pro_id = button.data('pro_id')
                  var order_name = button.data('order_name')
                  var modal = $(this)
      
                  modal.find('.modal-body #pro_id').val(pro_id);
                  modal.find('.modal-body #order_name').val(order_name);
              })
      
          </script>
      
@endsection


