<table>
    <thead>
    <tr>
        <th>DATE</th>
        <th>INV.</th>
        <th>NAME</th>
        <th>ADDRESS</th>
        <th>PHN. NUMBER</th>
        <th>SALE PRICE</th>
        <th>COURIER CHARGE</th>
        <th>PRODUCT COST</th>
        <th>MARGIN</th>
        <th>D. STATUS</th>
        <th>RETURN STATUS</th>
        <th>ORDER NOTE</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $item)
        <?php
        $total_delivery_charge = 0;
        $total_purchase_cost = 0;
        if (count($item->get_products) > 0) {
            foreach ($item->get_products as $key => $product) {
                $total_delivery_charge += $product->get_product->delivery_charge;
                $total_purchase_cost += $product->get_product->purchase_cost * $product->qty;
            }
        }
        ?>
        <tr>
            <td>{{ date('d-m-Y', strtotime($item->order_date)) }}</td>
            <td>{{ $item->invoice_id }}</td>
            <td>{{ $item->customer_name }}</td>
            <td>{{ $item->customer_address }}</td>
            <td>{{ $item->customer_phone }}</td>
            <td>{{ $item->total }}</td>
            <td>{{$total_delivery_charge??0}}</td>
            <td>{{$total_purchase_cost??0}}</td>
            <td>
                {{ $item->total - ($total_delivery_charge+$total_purchase_cost) }}
            </td>
            <td></td>
            <td></td>
            <td>{{$item->order_note}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
