$(document).ready(function(){
  console.log("er");
  $("#clear").on("click",(o)=>{
    console.log("ww");
    $("#passwd").val("");
    $("#name").val("");
  })
});
