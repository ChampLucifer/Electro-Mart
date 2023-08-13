@extends('user_layout.comman.main')
@section('title')
{{ $product->meta_title }}
@endsection
@section('meta_keyword')
{{ $product->meta_keyword }}
@endsection
@section('meta_description')
{{ $product->meta_description }}
@endsection
@section('main-section')
<div>
    <livewire:user.product.view :category="$category" :product="$product" />
</div>

@endsection