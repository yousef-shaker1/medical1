@extends('layouts.master_admin')

@section('title')
    المدن
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
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        @can('اضافة مدينة')
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#exampleModal">اضافة مدينة</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">اسم المدينة</th>
                                    <th class="border-bottom-0">العمليات</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($cities as $city)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $city->city_name }}</td>
                                        <td>
                                            @can('تعديل مدينة')
                                            <a class="modal-effect btn btn-sm btn-info custom-btn"
                                                data-effect="effect-scale" data-id="{{ $city->id }}"
                                                data-city="{{ $city->city_name }}" data-toggle="modal"
                                                href="#exampleModal2" title="تعديل">تعديل
                                                <i class="las la-pen"></i>
                                            </a>
                                            @endcan

                                            @can('حدف مدينة')
                                            <button class="btn btn-outline-danger btn-sm " data-id="{{ $city->id }}"
                                      data-city="{{ $city->city_name }}" data-toggle="modal"
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
                        <h5 class="modal-title" id="exampleModalLabel">اضافة مدينة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('city.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم المدينة</label>
                                <input type="text" class="form-control" id="city" name="city">
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

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل اسم المدينة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('city.update', $i) }}" method="post" autocomplete="off">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="city" class="col-form-label">اسم المدينة:</label>
                            <input class="form-control" name="city" id="city" type="text">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تاكيد</button>
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
                  <h5 class="modal-title">حذف المدينة</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('city.destroy', $i) }}" method="post">
                  @method('delete');
                  @csrf
                  <div class="modal-body">
                      <p>هل انت متاكد من عملية الحذف ؟</p><br>
                      <input type="hidden" name="id" id="id" value="">
                      <input class="form-control" name="city" id="city" type="text" vlaue="" readonly>
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
        document.addEventListener('DOMContentLoaded', function() {
    $('#exampleModal2').on('show.bs.modal', function(event) {
        // الحصول على الزر الذي أطلق الحدث
        var button = $(event.relatedTarget);
        // استخراج المعلومات من سمات البيانات
        var id = button.data('id');
        var city = button.data('city');
        // تحديث محتوى الحقول في النموذج داخل الـ modal
        var modal = $(this);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #city').val(city);
    });
});


$(document).ready(function() {
    $('#modaldemo9').on('show.bs.modal', function(event) {
        // الحصول على الزر الذي أطلق الحدث
        var button = $(event.relatedTarget);
        // استخراج المعلومات من سمات البيانات
        var id = button.data('id');
        var city = button.data('city');
        // تحديث محتوى الحقول في النموذج داخل الـ modal
        var modal = $(this);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #city').val(city);
    });
});
    </script>
@endsection
