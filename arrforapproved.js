var initlist = [
    {name: "Farhan Sadiq", age:19, batch:2023, status:"Pending"},
    {name: "Anomaly", age:27, batch:2012, status:"Pending"},
    {name: "Get Right", age:32, batch:2002, status:"Pending"},
    {name: "Natus Vincere", age:50, batch:2000, status:"Pending"},
    {name: "Sayed", age:19, batch:2024, status:"Approved"},
    {name: "Boi", age:19, batch:2025, status:"Approved"},
    {name: "Simple", age:24, batch:2015, status:"Denied"},
    {name: "Hobbit", age:20, batch:2019, status:"Denied"},

]

function buildtable(data){
    var table = document.getElementById("myTable")

    for(var i = 0; i< data.length; i++){
        if(data[i].status == "Approved"){
            var row =   `<tr>
                        <td>${data[i].name}</td>
                        <td  class="text-center">${data[i].age}</td>
                        <td  class="text-center">${data[i].batch}</td>
                        <td  class="text-center">${data[i].status}</td>
                        <td  class="text-center">
                            <div class="btn-group" role="group" aria-label="statuschanger">
                            <button type="button" class="btn btn-danger" id="denybtn">Revoke</button>
                        </div>
                        </td>
                    </tr>`
            table.innerHTML += row
            
        }
    }
}

buildtable(initlist)
