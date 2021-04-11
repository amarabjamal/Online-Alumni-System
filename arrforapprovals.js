var initlist = [
    {name: "Farhan Sadiq", age:19, batch:2023, status:"Pending"},
    {name: "Anomaly", age:27, batch:2012, status:"Pending"},
    {name: "Get Right", age:32, batch:2002, status:"Pending"},
    {name: "Natus Vincere", age:50, batch:2000, status:"Pending"}
]

function buildtable(data){
    var table = document.getElementById("myTable")

    for(var i = 0; i< data.length; i++){
        var row =   `<tr>
                        <td>${data[i].name}</td>
                        <td>${data[i].age}</td>
                        <td>${data[i].batch}</td>
                        <td>${data[i].status}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-success">Approve</button>
                            <button type="button" class="btn btn-danger">Deny</button>
                        </div>
                        </td>
                    </tr>`
        table.innerHTML += row
    }
}

buildtable(initlist)