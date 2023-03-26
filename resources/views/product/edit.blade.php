<x-layout :title="'Create Product '" :css="'form.css'">
    <form class="create-form" action="/product/update/{{ $product->id }}" method="post">
        @csrf
        <div class="form-input">
            <label class="label" class="input" for="title">Title : </label>
            <input class="input" type="text" name="title" id="title" value={{ $product->title }} required>
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-input">
            <label class="label" for="price">price : </label>
            <input class="input" type="number" name="price" id="price" value={{ $product->price }} required>
            @error('price')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-input">
            <label class="label" for="quantity">Quentity : </label>
            <input class="input" type="number" name="quantity" id="quantity" value={{ $product->quantity }} required>
            @error('quantity')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-input">
            <label class="label" for="description">Description : </label>
            <textarea class="input" name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea>
            @error('description')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Edit Product</button>
        <a href='/product/{{ $product->id }}'>Cancel</a>
    </form>

</x-layout>
