 $(document).ready(function(){
    var imgWrap = "";
    var imgArray = [];     
        ImgUpload();
     
      
        function ImgUpload() {
           
          
            $('.upload__inputfile').each(function () {
              $(this).on('change', function (e) {

                imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                var maxLength = $(this).attr('data-max_length');
          
                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function (f, index) {
          
                  if (!f.type.match('image.*')) {
                    return;
                  }
          
                  if (imgArray.length > maxLength) {
                    return false
                  } else {
                    var len = 0;
                    for (var i = 0; i < imgArray.length; i++) {
                      if (imgArray[i] !== undefined) {
                        len++;
                      }
                    }
                    if (len > maxLength) {
                      return false;
                    } else {
                      imgArray.push(f);
          
                      var reader = new FileReader();
                      reader.onload = function (e) {
                        var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")'   data-file='" + f.name + "' class='img-bg'><div  ></div></div></div>";
                        imgWrap.append(html);
                        iterator++;
                      }
                      reader.readAsDataURL(f);
                    }
                  }
                  
                });
              });
            });
          
             
          }



  $('form').on('submit',function(e){
    e.preventDefault();  
    if(validation() != 0){
        return false;
    }
     console.log(new FormData(this));
    $.ajax({
        url: '/',
        method: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false, 


    }).done(function (response) {
        console.log(response); 
        $('form')[0].reset();
        location.reload();
        
    }).fail(function (error) {
      alert('Oops! Something went wrong.');
        console.error(error); 
    })
  });
    
  function validation(){
    var field = ['name','email','mobile','description'];
    var error = 0;
    if(imgArray.length == 0){
      $('.image-err').html('Select image.');
    }else{
      $('.image-err').html('');

    }
    $.each(field,function(key, val){
          if($.trim($('#'+val).val()) == 0){
              $('#'+val).next().html('This field required.');
              error++;
          }else{
              $('#'+val).next().html('');
          }

          if(val == 'email' && $.trim($('#'+val).val()) != 0){
              var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
              if( $.trim($('#'+val).val()).match(pattern) == null){
                  $('#'+val).next().html('Enter valid email');
                  error++;
              }else{
                  $('#'+val).next().html('');

              }
          }
    });
    return error;
}   


 });