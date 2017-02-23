@extends('app')
@section('content')

<?php
setlocale(LC_MONETARY,"en_US");

        ?>
    <h1 style="
    text-align: center;
">Customer </h1>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Name</td>
                <td><?php echo ($customer['name']); ?></td>
            </tr>
            <tr>
                <td>Customer ID</td>
                <td><?php echo ($customer['cust_number']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo ($customer['address']); ?></td>
            </tr>
            <tr>
                <td>City </td>
                <td><?php echo ($customer['city']); ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo ($customer['state']); ?></td>
            </tr>
            <tr>
                <td>Zip </td>
                <td><?php echo ($customer['zip']); ?></td>
            </tr>
            <tr>
                <td>Home Phone</td>
                <td><?php echo ($customer['home_phone']); ?></td>
            </tr>
            <tr>
                <td>Cell Phone</td>
                <td><?php echo ($customer['cell_phone']); ?></td>
            </tr>


            </tbody>
        </table>
    </div>


    <?php
    $stockprice=null;
    $stotal = 0;
    $svalue=0;
    $itotal = 0;
    $ivalue=0;
    $iportfolio = 0;
    $cportfolio = 0;
    $importfolio = 0;
    $cmportfolio = 0;
    $price =0;
    $mutualPortfolioValue=0;
    $investmentiportfolio = 0;
    $investmentcportfolio = 0;

    ?>
    <br>
    <h2 style="
    text-align: center;
">Stocks </h2>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th> Symbol </th>
                <th>Stock Name</th>
                <th>No. of Shares</th>
                <th>Purchase Price</th>
                <th>Purchase Date</th>
                <th>Original Value</th>
                <th>Current Price</th>
                <th>Current Value</th>
            </tr>
            </thead>

            <tbody>




            <?php


            function service($symbol)
                        {
                            global $price;

                            $URL = "http://www.google.com/finance/info?q=NSE:" . $symbol;
                            $file = fopen("$URL", "r");
                            $r = "";
                            do {
                                $data = fread($file, 500);
                                $r .= $data;
                            } while (strlen($data) != 0);
                            //Remove CR's from ouput - make it one line
                            $json = str_replace("\n", "", $r);

                            //Remove //, [ and ] to build qualified string
                            $data = substr($json, 4, strlen($json) - 5);


                            $json_output = json_decode($data, true);

                            $price = "\n" . $json_output['l'];
                            return $price;

                        }

            ?>


            @foreach($customer->stocks as $stock)
                <tr>
                    <td>{{ $stock->symbol }}</td>
                    <td>{{ $stock->name }}</td>
                    <td>{{ $stock->shares}}</td>
                    <td>{{ $stock->purchase_price}}</td>
                    <td>{{ $stock->purchased}}</td>
                    <?php
                     $stockPortfolioValue= $stock->shares*$stock->purchase_price;
                    $iportfolio+=$stockPortfolioValue;
                            ?>
                    <td>{{ $stockPortfolioValue}}</td>
                    <?php  $price=service($stock->symbol);?>

                    <td>{{$price}} </td>

                    <?php
                    $stockPortfolioValue= $price*$stock->shares;
                    $cportfolio+=$stockPortfolioValue;
                    ?>
                    <td>{{$stockPortfolioValue}}</td>

                </tr>

            @endforeach

            </tbody>
        </table>

<p> Total of Initial Stock  Portfolio  <?php  echo number_format( $iportfolio,2)  ?></p>

        <p> Total of  Current Stock  Portfolio    <?php  echo number_format( $cportfolio,2) ?></p>
</div>
        <br>

        <h2 style="
    text-align: center;
">Investments </h2>
        <div class="container">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr class="bg-info">
                    <th>Category </th>
                    <th>Description</th>
                    <th> Acquired Value</th>
                    <th> Acquired Date</th>
                    <th>Recent Value</th>
                    <th>Recent Date</th>

                </tr>
                </thead>

                <tbody>
                @foreach($customer->investments as $investment)
                    <tr>
                        <td>{{ $investment->category }}</td>
                        <td>{{ $investment->description }}</td>
                        <td>{{ $investment->acquired_value}}</td>
                        <td>{{ $investment->acquired_date}}
                        <td>{{ $investment->recent_value}}</td>
                        <td>{{ $investment->recent_date}}</td>

                        <?php

                        $investmentiportfolio+=$investment->acquired_value;
                        ?>


                        <?php

                        $investmentcportfolio+=$investment->recent_value;
                        ?>


                    </tr>

                @endforeach

                </tbody>
            </table>

            <p> Total of Initial Investment Portfolio  <?php echo number_format( $investmentiportfolio,2) ?></p>

            <p> Total of  Current Investment Portfolio    <?php  echo number_format($investmentcportfolio,2) ?></p>

        </div>
    <br>


            <h2 style="
    text-align: center;
">MutualFunds</h2>
            <div class="container">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr class="bg-info">
                        <th> Symbol </th>
                        <th>Mutual Fund Name</th>
                        <th>Volume</th>
                        <th>Purchase Price</th>
                        <th>Purchase Date</th>
                        <th>Original Value</th>
                        <th>Current Price</th>
                        <th>Current Value</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($customer->mutualfunds as $mutualfund)
                        <tr>
                            <td>{{ $mutualfund->symbol }}</td>
                            <td>{{ $mutualfund->name }}</td>
                            <td>{{ $mutualfund->volume}}</td>
                            <td>{{ $mutualfund->purchase_price}}</td>
                            <td>{{ $mutualfund->purchased}}</td>
                            <?php
                            $muPortfolioValue= $mutualfund->volume*$mutualfund->purchase_price;
                            $importfolio+=$muPortfolioValue;
                            ?>

                            <td>{{ $muPortfolioValue}}</td>
                            <?php  $price=service($mutualfund->symbol);?>

                            <td>{{$price}} </td>

                            <?php
                            $muPortfolioValue= $price*$mutualfund->volume;
                            $cmportfolio+=$muPortfolioValue;
                            ?>
                            <td>{{ $muPortfolioValue}}</td>

                        </tr>

                    @endforeach

                    </tbody>
                </table>

                <p> Total of Initial MutualFund Portfolio  <?php echo number_format( $importfolio,2)?></p>

                <p> Total of  Current MutualFund  Portfolio    <?php echo number_format( $cmportfolio,2) ?></p>
            </div>
            <br>



            <h2>Summary of Portfolio  </h2>
            <p> Total of Initial Portfolio value  <?php echo number_format($investmentiportfolio +$iportfolio +$importfolio,2) ?></p>
            <p> Total of  Current Investment Portfolio    <?php echo number_format($investmentcportfolio+$cportfolio+ $cmportfolio,2) ?></p>



    </div>

@stop
