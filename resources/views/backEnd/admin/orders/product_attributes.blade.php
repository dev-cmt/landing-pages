<tr>
    {{-- Hidden product_id & SKU --}}
    <input type="hidden" name="product_id[]" class="product_id" value="{{ $data->id }}">
    <input type="hidden" name="product_sku[]" class="product_sku" value="{{ $sku }}">
    {{-- @dd( $sku) --}}
    {{-- SKU & Stock --}}
    <td class="text-left sku">
        <span class="sku-name"> {{ $sku }}</span>
        <br>
        <small class="text-success stock_in {{ $stock > 0 ? 'd-block' : 'd-none' }}">Stock In</small>
        <small class="text-danger stock_out {{ $stock <= 0 ? 'd-block' : 'd-none' }}">Stock Out</small>
    </td>

    {{-- Product Name + Attributes --}}
    <td class="text-left">
        {{ Str::limit($data->name, 45) }}

        @if ($data->has_variant == 1 && count($data->get_choice_attributes) > 0)
            <br>
            @foreach ($data->get_choice_attributes as $attrKey => $attribute)
                @php
                    $attrTitle = $attribute->get_attribute->title; // যেমন Size, Color
                    $selectedValue = $choice_attributes[$attrKey] ?? null; // DB থেকে আসা choice
                @endphp

                <small><b>
                        {{ format_title($attribute->get_attribute->title) }}
                    </b></small><br>
                <div style="display: flex; flex-wrap: wrap;flex-direction: row;align-items: center;gap: 10px">
                    @foreach ($attribute->get_choice_attribute_items as $optKey => $item)
                        <label class="mb-0 small" style="cursor: pointer;display: flex;align-items: center;gap: 5px"
                            for="attribute_choice_{{ $sku }}{{ $attrKey }}{{ $optKey }}">
                            <input class="attr_checkbox" type="radio"
                                name="attribute_choice[{{ $sku }}][{{ $attrTitle }}]"
                                id="attribute_choice_{{ $sku }}{{ $attrKey }}{{ $optKey }}"
                                value="{{ $item->attribute_item_name }}"
                                {{ strtolower($selectedValue) == strtolower($item->attribute_item_name) ? 'checked' : '' }}
                                required>
                            {{ ucfirst($item->attribute_item_name) }}
                        </label>
                    @endforeach
                </div>
            @endforeach
        @endif
    </td>

    {{-- Quantity + Price --}}
    <td>
        <input style="width:60px;border:1px solid #ddd;" min="1" type="number" class="form-control qty"
            name="qty[]" value="1">

        <input type="hidden" name="price[]" class="price" value="{{ $price }}">
        <input type="hidden" name="total_price[]" class="total_price" value="{{ number_format($price, 2) }}">
    </td>

    {{-- Total Price --}}
    <td class="total_price_display">
        {{ number_format($price, 2) }}

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
