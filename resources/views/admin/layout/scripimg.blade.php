<script>
var file_img=document.getElementById('#file_img');
var img=document.getElementById('#img');

file_img.addEventListener('change',function(e){
    e.preventDefault();
    img.src=URL.createObjectURL(this.files[0])
})
</script>