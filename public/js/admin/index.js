let password = document.getElementById("password");
let show = document.getElementById("see");

show.addEventListener("click", ()=>{
    if(password.type === "password"){
        password.type = "text";
        show.textContent="see";
    }else{
        password.type="password";
        show.textContent="see";
    }
})
