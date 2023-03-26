<x-layout :css="'products.css'" :title="$product->title">
    <a href="/products">back</a>

    <div class="container ">
        <x-product :product="$product"></x-product>

        @can('admin')
            <form action="/product/destroy/{{ $product->id }}" method="post">
                @csrf
                <button type="submit">Delete</button>
            </form>

            <form action="/product/update/{{ $product->id }}" method="get">
                @csrf
                <button type="submit">Edit</button>
            </form>
        @endcan

    </div>



</x-layout>
