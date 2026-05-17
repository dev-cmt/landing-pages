@if (count($combinations[0]) > 0)
    <table class="table table-bordered my-2">
        <thead>
            <tr>
                <th class="text-center">
                    Attributes
                </th>
                <th class="text-center">
                    Price
                </th>
                <th class="text-center">
                    SKU
                </th>
                <th class="text-center">
                    Quantity
                </th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd($product_sku) --}}
            @foreach ($combinations as $key => $combination)
                @php
                    // সব attribute values একসাথে জোড়া এবং lowercase করা
                    $variantName = array_map(function ($item) {
                        return strtolower(str_replace(' ', '_', $item));
                    }, array_values($combination));

                    // dd($variantName);
                    $variantName = implode('-', $variantName);

                    // SKU generate
                    $variantSku = $product_sku ? strtolower($product_sku) . '-' . $variantName : $variantName;
                @endphp

                <tr>
                    {{-- <td>{{ $variantName }}</td> --}}
                    {{-- <input type="hidden" name="variant_name[]" value="{{ $variantName }}"> --}}
                    <td><input type="text" name="variant_name[]" value="{{ $variantName }}" class="form-control"
                            readonly></td>


                    {{-- Multi array version --}}
                    @foreach ($combination as $attrName => $attrValue)
                        <input type="hidden" name="combination_id[{{ $key }}][]"
                            value="{{ strtolower($attrValue) }}">
                    @endforeach

                    <td>
                        <input type="number" name="variant_price[]" value="{{ $unit_price }}" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="variant_sku[]" value="{{ $variantSku }}" class="form-control"
                            readonly>
                    </td>
                    <td>
                        <input type="number" name="variant_stock[]" class="form-control" value="10">
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endif
