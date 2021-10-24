oeil = true;
        oeil2 = true;
        function EtatOeil(){
            if(oeil){
                document.getElementById("motdepasse").setAttribute("type", "text");
                document.getElementById("img-oeil").src="../img/oeil-barre.png"; 
                oeil=false;
            }
            else{
                document.getElementById("motdepasse").setAttribute("type", "password");
                document.getElementById("img-oeil").src="../img/oeil.png";
                oeil=true;
            }
        }

        function oeilConfirme(){
            if(oeil2){
                document.getElementById("motdepasseConfirme").setAttribute("type", "text");
                document.getElementById("img-oeilConfirme").src="../img/oeil-barre.png"; 
                oeil2=false;
            }
            else{
                document.getElementById("motdepasseConfirme").setAttribute("type", "password");
                document.getElementById("img-oeilConfirme").src="../img/oeil.png";
                oeil2=true;
            }
        }