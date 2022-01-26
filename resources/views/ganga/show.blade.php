@extends('layouts.gangaBatoi')
@section('content')
    <div class="row">
<div class="col-xl-3 col-lg-4 col-md-4 col-12">
    <div class="single-product">
        <div class="product-img">
            <a href="<?=$ganga->url?>">

                <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">

                <p> Points: <?=$ganga->points ?> Category: <?=$ganga->category->title?></p>

            </a>
            <div class="button-head">

                <br>
                <div class="product-action">
                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="{{route('ganga.show',$ganga->id)}}"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                    <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                    <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                    @if(Auth::user() && Auth::user()->admin)
                        <a title="edit" href="{{route('ganga.edit',$ganga->id)}}"><i class=" ti-pencil "></i><span>Edit ganga</span></a>
                        <form action="{{ route('ganga.destroy', $ganga->id) }}" method="POST" class="d-inline-block">
                        @method('DELETE')
                        @csrf
                        <button class="bi bi-trash"><i class="ti-trash"></i></button>
                    </form>
                    @endif
                </div>
                <div class="product-action-2">
                    <a title="Add to cart" href="#">Add to cart</a>
                </div>
            </div>
        </div>
        <div class="product-content">
            <h3><a href="<?=$ganga->url?>"><?=$ganga->title?></a></h3>
            <div class="product-price">
                <?='New price:'. $ganga->discount_price??'' ?>
                <?= isset($ganga->discount_price)
                    ?'<span  class="text-muted text-decoration-line-through"> Old price:'.$ganga->price.'</span>'
                    :$ganga->price
                ?>
            </div>
        </div>
    </div>
</div>
        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
            <h2>Description</h2>
            <p><?=$ganga->description?></p>
            <?=$ganga->available?'available':'No available'?>
        </div>
    </div>
@endsection
