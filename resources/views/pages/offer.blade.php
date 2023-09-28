@extends('pages.layouts.layout')

@section('content')
	
	@include('pages.layouts.sections._section_search')
	
	{{-- @include('pages.layouts.sections._section_categories') --}}
	
	@include('pages.layouts.sections._section_offer')
	
	@include('pages.layouts.sections._section_last_offers')
	
@endsection