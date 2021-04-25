var initlist = [
    {name: "Farhan Sadiq", email:"thisisanemail@gmail.com", age:19, batch:2023, status:"Pending"},
    {name: "Anomaly", email:"thisisanemail@yahoo.com", age:27, batch:2012, status:"Pending"},
    {name: "Get Right", email:"thisisanemail@hotmail.com", age:32, batch:2002, status:"Pending"},
    {name: "Natus Vincere", email:"thisisanemail@outlook.com", age:50, batch:2000, status:"Pending"},
    {name: "Sayed", email:"thisisanemail@live.com", age:19, batch:2024, status:"Approved"},
    {name: "Boi", email:"thisisanemail@yahoo.com", age:19, batch:2025, status:"Approved"},
    {name: "Simple", email:"thisisanemail@gmail.com", age:24, batch:2015, status:"Denied"},
    {name: "Hobbit", email:"thisisanemail@hotmail.com", age:20, batch:2019, status:"Denied"},

]

buildtable(initlist)


$('#search-bar').on('keyup', function(){
    var value = $(this).val()
    console.log('Value: ', value)
    var newdata = searchTable(value, initlist)
    buildtable(newdata)
})

function searchTable(value ,data){
    var filtered = []

    for(var i=0; i<data.length; i++){
        value=value.toLowerCase()
        var name = data[i].name.toLowerCase()
        if(name.includes(value)){
            filtered.push(data[i])
        }
    }

    return filtered
}

function buildtable(data){
    var table = document.getElementById("myTable")
    table.innerHTML=''
    for(var i = 0; i< data.length; i++){
        if(data[i].status == "Pending"){
            var row =   `<tr>
                        <td>${data[i].name}</td>
                        <td>${data[i].email}</td>
                        <td class="text-center">${data[i].age}</td>
                        <td class="text-center">${data[i].batch}</td>
                        <td class="text-center">${data[i].status}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="statuschanger">
                            <button type="button" class="btn btn-success" id="approvebtn">Approve</button>
                            <button type="button" class="btn btn-danger" id="denybtn">Deny</button>
                        </div>
                        </td>
                    </tr>`
            table.innerHTML += row
            
        }
    }
}

