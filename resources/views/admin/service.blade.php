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
                        @can("اضافة خدمة")
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#exampleModal">اضافة خدمة</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">اسم الخدمة</th>
                                    <th class="border-bottom-0">العمليات</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;?>
                                @foreach ($service as $serv)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $serv->srev_name }}</td>
                                    <td>
                                        @can("تعديل خدمة")
                                        <button class="btn btn-outline-success btn-sm"
                                        data-serv_name="{{ $serv->srev_name }}" data-pro_id="{{ $serv->id }}"
                                             data-toggle="modal"
                                            data-target="#edit_Product">تعديل</button>
                                            @endcan
                                            
                                            @can("حذف خدمة")
                                            <button class="btn btn-outline-danger btn-sm " data-pro_id="{{ $serv->id }}"
                                                data-serv_name="{{ $serv->srev_name }}" data-toggle="modal"
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
                    <form action="{{ route('services.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">اسم الخدمة</label>
                                <input type="text" class="form-control" id="serv_name" name="serv_name">
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
                      <h5 class="modal-title" id="exampleModalLabel">تعديل الخدمة</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ route('services.update', $i) }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">
                                
                                <label for="title">اسم الخدمة :</label>

                                <input type="text" class="form-control" name="serv_name" id="serv_name" value=''>
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
                    <form action="{{ route('services.destroy', $i) }}" method="post">
                        @method('delete');
                        @csrf
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="pro_id" id="pro_id" value="">
                            <input class="form-control" name="serv_name" id="serv_name" type="text" vlaue="" readonly>
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
    <!-- main-content closed -->
@endsection
@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
$('#edit_Product').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var serv_name = button.data('serv_name')
    var pro_id = button.data('pro_id') 
    var modal = $(this)
    modal.find('.modal-body #pro_id').val(pro_id);
    modal.find('.modal-body #serv_name').val(serv_name);

})


        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var pro_id = button.data('pro_id')
            var serv_name = button.data('serv_name')
            var modal = $(this)

            modal.find('.modal-body #pro_id').val(pro_id);
            modal.find('.modal-body #serv_name').val(serv_name);
        })

    </script>



@endsection