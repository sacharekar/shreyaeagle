@extends('app')
@section('content')
    <h1>Stock </h1>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Stock Symbol</td>
                <td><?php echo ($mutualfund['symbol']); ?></td>
            </tr>
            <tr>
                <td>Stock Name</td>
                <td><?php echo ($mutualfund['name']); ?></td>
            </tr>
            <tr>
                <td>Number of Shares</td>
                <td><?php echo ($mutualfund['volume']); ?></td>
            </tr>
            <tr>
                <td>Purchase Price </td>
                <td><?php echo ($mutualfund['purchase_price']); ?></td>
            </tr>
            <tr>
                <td>Date Purchased</td>
                <td><?php echo ($mutualfund['purchased']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop
