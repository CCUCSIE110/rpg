$(document).ready(function(){
  $('input[type=radio][name=in]').change(function(e){
    fetch('status.php',
    {   method: 'post',
        body: JSON.stringify({
          status: this.value=="in"?1:0
        })
    }).then((res)=>{
      console.log("sucess submit status");
    })
  });


$('.submit').on("click",()=>{
  console.log($("#score").val()?$("#score").val():0);
  fetch('backstage.php',
  {   method: 'post',
      body: JSON.stringify({
        stage: $("#level").find(":selected").val(),
        score: $("#score").val()?$("#score").val():0,
        id: $("#group").find(":selected").val(),
      })
  })
  .then(res){
    console.log("aa");
    $("#score").val("");
  }
})

});
