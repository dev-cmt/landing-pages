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
            @foreach ($combinations as $key => $combination)
                @php
                    $sku = '';
                    /*foreach (explode(' ', $product_name) as $key => $value) {
                    $sku .= strtolower(substr($value, 0, 1));
                }*/
                    //dd($sku);
                    $str = '';
                    foreach ($combination as $key => $item) {
                        if ($key > 0) {
                            $str .= '-' . strtolower(str_replace(' ', '_', $item));
                            if ($sku) {
                                $sku .= '-' . strtolower(str_replace(' ', '_', $item));
                            } else {
                                $sku .= strtolower(str_replace(' ', '_', $item));
                            }
                        } else {
                            $str .= strtolower(str_replace(' ', '_', $item));
                            if ($sku) {
                                $sku .= '-' . strtolower(str_replace(' ', '_', $item));
                            } else {
                                $sku .= strtolower(str_replace(' ', '_', $item));
                            }
                        }
                        $data = $product->get_variants->where('variant', $str)->first();
                    }
                    $variant_image = DB::table('product_attributes')
                        ->where('product_id', $product_id)
                        ->where('sku', $product_sku . '-' . $sku)
                        ->first();
                    // dd($variant_image);
                @endphp
                @if (strlen($str) > 0)
                    <tr class="variant">
                        <td class="text-center">
                            <label for="" class="control-label">{{ $str }}</label>
                            <input type="hidden" name="variant_name[]" value="{{ $str }}">
                        </td>
                        <td>
                            <input type="number" name="variant_price[]"
                                value="{{ $data ? $data->price : $unit_price ?? 0 }}" min="0" step="0.01"
                                class="form-control auto-select-number" required>
                        </td>
                        <td>
                            <input type="text" name="variant_sku[]"
                                value="{{ $product_sku ? $product_sku . '-' . $sku : $sku }}" class="form-control">
                        </td>
                        <td>
                            <input type="number" lang="en" name="variant_stock[]" value="10" min="0"
                                step="1" class="form-control auto-select-number" required>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endif
