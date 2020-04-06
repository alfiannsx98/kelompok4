function check(){
    var cb1 = document.getElementById("p1");
    var cb2 = document.getElementById("p2");
    var cb3 = document.getElementById("p3");

    if(cb1.checked == true){
        cb1.checked == false;
        cb2.checked == false;
    }else if(cb2.checked == true){
        cb1.checked == false;
        cb3.checked == false;
    }else if(cb3.checked == true){
        cb1.checked == false;
        cb2.checked == false;
    }
}