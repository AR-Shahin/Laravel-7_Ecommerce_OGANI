@extends('layouts.backmaster')
@section('title', 'Slider')
@section('css_files')
    <link href="{{ asset('backend') }}/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">
@endsection
{{--breadcrumb  --}}
@section('breadcrumb')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('dashboard') }}">Dashboard</a>
        <a class="breadcrumb-item">Slider</a>
    </nav>
@endsection


{{--main content  --}}
@section('main_content')
    <div class="row no-gutters">
        <div class="col-12 col-md-9">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3">Manage Slider</h3>
                    <hr>
                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                            <tr>
                                <th class="wd-15p">Image</th>
                                <th class="wd-20p">Text_1</th>
                                <th class="wd-20p">Text_2</th>
                                <th class="wd-20p">Text_3</th>
                                <th class="wd-20p">Text_4</th>
                                <th class="wd-10p">Actions</th>
                            </tr>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td><img src="{{asset($slider->image)}}" width="100px" alt=""></td>
                                    <td>{{$slider->text_1}}</td>
                                    <td>{{$slider->text_2}}</td>
                                    <td>{{$slider->text_3}}</td>
                                    <td>{{$slider->text_4}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#editModal_{{ $slider->id }}" class="btn btn-info btn-sm text-light"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('slider.delete',$slider->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            </thead>

                        </table>

                    </div><!-- table-wrapper -->
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3">Add Slider</h3>
                    <hr>
                    <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="">Text One : </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control @error('txt_1') is-invalid @enderror" placeholder="Text One" value="{{ old('txt_1') }}" name="txt_1">
                        </div>
                        @error('txt_1')
                        <span class="text-danger">{{ $message  }}</span>
                        @enderror
                        <br>
                        <label for="">Text two : </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control @error('txt_2') is-invalid @enderror" placeholder="Text Two" value="{{ old('txt_2') }}" name="txt_2">
                        </div>
                        @error('txt_2')
                        <span class="text-danger">{{ $message  }}</span>
                        @enderror
                        <br>
                        <label for="">Text three : </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control @error('txt_3') is-invalid @enderror" placeholder="Text Three" value="{{ old('txt_3') }}" name="txt_3">
                        </div>
                        @error('txt_3')
                        <span class="text-danger">{{ $message  }}</span>
                        @enderror
                        <br>
                        <label for="">Text Four : </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control @error('txt_4') is-invalid @enderror" placeholder="Text Four" value="{{ old('txt_4') }}" name="txt_4">
                        </div>
                        @error('txt_4')
                        <span class="text-danger">{{ $message  }}</span>
                        @enderror
                        <br>
                        <label for="">Slider Image : </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-image tx-16 lh-0 op-6"></i></span>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"  value="{{ old('image') }}" name="image">
                        </div>
                        @error('image')
                        <span class="text-danger">{{ $message  }}</span>
                        @enderror
                        <br>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-plus-square mr-1"></i> Add Slider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
 {{--Edit modal --}}
@foreach($sliders as $slider)
<div id="editModal_{{ $slider->id }}" class="modal fade">
<div class="modal-dialog modal-md" role="document">
<div class="modal-content bd-0 tx-14">
<div class="modal-header pd-x-20">
<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Slider</h6>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body pd-20">
<form action="{{route('slider.update',$slider->id)}}"  method="POST" enctype="multipart/form-data">
@csrf
<input type="hidden"  value="{{ $slider->image }}" name="old_img">
<label for="">Text One : </label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
<input type="text" class="form-control @error('text_1') is-invalid @enderror" value="{{ $slider->text_1 }}" name="text_1">
</div>
@error('text_1')
<span class="text-danger">{{ $message  }}</span>
@enderror

    <label for="">Text Two : </label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
        <input type="text" class="form-control @error('text_2') is-invalid @enderror" value="{{ $slider->text_2 }}" name="text_2">
    </div>
    @error('text_2')
    <span class="text-danger">{{ $message  }}</span>
    @enderror

    <label for="">Text Three : </label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
        <input type="text" class="form-control @error('text_3') is-invalid @enderror" value="{{ $slider->text_3 }}" name="text_3">
    </div>
    @error('text_3')
    <span class="text-danger">{{ $message  }}</span>
    @enderror

    <label for="">Text Four : </label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-tags tx-16 lh-0 op-6"></i></span>
        <input type="text" class="form-control @error('text_4') is-invalid @enderror" value="{{ $slider->text_4 }}" name="text_4">
    </div>
    @error('text_4')
    <span class="text-danger">{{ $message  }}</span>
    @enderror
<label for="">Slider Image : </label>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-image tx-16 lh-0 op-6"></i></span>
<input type="file" class="form-control @error('cat_img') is-invalid @enderror"  value="{{ old('cat_img') }}" name="cat_img">
<img src="{{ asset($slider->image) }}" alt="" width="60px">
</div>
@error('cat_img')
<span class="text-danger">{{ $message  }}</span>
@enderror
<div class="form-group mt-3">
<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-pencil-square mr-1"></i> Update Slider</button>
</div>
</form>
</div>
</div>
</div><!-- modal-dialog -->
</div><!-- modal -->
@endforeach
@section('scripts')
    <script src="{{ asset('backend') }}/lib/highlightjs/highlight.pack.js"></script>
    <script src="{{ asset('backend') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('backend') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{ asset('backend') }}/lib/select2/js/select2.min.js"></script>
    <script>
        $(function(){
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            /*$('#datatable2').DataTable({
             bLengthChange: false,
             searching: false,
             responsive: true
             });*/

            // Select2
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>
@endsection

