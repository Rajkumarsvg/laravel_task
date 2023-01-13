<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Form</title>
</head>
<body>
    
   
    <div class="row m-0 py-5 ">
        <div class="col-7 mx-auto">
        
        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#form_modal"><span
                    class="glyphicon glyphicon-plus"></span> Add</button>
        <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
         </thead>
         <tbody>
        @foreach($user_detail as $list)
            <tr>
                <td>   {{$list['name']}}   </td>
                <td>   {{$list['email_id']}}   </td>
                <td>   {{$list['mobile_no']}}   </td>
                <td>   {{$list['description']}}   </td>
                <td>   <a href="/{{$list['id']}}">View</a>  </td>
            </tr>
        @endforeach
        </tbody>
        </table>
        
    </div>
     

    
    <div class="modal fade" id="form_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="">
                    <div class="modal-header">
                        <h3 class="modal-title">Add User</h3>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <div class="form-group">
                            @csrf
                                <label for=""> Name</label>
                                <input type="text" name="name" id="name" class="form-control mb-3"> 
                                <span class="text-danger"> </span>
                            </div>
                            <div class="form-group">
                                <label for=""> Email</label>
                                <input type="text" name="email" id="email" class="form-control  mb-3">
                                <span class="text-danger"> </span>

                            </div>
                            <div class="form-group">
                                <label for=""> Mobile</label>
                                <input type="text" name="mobile" id="mobile" class="form-control  mb-3">
                                <span class="text-danger"> </span>

                            </div>
                            <div class="form-group">
                               <label for=""> Description</label>
                                <textarea name="description" id="description" class="form-control  mb-3"></textarea>
                                <span class="text-danger"> </span>

                            </div>
                            <div class="form-group">
                                <div class="upload__box">
                                <div class="upload__btn-box">
                                    <label class="upload__btn">
                                    <p>Upload images</p>
                                    <input type="file" name="image[]" multiple="" data-max_length="20" id="image" class="upload__inputfile">
                                    </label>
                                </div>
                                <span class="image-err text-danger"> </span>
                                <div class="upload__img-wrap"></div>
                                </div> 


                            </div>
                        </div>
                        <br style="clear:both;" />
                        <div class="modal-footer">
                            <button type="submit" value="submit" id="submit" data-dismiss="modal" class="btn btn-danger" id="close"><span
                                    class="glyphicon glyphicon-remove"></span> Close</button>
                            <button class="btn btn-primary" name="save" id="save">
                                save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
@vite(['resources/css/app.css', 'resources/js/app.js']);