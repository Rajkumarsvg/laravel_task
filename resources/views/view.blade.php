<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    @vite(['resources/css/app.css' ])

    <title>Form</title>
     <style>
        table{ 
            width:70%;
            margin: auto;
            text-align:left !important;
            font-size:20px;
        }
        
        .table-container{
            display: flex;
            align-items:center;
        }
        .image-label{
            padding:20px 0px;
        }
        img{
            margin: 5px;
        }
        .upload__img-wrap{
            display: flex;
            flex-wrap: wrap;
        }
        th{
            width: 70px;
            text-align:left !important;
        }
        h2{
            text-align:center !important;
            width: 100%;
        }
        a{
            float: right;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            text:white;
            padding: 10px;
            border-radius:5px;
            text-decoration: none;
        }
     </style>
 
</head>
<body>
     <?php 
     if($user_detail['type'] != 'download'){?> 
           <a href="/download/<?=$user_detail['id']?>" > Download</a>
      <?php }?>
    <div class="row m-0 py-5 ">
    <h2 class="text-center py-3">Report</h2>

        <div class=" table-container">
        
        <table class="table">
            
            <tr>
                <th>Name </th> <td>:   {{$user_detail['name']}}   </td>
           </tr>
                <th>Email</th> <td>:   {{$user_detail['email_id']}}   </td>
            <tr>
                <th>Mobile</th> <td>:   {{$user_detail['mobile_no']}}   </td>
           </tr>
                <th>Description</th> <td>:   {{$user_detail['description']}}   </td>
            
            <tr>
                 <td  colspan="2"> 
                    <div class="image-label"><b>Images</b></div>
                    <div class="upload__img-wrap"> 
                    @foreach( $user_detail['image']  as $image) 
                    <img src="data:image/png;base64,<?= base64_encode(file_get_contents(public_path('storage/images/'.$image))) ?>" width="250">
                            <!-- <img src="{{asset('/storage/images/')}}/{{$image}}" alt="" width="250"> -->
                     @endforeach
                     </div>

                </td>
            </tr> 
        </table>
      
    </div>
     
</body>
</html>
