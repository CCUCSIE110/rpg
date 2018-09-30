$(document).ready(function(){
  $.getJSON('index.php').then((res) => {
    console.log("A");
    console.log(res);
    show_stage(res);
  })
});
setInterval(()=>{
  $.ajax({
    url: "index.php",
    method: "GET",
    data: "json",
    success: (data)=>{
      console.log(data);
      show_stage(data);
    },
    error: (xhr,ajaxOption,thrownError)=>{
      console.log("Fail to fetch data of index");
      // console.log(xhr);
      console.log(thrownError);
    },
    complete: ()=>{
      console.log('complete to fetch data of index');
    }
  })
}, 15000)
// 15000
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
            <i class="fas fa-child fa-lg fa-fw ${o.status>0?"":"hidden"}"></i>
            <div class="name">${o.stage_name}</div>
          </div>
          `
        })
        $(".stage").append(html);
        $(".opt").hide(0,()=>{
          $(".opt").fadeIn();
        });
      })

}
