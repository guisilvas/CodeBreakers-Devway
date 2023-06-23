var inputElement1 = document.getElementById("inputbloq1");
        inputElement1.disabled = true;

        var menu1 = document.getElementById("menu1");
        var menu2 = document.getElementById("menu2");
        var toggle = false;

        

        function abrirmenu() {
        if (toggle) {
            menu1.style.transition = "width 1s ease";
            menu2.style.transition = "opacity 0.5s cubic-bezier(1, 0, 1, 0)";
            menu1.style.transitionDelay = "1s";
            menu2.style.transitionDelay = "0s";
            menu1.style.width = "0vw";
            menu2.style.opacity = "0";
        } else {
            menu1.style.transition = "width 1s ease";
            menu2.style.transition = "opacity 0.5s cubic-bezier(1, 0, 1, 0)";
            menu1.style.transitionDelay = "0s";
            menu2.style.transitionDelay = "1s";
            menu2.style.opacity = "1";
            if (window.innerWidth <= 425) {
                menu1.style.width = "100vw";
            } else {
                menu1.style.width = "25vw";
            }
               
        }
        

        toggle = !toggle;
    }