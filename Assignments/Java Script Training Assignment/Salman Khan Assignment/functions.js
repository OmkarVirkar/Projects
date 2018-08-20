
function aquireData(){
var Details = [["Salman","Khan","Galaxy Appartments, Mumbai","23/03/1987","31"],["Shahrukh","Khan","Mannat","5/01/1985","55"]];

    var Name = document.getElementById('name').value;
        // if(Name == Details[0]){
        //     document.getElementById('Last_Name').value=Details[1];
        //     document.getElementById('Address').value=Details[2];
        //     document.getElementById('Date_of_Birth').value=Details[3];
        //     document.getElementById('Age').value=Details[4];
        // }
        var i;
        for(i=0;i<Details.length;i++)
        {
            if(Name == Details[i][0])
            {
                document.getElementById('Last_Name').value = Details[i][1];
                document.getElementById('Address').value = Details[i][2];
                document.getElementById('Date_of_Birth').value = Details[i][3];
                document.getElementById('Age').value = Details[i][4];
            }
        }
}