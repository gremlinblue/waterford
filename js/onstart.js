function set_menu_active(text){
  $(".sf-menu li a:contains("+text+")").parent().addClass("current");
}

function remove_content_divider()
  $(".vr-border-1").attr("style","background:none");
