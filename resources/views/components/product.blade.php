@if ($product)
    <div class="product">
        <h3><a href="/product/{{ $product->id }}">Title : {{ $product->title }} </a></h3>
        <span><small>{{ $product->created_at->diffForHumans() }}</small></span>
        <h3>Price : {{ $product->price }} </h3>
        <h3>Quantity : {{ $product->quantity }} </h3>
        <p>Description : {{ $product->description }} </p>
        </a>
    </div>
@endif