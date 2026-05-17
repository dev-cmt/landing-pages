 @if (count($colorImages) > 0)
     @foreach ($colorImages as $key => $attribute)
         <div class="col-md-4">
             <h5 class="text-capitalize">
                 {{ DB::table('attributes')->where('id', $key)->value('title') }}
             </h5>
             @foreach ($attribute as $value)
                 <div class="form-group">
                     <label for="attribute_images{{ $value }}"
                         class="form-label">{{ DB::table('attribute_items')->where('id', $value)->value('item_title') }}</label>
                     <input type="file" class="form-control" id="attribute_images{{ $value }}"
                         name="attribute_images[{{ $key }}][{{ $value }}]">
                 </div>
             @endforeach
         </div>
     @endforeach
 @endif
