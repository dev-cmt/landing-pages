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
                 <label class="mb-0 small" style="cursor: pointer;display: flex;align-items: center;gap: 3px"
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
