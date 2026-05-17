<tr>
    <input type="hidden" name="product_id[]" id="product_id" class="product_id" value="{{$data->id}}">

    <td class="text-left">{{$data->sku}}</td>
    <td class="text-left">
        {{Str::limit($data->name,45)}}
        @if($data->has_variant ==1)
            <br>
            @php($k=0)
            @php($l=1)
            @foreach($data->get_choice_attributes() as $key => $item)
                @if($k!=0)
                    <br>
                @endif
                <small><b>{{$item['attribute_name']}}: </b></small>
                @if($l!=0)
                    <br>
                @endif
                @php($p=0)
                @foreach($item['values'] as $key1 => $value)
                    <input type="radio" name="attribute_choice[{{$data->id}}][{{$key}}]" class="attr_checkbox"
                           {{$p==0?'checked':""}} id="attribute_choice_{{$data->id}}{{$key}}{{$key1}}" value="{{$value}}" required>
                    <label class="mb-0 small" for="attribute_choice_{{$data->id}}{{$key}}{{$key1}}">{{$value}}</label>
                    @php($p++)
                @endforeach
                @php($k++)
                @php($l++)
            @endforeach
        @endif
    </td>
    <td>
        <input style="width: 60px;border: 1px solid #ddd;" min="1" type="number" class="form-control qty" name="qty[]" id="qty2" value="1">
        <input type="hidden" name="price[]" id="price" class="price"
               value="{{$data->has_variant == 1 ? $attributes->price: ($data->sale_price>0?$data->sale_price: $data->price)}}">
    </td>
    <td class="total_price">{{$data->has_variant == 1 ? $attributes->price: ($data->sale_price>0?$data->sale_price: $data->price)}}</td>
    <td><i class="fa fa-trash remove_btn text-danger" style="cursor: pointer"></i></td>
</tr>

<script>

</script>
