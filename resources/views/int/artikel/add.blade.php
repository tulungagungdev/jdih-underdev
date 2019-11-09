@extends('layouts.app')

@section('theme_js')
<!-- Theme JS files -->
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/editors/wysihtml5/wysihtml5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/editors/wysihtml5/toolbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/editors/wysihtml5/parsers.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/editors/wysihtml5/locales/bootstrap-wysihtml5.ua-UA.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/plugins/notifications/jgrowl.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('limitless/js/core/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/pages/form_layouts.js') }}"></script>
<!-- /theme JS files -->
@endsection

@section('content')

<!-- Basic datatable -->
<form method="POST" action="{{ route('data.artikel.save') }}"  enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="file_exist" value="false" id="">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Form Tambah Artikel</h5>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
				</ul>
			</div>
		</div>

		<div class="panel-body">
			
			@if (\Session::has('error'))
				<div class="alert alert-warning no-border">
					<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
					<span class="text-semibold">Terjadi kesalahan!</span> {{ \Session::get('error') }}
				</div>
			@endif
			<div class="form-group @if($errors->has('judul_artikel')) has-error has-feedback @endif">
				<label>Judul Artikel:</label>
				<input type="text" name="judul_artikel" value="{{ old('judul_artikel') }}" required class="form-control" placeholder="Nama produk">
				@if ($errors->has('judul_artikel'))
					<div class="form-control-feedback">
						<i class="icon-notification2"></i>
					</div>
					<span class="help-block">{{ $errors->first('judul_artikel') }}</span>
				@endif
			</div>
			
			<div class="form-group @if($errors->has('sampul_artikel')) has-error has-feedback @endif">
				<label>Sampul Artikel:</label>
				<input type="file" name="sampul_artikel" class="file-styled">
				@if ($errors->has('sampul_artikel'))
					<div class="form-control-feedback">
						<i class="icon-notification2"></i>
					</div>
					<span class="help-block">{{ $errors->first('sampul_artikel') }}</span>
				@endif
			</div>
			<div class="form-group @if($errors->has('isi_artikel')) has-error has-feedback @endif">
				<label>Isi Artikel:</label>
				<textarea rows="5" cols="5" class="wysihtml5 wysihtml5-min form-control" placeholder="Masukkan deskripsi" name="isi_artikel">{{ old('isi_artikel') }}</textarea>
				@if ($errors->has('isi_artikel'))
					<div class="form-control-feedback">
						<i class="icon-notification2"></i>
					</div>
					<span class="help-block">{{ $errors->first('isi_artikel') }}</span>
				@endif
			</div>
			
			<div class="text-right">
				<a href="{{ route('data.buku') }}" class="btn btn-link">Kembali ke Daftar</a>
				<button type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button>
			</div>
			
		</div>

	</div>
</form>

@endsection
@section('my_script')
<script>
$('.wysihtml5-min').wysihtml5({
	parserRules:  wysihtml5ParserRules,
	"font-styles": true, // Font styling, e.g. h1, h2, etc. Default true
	"emphasis": true, // Italics, bold, etc. Default true
	"lists": true, // (Un)ordered lists, e.g. Bullets, Numbers. Default true
	"html": false, // Button which allows you to edit the generated HTML. Default false
	"link": true, // Button to insert a link. Default true
	"image": false, // Button to insert an image. Default true,
	"action": false, // Undo / Redo buttons,
	"color": true // Button to change color of font
});
</script>
@endsection