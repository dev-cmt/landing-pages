<tr>
    {{-- Hidden product_id & SKU --}}
    <input type="hidden" name="product_id[]" class="product_id" value="{{ $data->id }}">
    <input type="hidden" name="product_sku[]" class="product_sku" value="{{ $product_attributes->sku }}">
    {{-- @dd( $product_attributes->sku) --}}
    {{-- SKU & Stock --}}
    <td class="text-left sku">
        <span class="sku-name"> {{ $product_attributes->sku }}</span>
        <br>
        <small class="text-success stock_in {{ $product_attributes->stock > 0 ? 'd-block' : 'd-none' }}">Stock
            In</small>
        <small class="text-danger stock_out {{ $product_attributes->stock <= 0 ? 'd-block' : 'd-none' }}">Stock
            Out</small>
    </td>

    {{-- Product Name + Attributes --}}
    <td class="text-left">
        {{ Str::limit($data->name, 45) }}

        @if ($data->has_variant == 1 && count($data->get_choice_attributes) > 0)
            <br>
            @foreach ($data->get_choice_attributes as $attrKey => $attribute)
                @php
                    $attrTitle = $attribute->get_attribute->title;
                    $selectedValue = $choice_attributes[$attrKey] ?? null;
                @endphp

                <small><b>
                        {{ ucfirst($attrTitle) }}
                    </b></small><br>
                @foreach ($attribute->get_choice_attribute_items as $optKey => $item)
                    <input class=" attr_checkbox" type="radio"
                        name="attribute_choice[{{ $product_attributes->sku }}][{{ $attrTitle }}]"
                        id="attribute_choice_{{ $product_attributes->sku }}{{ $attrKey }}{{ $optKey }}"
                        value="{{ $item->attribute_item_name }}"
                        {{ strtolower($selectedValue) == strtolower($item->attribute_item_name) ? 'checked' : '' }}
                        required>
                    <label class="mb-0 small"
                        for="attribute_choice_{{ $product_attributes->sku }}{{ $attrKey }}{{ $optKey }}">
                        {{ ucfirst($item->attribute_item_name) }}
                    </label>
                @endforeach
                <br>
            @endforeach
        @endif
    </td>

    {{-- Quantity + Price --}}
    <td>
        <input style="width:60px;border:1px solid #ddd;" min="1" type="number" class="form-control qty"
            name="qty[]" value="1">

        <input type="hidden" name="price[]" class="price" value="{{ $product_attributes->price }}">
        <input type="hidden" name="total_price[]" class="total_price"
            value="{{ number_format($product_attributes->price, 2) }}">
    </td>

    {{-- Total Price --}}
    <td class="total_price_display">
        {{ number_format($product_attributes->price, 2) }}

    </td>

    {{-- Remove --}}
    <td><i class="fa fa-trash remove_btn text-danger" style="cursor: pointer"></i></td>
</tr>

{{-- JS for total calculation --}}
<script>
    $('.qty').on('keyup change', function() {
        let qty = parseInt($(this).val()) || 0;
        let price = parseFloat($(this).closest('td').find('.price').val()) || 0;
        let total = qty * price;
        $(this).closest('tr').find('.total_price').text(total.toFixed(2));
        finalCalc();
    });
    $('.remove_btn').on('click', function() {
        $(this).closest("tr").remove();
        finalCalc();
    });
</script>
