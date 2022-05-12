
    function current(){
                var input = document.getElementById("currentpwd");
                var hide = document.getElementById("hide1");
                var show = document.getElementById("hide2");

                if(input.type === 'password'){
                input.type = "text";
                hide.style.display = "block";
                show.style.display = "none";
                }
                else{
                input.type = "password";
                hide.style.display = "none";
                show.style.display = "block";
                }
            }
    
            
    function newpass(){
        var input = document.getElementById("newpwd");
        var hide = document.getElementById("hide3");
        var show = document.getElementById("hide4");

        if(input.type === 'password'){
        input.type = "text";
        hide.style.display = "block";
        show.style.display = "none";
        }
        else{
        input.type = "password";
        hide.style.display = "none";
        show.style.display = "block";
        }
    }

    
    function repeat(){
        var input = document.getElementById("repeatpwd");
        var hide = document.getElementById("hide5");
        var show = document.getElementById("hide6");

        if(input.type === 'password'){
        input.type = "text";
        hide.style.display = "block";
        show.style.display = "none";
        }
        else{
        input.type = "password";
        hide.style.display = "none";
        show.style.display = "block";
        }
    }