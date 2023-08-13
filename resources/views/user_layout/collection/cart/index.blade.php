@extends('user_layout.comman.main')
@section('title','Cart')
@section('main-section')
<style>
    .product-image {
      width: 100px;
      height: 100px;
    }
  </style>
<!-- SECTION -->
<livewire:user.cart.cart-show/>
<!-- END SECTION -->
@endsection