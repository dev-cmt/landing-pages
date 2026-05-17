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
             <input class="attr_checkbox" type="radio"
                 name="attribute_choice[{{ $product_attribute->sku }}][{{ $attrTitle }}]"
                 id="attribute_choice_{{ $product_attribute->sku }}{{ $attrKey }}{{ $optKey }}"
                 value="{{ $item->attribute_item_name }}"
                 {{ strtolower($selectedValue) == strtolower($item->attribute_item_name) ? 'checked' : '' }} required>
             <label class="mb-0 small"
                 for="attribute_choice_{{ $product_attribute->sku }}{{ $attrKey }}{{ $optKey }}">
                 {{ ucfirst($item->attribute_item_name) }}
             </label>
         @endforeach
         <br>
     @endforeach
 @endif
