<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> -->
                <style>
                    /* cyrillic-ext */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXV3I6Li01BKofIOOaBXso.woff2) format('woff2');
        unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXV3I6Li01BKofIMeaBXso.woff2) format('woff2');
        unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* vietnamese */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXV3I6Li01BKofIOuaBXso.woff2) format('woff2');
        unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXV3I6Li01BKofIO-aBXso.woff2) format('woff2');
        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXV3I6Li01BKofINeaB.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 600;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofA6sKUbOvISTs.woff2) format('woff2');
        unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 600;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofA6sKUZevISTs.woff2) format('woff2');
        unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* vietnamese */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 600;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofA6sKUbuvISTs.woff2) format('woff2');
        unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 600;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofA6sKUb-vISTs.woff2) format('woff2');
        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 600;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofA6sKUYevI.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* cyrillic-ext */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAjsOUbOvISTs.woff2) format('woff2');
        unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }
        /* cyrillic */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAjsOUZevISTs.woff2) format('woff2');
        unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* vietnamese */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAjsOUbuvISTs.woff2) format('woff2');
        unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAjsOUb-vISTs.woff2) format('woff2');
        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: url(https://fonts.gstatic.com/s/nunito/v16/XRXW3I6Li01BKofAjsOUYevI.woff2) format('woff2');
        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        
            body {
                font-family: 'Nunito', sans-serif;
            }
            #reporttable {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                font-size: 14px;
                width: 100%;
            }
            #reporttable td, #reporttable th {
                border: 1px solid #ddd;
                padding: 8px;
                box-sizing: border-box;
            }
            #reporttable tr:nth-child(even){
                background-color: #f2f2f2;
            }
            #reporttable th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #181818;
                color: white;
            }
        </style>
    </head>
    <body class="antialiased">
        <div style="margin: 50px;">
            <small><span style="color: red;">[ Confidential Report ]</span> <span  style="color: #001529;"><b>Generated at </b>2021/08/10</span></small>
            <div>
                <div style="background: #001529; height: 50px; border-radius: 10px; z-index: 100;"></div>
                <h4 style="color: #bee0ff; line-height: 0px; z-index: 100; margin: -20px 0px 0px 80px;">System C19 Vaccination System for COVID-19</h4>
                <!-- <img src="{{url('/images/c19.png')}}" alt="Image" style="width: 40px; height: 40px; margin: -25px 0px 0px 10px;"/> -->
                <!-- <img src="https://cdn.logo.com/hotlink-ok/logo-social-sq.png"src="{{url('/images/c19.png')}}" alt="Image" style="width: 40px; height: 40px; margin: -25px 0px 0px 10px; z-index: 500;"/> -->
                <img src="https://i.ibb.co/HGpNJxm/c19.png"src="{{url('/images/c19.png')}}" alt="Image" style="width: 40px; height: 40px; margin: -25px 0px 0px 10px; z-index: 500;"/>

            </div> 
            <h2 style="color: #001529; line-height: 1px; margin-top: 50px;">Vaccines' Report</h2>
            <p style="text-align: justify; font-size: 12px; color:#495b6e;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex adipisci deserunt cum tenetur nam ullam, totam placeat perferendis. Et, ab neque sapiente vel sit tenetur facilis iure asperiores debitis, non velit nostrum repellat totam quasi harum eligendi praesentium laborum earum. Voluptatibus sint quos dolores, numquam quis necessitatibus obcaecati a at.
            </p>
            <h3 style="line-height: 1px; margin-top: 40px;">Registered Vaccines</h3>
<!-- Tabel 1 -->
<table id="reporttable" style="margin-top: 10px;">
    <tr>
        <th>Stock-No</th>
        <th>Vaccine Name</th>
        <th>Country</th>
        <th>Agent</th>
        <th>Quantity</th>
        <th>Arrival Date</th>
        <th>MFD</th>
        <th>EXP</th>
      
        
        
        
    </tr>

    @foreach ($vaccine as $vac)
    <tr>
        <td>{{ $vac-> stockno}}</td>
        <td>{{ $vac-> name}}</td>
        <td>{{ $vac-> country}}</td>
        <td>{{ $vac-> agent}}</td>
        <td>{{ $vac-> quantity}}</td>
        <td>{{ $vac-> arr_date}}</td>
        <td>{{ $vac-> mfd}}</td>
        <td>{{ $vac-> exp}}</td>
      
    
   
    </tr>
    @endforeach
</table>


             <!-- Vacccine Arrivals --------------------------------------------->
             <h3 style="line-height: 1px; margin-top: 40px;">Vaccine Arrivals</h3>

             <!-- Table  -->
             <table id="reporttable" style="margin-top: 10px;">
                 <tr>
                     <th>Arrival Date</th>
                     <th>Amount of Vaccine Stocks</th>
                 </tr>
                 @foreach ($vaccine_by_arrDate as $key => $vaccine)
                 <tr>
                     <td>{{$key}}</td>
                     <td>{{count($vaccine)}}</td>
                 </tr>
                 @endforeach
             </table>


            <!-- Vacccine Arrivals --------------------------------------------->
            <h3 style="line-height: 1px; margin-top: 40px;">Vaccine Stocks</h3>

             <!-- Tabel -->
            <table id="reporttable" style="margin-top: 10px;">
                <tr>
                    <th>Description</th>
                    <th>Number of Vaccine Stocks</th>
                </tr>

                
                <tr><td colspan="2"><b>Registered Vaccines by stock range</b></td></tr>
                @foreach ($vaccine_by_smallquantity as $cp)
                <tr>
                    <td>Small Vaccines Stocks (00-30000 vaccines)</td>
                    <td>{{$cp->cnt}}</td>
                </tr>
                @endforeach

                @foreach ($vaccine_by_mediumquantity as $cp)
                <tr>
                    <td>Average Vaccines Stocks (30000-100000 Vaccines)</td>
                    <td>{{$cp->cnt}}</td>
                </tr>
                @endforeach
                
                @foreach ($vaccine_by_largequantity as $cp)
                <tr>
                    <td>Large Vaccines Stocks (greater than 100000)</td>
                    <td>{{$cp->cnt}}</td>
                </tr>
                @endforeach
                
            </table>




            


            <p style="text-align: justify; font-size: 12px; color:#495b6e; margin-top: 50px;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex adipisci deserunt cum tenetur nam ullam, totam placeat perferendis. Et, ab neque sapiente vel sit tenetur facilis iure asperiores debitis, non velit nostrum repellat totam quasi harum eligendi praesentium laborum earum. Voluptatibus sint quos dolores, numquam quis necessitatibus obcaecati a at.
            </p>
            <p style="margin-top: 80px;">Authorized Signature</p>
            <div style="background: #001529; height: 10px;"></div>

        </div>
    </body>
</html>