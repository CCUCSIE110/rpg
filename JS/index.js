$(document).ready(function(){
  $.getJSON("index.json").then((res)=>{
    console.log("A");
    console.log(res.data);
    show_stage(res.data);
  })
});
setInterval(()=>{
  fetch("./index.json").then((response)=>{
    return response.json();
  }).then((j)=>{
    show_stage(j.data);
  })
},15000)
function show_stage(data) {
  var promise = Promise.resolve();
  promise
      .then(()=>{
        $(".opt").fadeOut(0,()=>{
          $(".opt").remove();
        })
      }).then(()=>{
        let html = '';
        data.forEach((o)=>{
          html +=`
          <div class="opt">
            <div class="in ${o.in>0?"round_red":""}"></div>
            <div class="name">${o.name}</div>
          </div>
          `
        })
        $(".stage").append(html);
        $(".opt").hide(0,()=>{
          $(".opt").fadeIn();
        });
      })

}
