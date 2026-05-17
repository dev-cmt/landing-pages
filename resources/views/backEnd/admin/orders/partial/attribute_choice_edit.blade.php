<div>
    {{ Str::limit($data->name, 45) }}
    @if ($data)
        <br>
        @php($k = 0)
        @php($l = 1)
        @php($i = 0)
        @if (count($data->get_choice_attributes) > 0)
            @foreach ($data->get_choice_attributes as $key => $attribute)
                <small class="mb-3"
                    style="color: #7e7777; font-weight:bold;">{{ ucfirst($attribute->get_attribute->title) }}</small>
                <br>
                <div class="d-flex flex-wrap gap-2 align-items-center" style="gap: 10px;">
                    @foreach ($attribute->get_choice_attribute_items as $key2 => $item)
                        <div class="form-check me-1 ">
                            <input class="form-check-input form-checked-outline attribute" type="radio"
                                name="variant[{{ $data->id }}][{{ $attribute->get_attribute->id }}]"
                                id="attribute_{{ $data->id }}_{{ strtolower($item->attribute_item_name) . '_' . $key2 }}"
                                value="{{ strtolower($item->attribute_item_name) }}" @if ($loop->first) checked @endif>

                            <label class="form-check-label"
                                for="attribute_{{ $data->id }}_{{ strtolower($item->attribute_item_name) . '_' . $key2 }}">
                                {{ ucfirst($item->attribute_item_name) }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    @endif
</div>
