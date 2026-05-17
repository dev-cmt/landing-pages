 @if (count($existing_attributes) > 0)
 @foreach ($existing_attributes as $attribute_id => $attributes)
 {{-- @dd($attributes) --}}
         <div class="col-md-4">
             <h5 class="text-capitalize">
                 {{ DB::table('attributes')->where('id', $attribute_id)->value('title') }}
             </h5>
             @foreach ($attributes as $key2 => $attribute)
                 {{-- @dd($key2,$attribute) --}}
                 <div class="form-group">
                     <label for="attribute_images{{ $attribute_id }}_{{ $key2 }}"
                         class="form-label">{{ $attribute['item_title'] }}</label>
                     <br>
                     @if (isset($attribute['image']))
                         <img class="mb-2" src="{{ asset($attribute['image']) }}" height="50" width="50"
                             alt="">
                     @endif
                     <input type="hidden" name="attribute_images_old[{{ $attribute_id }}][{{ $key2 }}]"
                         value="{{ $attribute['image'] ?? '' }}">
                     <input type="file" class="form-control"
                         id="attribute_images{{ $attribute_id }}_{{ $key2 }}"
                         name="attribute_images[{{ $attribute_id }}][{{ $key2 }}]">
                 </div>
             @endforeach
         </div>
     @endforeach
 @endif
