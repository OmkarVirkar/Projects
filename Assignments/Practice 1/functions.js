
    function publish(Title,patt_title){
         var Title = document.getElementById('Title');
         var patt_title = /^[a-zA-Z]+$/;
         if(Title.value.match(patt_title))
         {
            // document.getElementById('Title').innerHTML = "Invalid Input";
            return true;
         }
         else{
            document.getElementById('red').innerHTML= "Invalid Input";
            inputtext.focus();
            return false;
         }
        }
