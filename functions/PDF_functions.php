<?php

function buildPDF($clientName, $order)
{

    // Calculem el total
    $orderTotal = 0;

    foreach ($order['cart'] as $product) {

        $subtotal = $product['price'] * $product['qty'];

        $orderTotal = $orderTotal + $subtotal;
    }


    // Creem l'HTML de la factura
    $html = '<h1>Invoice</h1>

            <p>
                <strong>Purchase date:</strong>
                ' . $order['date'] . '
            </p>

            <p>
                <strong>Customer:</strong>
                ' . $clientName . '
            </p>

            <hr>

            <table width="100%" border="1" cellspacing="0" cellpadding="8">

                <thead>

                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>

                </thead>

                <tbody>
';


    foreach ($order['cart'] as $product) {

        $subtotal = $product['price'] * $product['qty'];

        $html .= '

        <tr>

            <td>
                ' . $product['name'] . '
            </td>

            <td>
                ' . number_format($product['price'], 2) . ' €
            </td>

            <td>
                ' . $product['qty'] . '
            </td>

            <td>
                ' . number_format($subtotal, 2) . ' €
            </td>

        </tr> ';
    }


    $html .= '
            </tbody>
                </table>

            <h2 style="text-align:right;">
                Total:
                ' . number_format($orderTotal, 2) . ' €
            </h2>';


    return $html;
}
