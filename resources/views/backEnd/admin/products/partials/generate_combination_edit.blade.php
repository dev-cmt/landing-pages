@if (count($combinations) > 0)
    <table class="table table-bordered my-2">
        <thead>
            <tr>
                <th class="text-center">Attributes</th>
                <th class="text-center">Price</th>
                <th class="text-center">SKU</th>
                <th class="text-center">Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($combinations as $key => $combination)
                @php
                    // Variant name & SKU
                    $variantParts = array_map(function ($item) {
                        return strtolower(str_replace(' ', '_', $item));
                    }, array_values($combination));

                    $variantStr = implode('-', $variantParts);
                    $variantSku = $product_sku ? strtolower($product_sku) . '-' . $variantStr : $variantStr;

                    // Existing product attribute
                    $data = $product->get_variants->where('variant', $variantStr)->first();
                    $price = $data ? $data->price : $unit_price ?? 0;
                    $stock = $data ? $data->stock : 10;
                @endphp

                <tr class="variant">
                    {{-- <label class="control-label">{{ $variantStr }}</label> --}}
                    {{-- <input type="hidden" name="variant_name[]" value="{{ $variantStr }}" readonly> --}}
                    <td><input type="text" name="variant_name[]" value="{{ $variantStr }}" class="form-control"
                            readonly>
                    </td>

                    @foreach ($combination as $attrValue)
                        <input type="hidden" name="combination_id[{{ $key }}][]"
                            value="{{ strtolower(str_replace(' ', '_', $attrValue)) }}">
                    @endforeach
                    </td>

                    <td>
                        <input type="number" name="variant_price[]" value="{{ $price }}" min="0"
                            step="0.01" class="form-control" required>
                    </td>

                    <td>
                        <input type="text" name="variant_sku[]" value="{{ $variantSku }}" class="form-control"
                            readonly>
                    </td>

                    <td>
                        <input type="number" name="variant_stock[]" value="{{ $stock }}" min="0"
                            step="1" class="form-control" required>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
