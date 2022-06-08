<!DOCTYPE html>
<html>
<head>
    <title>Bana And Bana Architects</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:1px;
    }
</style>
<body>
<div class="head-title text-center">
    <h1 class="text-center">Rough Estimation
        {{-- <img src="./assets/images/motto.png" class="img-thumbnail"> --}}
    </h1>
</div>
<div class="add-detail mt-10">
    {{-- <div class="w-50 float-left logo mt-10">
        <img src="./assets/images/logo.png" style="height: 5rem; width:15rem;"> 
    </div>
    <div class="w-50 float-right logo mt-10">
        <img src="./assets/images/logo.png" style="height: 5rem; width:15rem;"> 
    </div> --}}
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">From</th>
            <th class="w-50">To</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p>Bana & Bana Architects</p>
                    <p>Unit 903</p>
                    <p>PCS Residences,</p>
                    <p> Calixto Dyco St.</p>
                    <p>Paco Manila</p>
                    <p>Contact : 63 928-719-8975</p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>{{$name}}</p>
                    <p>{{$email}}</p>
                    <p>{{$mobile}}</p>
                    <p>{{$sqm}}</p>
                    <p>{{$type}}</p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Payment Method</th>
            <th class="w-50">Shipping Method</th>
        </tr>
        <tr>
            <td>Cash On Delivery</td>
            <td>Free Shipping - Free Shipping</td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Type</th>
            <th class="w-50">Floor</th>
            <th class="w-50">Wall</th>
            <th class="w-50">Window</th>
            <th class="w-50">Ceiling</th>
        </tr>
        <tr align="center">
            <td>Bare</td>
            <td>Polished Concrete</td>
            <td>Concrete</td>
            <td>Minimal To Standard</td>
            <td>None/Soffit is optional</td>
        </tr>
        <tr>
            <td colspan="5">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Client's House Square/meter:</p>
                        <p>House Plan Cost: </p>
                        <p>Total Payable</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        <p>{{$user->get('sqm')}}</p>
                        <p>P 20,000.00</p>
                        <p>P {{$cost}}</p>
                    </div>
                    <div style="clear: both;"></div>
                </div> 
            </td>
        </tr>
    </table>
    <small><strong>IMPORTANT: PLEASE READ!</strong></small><br>
    <small>-RATES are rules of thumb ONLY and serve as the minimum basis for your building ESTIMATES may vary to your choosen design</small><br>
    <small>-ALWAYS consult with an ARCHITECT to know more about your building according to you unique needs</small><br>
    <small>-A lot of factors may affect the COSTS,i.e. soil state, market influence, labor,etc.</small><br>
    <small>-These data should be useful at the early stages of the design process to know certain limitations and manage expections</small><br>
    <small>-Landscape,pools, fences and other structures or components aside from the main building are EXCLUDED in the said approximate rate and should be computed saperately.</small><br>
    <small>-Lastly, Professional Fees, Transaction and Permit Fees, Taxes and the like are also NOT included in the approximate buiuilding contruction rate.</small><br>
</div>
</html>