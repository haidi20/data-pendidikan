@extends('_layouts.default')

@section('script-top')
<link rel="stylesheet" href="{{asset('robust/app-assets/css/plugins/forms/validation/form-validation.min.css')}}">
@endsection

@section('script-bottom')
<script src="{{asset('robust/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"> </script>
<script src="{{asset('robust/app-assets/js/scripts/forms/validation/form-validation.min.js')}}"> </script>
<script src="{{asset('js/backend.js')}}"> </script>
@endsection

@section('content')
<div class="content-header">
	<div class="row">
		<div class="col-md-12">
			{{-- @if(session()->has('message'))
				<div class="alert bg-success alert-dismissible fade in mb-2" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<strong> {{session()->get('message')}} </strong>
				</div>
			@endif --}}
		</div>
	</div>
    <div class="row">
        <div class="col-md-6 ">
			{{-- @include('_layout.breadcrumb') --}}
			<h3>Seksi Penyusunan Program</h3>
        </div>
    </div>
</div>
<div class="content-body">
	<section class="row">
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-square-controls">Form Buku Tamu</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							{{-- <li><a data-action="collapse"><i class="icon-minus4"></i></a></li> --}}
						</ul>
					</div>
				</div>
				<div class="card-body collapse in">
					<div class="card-block">

						{{-- {!! Form::open(['class' => 'form form-horizontal', 'novalidate']) !!} --}}
						<form action="{{route('guestbook.send')}}" method="GET" class="form form-hotizontal">
							<input type="hidden" name="_method" value="#">
          					{{ csrf_field() }}
							<div class="form-body pt-1">

								<div class="form-group row ">
									{{-- <label for="date" class="col-md-2 label-control">Tanggal</label> --}}
									{{-- <div class="col-md-10">
										<input type="text" class="form-control" name="date" required value="{{ old('date') }}" disabled>
										<div class="help-block font-small-3"></div>
									</div> --}}
									{{-- <h2 align="right">Senin, 25 Oktober 2019</h2> --}}
									<h2 align="right"> {{$dateNow}} </h2>
								</div>

                                <div class="form-group row ">
                                    <label for="name" class="col-md-2 label-control">Nama</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                                        <div class="help-block font-small-3"></div>
                                    </div>
								</div>

								<div class="form-group row position-relative">
									<label for="guest_group" class="col-md-2 label-control">Kelompok Tamu</label>
									<div class="col-md-10">
										<select class="form-control select2" name="guest_group" required>
											<option value="">Pilih Jenis Tamu</option>
											@foreach ($guestGroup as $index => $item)
												<option value="{{$item->id}}">{{$item->name}}</option>
											@endforeach
										</select>
										<div class="form-control-position">
			                                <i class="icon-spinner2 spinner" id="spinner-item" style="display: none;"></i>
			                            </div>
										<div class="help-block font-small-3"></div>
									</div>
                                </div>
                                
                                <div class="form-group row position-relative">
                                    <label for="necessity" class="col-md-2 label-control">Keperluan</label>
                                    <div class="col-md-10">
                                        <select class="form-control select2" name="necessity" required>
                                            <option value="">Pilih Keperluan</option>
                                            @foreach ($necessity as $index => $item)
												<option value="{{$item->id}}">{{$item->name}}</option>
											@endforeach
                                        </select>
                                        <div class="form-control-position">
                                            <i class="icon-spinner2 spinner" id="spinner-item" style="display: none;"></i>
                                        </div>
                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>

								<hr>

								<div class="offset-md-2">
									<button type="submit" class="btn btn-primary">
										<i class="icon-save"></i> Save
									</button>
								</div>
							</div>
						</form>
						{{-- {!! Form::close() !!} --}}

					</div>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-square-controls">Rekap Tamu</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							{{-- <li><a data-action="collapse"><i class="icon-minus4"></i></a></li> --}}
						</ul>
					</div>
				</div>
				<div class="card-body collapse in">
					<div class="card-block">
						<div class="table-responsive">
							<table class="table table-sm mb-0 table-hover">
								<thead class="">
								<!-- <thead class="bg-lighten"> -->
									<tr>
										<th>Kelompok</th>
										<th>Hari ini</th>
										<th>Minggu ini</th>
										<th>Bulan ini</th>
										{{-- @endif --}}
									</tr>
								</thead>
								<tbody>
									@forelse ($guestGroup as $index => $item)
										<tr>
											<td> {{$item->name}} </td>
											<td> {{$guestRecap[$item->id]['day']}} </td>
											<td> {{$guestRecap[$item->id]['week']}} </td>
											<td> {{$guestRecap[$item->id]['month']}} </td>
										</tr>
									@empty
										<tr>
											<td colspan="4" align="center">Kosong</td>
										</tr>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

@endsection
