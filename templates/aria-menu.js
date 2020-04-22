//cited from Lab7
$(document).ready(function(){
  //varibles
   let menuButton = $('.menu_aria>a');
   let mainMenu = $('#main-menu');
   let focused;//currently focused item


//expanded menu
   mainMenu.on({
    keydown: function(event){
      event.preventDefault();
      if(event.keyCode == 27){
        focused.blur();
        menuButton.attr("aria-expanded",false);
        mainMenu.css("display", "none");
      }

      if(menuButton.attr("aria-expanded") == "true" && event.keyCode ==40  )
      {
        if(focused.html()!= "Home"){
          
          focused.parent().next().find('a').focus();
          focused = focused.parent().next().find('a');
        }else{
          mainMenu.find("a:first").focus();
          focused = mainMenu.find("a:first"); 

        }
      }

      if(menuButton.attr("aria-expanded") == "true" && event.keyCode ==38  )
      {
        if(focused.html()!= "Order"){
          focused.parent().prev().find('a').focus();
          focused = focused.parent().prev().find('a');
        }else{
          mainMenu.find("a:last").focus();
          focused = mainMenu.find("a:last"); 

        }
      }
    }
  
  
  
  });

//The button
   menuButton.on({

    click: function(event){
      if(menuButton.attr("aria-expanded") == "true"){
        focused.blur();
        menuButton.attr("aria-expanded",false);
        mainMenu.css("display", "none");
      }else{
      
        menuButton.attr("aria-expanded","true");
        mainMenu.css("display", "block");
        mainMenu.find("a:first").focus();
        focused =mainMenu.find("a:first");   
      }      
    },
    keydown: function(event){
        switch (event.keyCode) {
    
          case 32://space
          case 13://return
            {
              menuButton.attr("aria-expanded","true");
              mainMenu.css("display", "block");
              mainMenu.find("a:first").focus();
              focused = mainMenu.find("a:first");  
            }
            break;
          case 40:
            { 
                menuButton.attr("aria-expanded","true");
                mainMenu.css("display", "block");
                mainMenu.find("a:first").focus();
                focused = mainMenu.find("a:first");  
            }
          default:
            break;
        }

    }

  });

});