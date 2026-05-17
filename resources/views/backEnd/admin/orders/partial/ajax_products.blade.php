<tr>
    <input type="hidden" name="product_id[]" id="product_id" class="product_id" value="{{ $data->id }}">
    <input type="hidden" name="product_sku[]" id="product_sku" class="product_sku" value="{{ $data->sku }}">


    <td class="text-left sku">
        <span> {{ $data->sku }}</span>
        @if ($data->stock > 0)
            <br>
            <small class="text-success stock_in">Stock In </small>
        @else
            <br>
            <small class="text-danger stock_out">Stock Out </small>
        @endif
    </td>
    <td class="text-left">
        {{ Str::limit($data->name, 45) }}

    </td>
    <td>
        <input style="width: 60px;border: 1px solid #ddd;" min="1" type="number"
            class="form-control qty auto-select-number" name="qty[]" id="qty2" value="1">
        <input type="hidden" name="price[]" id="price" class="price"
            value="{{ $data->sale_price > 0 ? number_format($data->sale_price, 2) : number_format($data->price, 2) }}">
        <input type="hidden" name="total_price[]" class="total_price"
            value="{{ $data->sale_price > 0 ? number_format($data->sale_price, 2) : number_format($data->price, 2) }}">
    </td>
    <td class="total_price_display">
        {{ $data->sale_price > 0 ? number_format($data->sale_price, 2) : number_format($data->price, 2) }}

    </td>
    <td><i class="fa fa-trash remove_btn text-danger" style="cursor: pointer"></i></td>
</tr>

<script>
    $('.remove_btn').on('click', function() {
        $(this).closest("tr").remove();
        finalCalc();
    });
</script>
