<!DOCTYPE html>
<html>
<body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <input type='file' id="imgInp" />
  <img id="blah" src="" alt="your image" />



<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}


$("#imgInp").change(function() {
  readURL(this);
});

</script>
</body>
</html>
