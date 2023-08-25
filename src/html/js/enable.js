const xmlhttp = new XMLHttpRequest();
let counter = 0;

    function clickCounter(){
        counter += 1;
        console.log(counter);

        if(counter == 2){
            console.log("VIP DISABLED");
        }
        else if (counter == 1){
            console.log("VIP ENABLED");
        }
    }


    function falsevipenabled(){
        xmlhttp.onload = function() {
            const nothing = JSON.parse(this.responseText);
            if(nothing.falsevip == "yes"){
                console.log("VIP IS ENABLED, ENABLE CSS");
                clickCounter();
            }
            else{
                console.log("VIP IS DISABLED, DISABLE CSS");
            }

        }
        xmlhttp.open("GET", "../json/settings.json", true);
        xmlhttp.send();
    }
