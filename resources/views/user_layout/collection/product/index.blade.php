@extends('user_layout.comman.main')
@section('title')
{{ $category->meta_title }}
@endsection
@section('meta_keyword')
{{ $category->meta_keyword }}
@endsection
@section('meta_description')
{{ $category->meta_description }}
@endsection
@section('main-section')

<livewire:user.product.index  :category="$category" :categories="$categories" />


@endsection

