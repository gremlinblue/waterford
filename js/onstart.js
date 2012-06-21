function set_menu_active(text){
  $(".sf-menu li a:contains("+text+")").parent().addClass("current");
}

function remove_content_divider(){
  $(".vr-border-1").attr("style", "background:none");
}

function hide_lightbox(container){
  container.attr("style", "display:none");
  $("#fade").attr("style", "display:none");
}
  
function show_lightbox(container){
  container.attr("style", "display:block");
  $("#fade").attr("style", "display:block");
}

function replace_content(container, url){
  container.children('div:first').load(url);
}

function show_replace_content(container, url){
  replace_content(container, url);
  show_lightbox(container);  
}