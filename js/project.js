         //遮罩弹出层
          function shoot(id){
              $("#myModalLabel").text(id);
              switch(id)
             {
              case "投稿须知":
              $(".content").html('显而易见，并不是所有人都对我们的文章持相同态度。欢迎你向我们讲述自己的故事，或者撰文反击原作者的文章。投稿邮箱：hello@whatyouneed.cc 。编辑部承诺将在7日内对投稿进行回复，如未收到任何回复则视为“不采用投稿”，你可将稿件投放到其他平台或杂志。爱你们');
              break;
              case "联系我们":
              $(".content").html('团队邮箱（简历、投稿及商务合作）：hello@whatyouneed.cc<br>推广业务合作微信：WhatYouNeedOffice');
              break;
              case "全家福":
              //String text=$(".content").attr("width");
              //$("#myModalLabel").text(text);
              $(".content").html('<img src="./image/menbers.jpeg" width="100%"alt="全家福" />');
              break;
              default:$(".content").html('团队邮箱（简历、投稿及商务合作）：hello@whatyouneed.cc<br>推广业务合作微信：WhatYouNeedOffice');
              break;
              
              }
                
              $('#myModal').modal({});
              //这行使点击空白处关闭失效$('#myModal').modal({backdrop: 'static', keyboard: false});
          }

          //获取URL
          (function ($) {
              $.getUrlParam = function (name) {
                  var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
                  var r = window.location.search.substr(1).match(reg);
                  if (r != null) return unescape(r[2]); return null;
              }


          })(jQuery);
