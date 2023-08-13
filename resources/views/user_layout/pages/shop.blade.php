@extends('user_layout.comman.main')
@isset($categorys)
@section('title')
{{ $category->meta_title }}
@endsection
@section('meta_keyword')
{{ $category->meta_keyword }}
@endsection
@section('meta_description')
{{ $category->meta_description }}
@endsection    
@endisset

@section('main-section')

<livewire:user.pages.shop  :categories="$categories" :brands="$brands"  />



@endsection

