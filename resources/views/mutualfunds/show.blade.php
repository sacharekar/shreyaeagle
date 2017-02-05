@extends('app')
@section('content')
    <h1>MutualFund </h1>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Mutual Fund Beneficiary</td>
                <td><?php echo ($mutualfund['beneficiary']); ?></td>
            </tr>
            <tr>
                <td>Type of Fund</td>
                <td><?php echo ($mutualfund['type_of_fund']); ?></td>
            </tr>
            <tr>
                <td>Number of Shares</td>
                <td><?php echo ($mutualfund['number_of_funds']); ?></td>
            </tr>
            <tr>
                <td>Purchase Price </td>
                <td><?php echo ($mutualfund['purchase_price']); ?></td>
            </tr>
            <tr>
                <td>Purchase Date</td>
                <td><?php echo ($mutualfund['purchased_date']); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
@stop
