$(document).ready(function(){
  $('input[type=radio][name=in]').change(function(e){
  	console.log("ggdayoin");
    fetch('status.php',
    {   method: 'post',
   		headers: {'content-type': 'application/x-www-form-urlencoded'},
        body: this.value=="in"?"status=true":"status=false"
    }).then((res)=>{
      console.log("sucess submit status");
    })
  });


$('.submit').on("click",()=>{
  fetch('backstage.php',
  {   method: 'post',
   	  headers: {'content-type': 'application/x-www-form-urlencoded'},
      body: 'stage=' + $("#level").find(":selected").val() + '&id=' + $("#group").find(":selected").val()
  })
  .then((res)=>{
    console.log("aa");
  })
})

});
