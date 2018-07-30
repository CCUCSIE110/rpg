$(document).ready(function(){
  let data;
  $.getJSON("rank.json").then((res)=>{
    data = res.data;
    console.log(data);
    show_rank(data);
  });
  // add the highlight when click the nav button
  let nav_button = $("nav>div");
  nav_button.on("click",(o)=>{
    nav_button.each((o,i)=>{
      $(i).removeClass("nav_highlight");
    })
    $(o.target).addClass("nav_highlight");
  });
  setInterval(()=>{
    fetch("./rank.json").then((response)=>{
      return response.json();
    }).then((j)=>{
      console.log(j.data);
      show_rank(j.data);

    }).catch((err)=>{
      console.log(err);
    })
  },15000);
});
function show_rank(data){

var promise = Promise.resolve();
promise
    .then(()=>{
      $(".opt:gt(0)").fadeOut(0,()=>{
        $(".opt:gt(0)").remove();
      })
    })
    .then(()=>{
      let html = "";
      data.sort((a,b)=>{
        return a.score<b.score;
      }).forEach((o,i)=>{
        html += `
          <div class="opt">
            <div class="rank">${i+1}</div>
            <div class="name">${o.name}</div>
            <div class="score">${o.score}</div>
          </div>`;
      });
      $(".rank_panel").append(html);
      $(".opt:gt(0)").hide(0,()=>{
        console.log("aa");
        $(".opt:gt(0)").fadeIn();
      });
    });
    }
