@extends('layouts.master')


@section('pageTitle')
ثبت اصلاعات معرف متوفی
@stop

@section('head')

@stop


@section('content')
{{Form::open(array('route' => 'reagentAdd'))}}

	{{Form::label('name', 'نام')}}
	{{Form::text('name')}}

	@if ($errors->has('name'))
		<span>
			{{$errors->first('name')}}
		</span>
	@endif
<br><br>

	{{Form::label('family', 'نام خانوادگی')}}
	{{Form::text('family')}}

	@if ($errors->has('family'))
		<span>
			{{$errors->first('family')}}
		</span>
	@endif
<br><br>

	{{Form::label('fatherName', 'نام پدر')}}
	{{Form::text('family')}}

	@if ($errors->has('family'))
		<span>
			{{$errors->first('family')}}
		</span>
	@endif
<br><br>

	{{Form::label('shsh', 'شماره شناسنامه')}}
	{{Form::text('shsh')}}

	@if ($errors->has('shsh'))
		<span>
			{{$errors->first('shsh')}}
		</span>
	@endif
<br><br>

	{{Form::label('nationalCode', 'کد ملی')}}
	{{Form::text('nationalCode')}}

	@if ($errors->has('nationalCode'))
		<span>
			{{$errors->first('nationalCode')}}
		</span>
	@endif
<br><br>

	{{Form::label('gender', 'جنسیت')}}
	{{Form::radio('gender', '1')}}مرد
	{{Form::radio('gender', '2')}}زن

	@if ($errors->has('gender'))
		<span>
			{{$errors->first('gender')}}
		</span>
	@endif
<br><br>

	{{Form::label('relationShipId', 'نسبت با متوفی')}}
	{{Form::select('relationShipId', $relationship)}}

	@if ($errors->has('relationShipId'))
		<span>
			{{$errors->first('relationShipId')}}
		</span>
	@endif
<br><br>

	{{Form::label('mobile' , 'شماره تماس')}}
	{{Form::text('moblie')}}

	@if ($errors->has('mobile'))
		<span>
			{{$errors->first('mobile')}}
		</span>
	@endif
<br><br>

	{{Form::label('address' , 'آدرس')}}
	{{Form::text('address')}}

	@if ($errors->has('address'))
		<span>
			{{$errors->first('address')}}
		</span>
	@endif
<br><br>

	{{Form::submit('ثبت')}}

{{Form::close()}}

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@stop