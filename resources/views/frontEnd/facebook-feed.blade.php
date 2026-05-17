<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<rss xmlns:g="http://base.google.com/ns/1.0" version="2.0">
    <channel>
        <title>{{ env('APP_NAME') }}</title>
        <link>{{ url('/') }}</link>
        <description>All Products from {{ env('APP_NAME') }}</description>
        @if(count($products) > 0)
            @foreach($products as $product)
                <item>
                    <g:id>{{ $product->id }}</g:id>
                    <g:title><![CDATA[{{ $product->name }}]]></g:title>
                    <g:description><![CDATA[{{ strip_tags($product->fb_description ?? $product->description) }}]]></g:description>
                    <g:link>{{ route('single.product', [$product->slug, $product->id]) }}</g:link>
                    <g:image_link>{{ $product->get_image ? asset($product->get_image->file_url) : "" }}</g:image_link>
                    <g:brand>{{ $product->brand_name ?? env('APP_NAME') }}</g:brand>
                    <g:condition>new</g:condition>
                    @if($product->get_category)
                        <g:product_type><![CDATA[{{ $product->get_category->category_name }}]]></g:product_type>
                        <g:google_product_category><![CDATA[{{ $product->get_category->category_name }}]]></g:google_product_category>
                    @endif
                    <g:availability>{{ $product->stock > 0 ? 'in stock' : 'out of stock' }}</g:availability>
                    @if($product->sale_price > 0 && $product->sale_price < $product->price)
                        <g:price>{{ $product->price }} BDT</g:price>
                        <g:sale_price>{{ $product->sale_price }} BDT</g:sale_price>
                    @else
                        <g:price>{{ $product->price }} BDT</g:price>
                    @endif
                </item>
            @endforeach
        @endif
    </channel>
</rss>
