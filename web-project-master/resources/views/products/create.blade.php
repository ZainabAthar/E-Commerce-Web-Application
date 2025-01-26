<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Product Name</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>Brief Description</label>
        <input type="text" name="brief_description">
    </div>

    <div>
        <label>Full Description</label>
        <textarea name="description"></textarea>
    </div>

    <div>
        <label>Price</label>
        <input type="number" step="0.01" name="price">
    </div>

    <div>
        <label>Old Price</label>
        <input type="number" step="0.01" name="old_price">
    </div>

    <div>
        <label>SKU</label>
        <input type="text" name="SKU">
    </div>

    <div>
        <label>Quantity</label>
        <input type="number" name="quantity">
    </div>

    <div>
        <label>Stock Status</label>
        <select name="stock_status">
            <option value="instock">In Stock</option>
            <option value="outstock">Out of Stock</option>
        </select>
    </div>

    <div>
        <label>Main Image</label>
        <input type="file" name="image">
    </div>

    <div>
        <label>Additional Images</label>
        <input type="file" name="images[]" multiple>
    </div>

    <button type="submit">Create Product</button>
</form>