var initlist = [
    {name: "Farhan Sadiq", email:"thisisanemail@gmail.com", age:19, batch:2023, status:"Pending"},
    {name: "Xavier Emiliano", email:"thisisanemail@yahoo.com", age:27, batch:2012, status:"Pending"},
    {name: "Roderick", email:"thisisanemail@hotmail.com", age:32, batch:2002, status:"Pending"},
    {name: "Kyson", email:"thisisanemail@outlook.com", age:50, batch:2000, status:"Pending"},
    {name: "Chris Martin", email:"thisisanemail@gmail.com", age:19, batch:2023, status:"Pending"},
    {name: "Bryan", email:"thisisanemail@yahoo.com", age:27, batch:2012, status:"Pending"},
    {name: "Michael Jordan", email:"thisisanemail@hotmail.com", age:32, batch:2002, status:"Pending"},
    {name: "Yurem", email:"thisisanemail@outlook.com", age:50, batch:2000, status:"Pending"},
    {name: "Sayed", email:"thisisanemail@live.com", age:19, batch:2024, status:"Approved"},
    {name: "Arjun Rajesh", email:"thisisanemail@yahoo.com", age:19, batch:2025, status:"Approved"},
    {name: "Sayed Farhan", email:"thisisanemail@live.com", age:19, batch:2024, status:"Approved"},
    {name: "Hasanul Alam", email:"thisisanemail@yahoo.com", age:19, batch:2025, status:"Approved"},
    {name: "Jaden Smith", email:"thisisanemail@live.com", age:19, batch:2024, status:"Approved"},
    {name: "Sebastian Vettel", email:"thisisanemail@yahoo.com", age:19, batch:2025, status:"Approved"},
    {name: "Tony Xavier", email:"thisisanemail@gmail.com", age:24, batch:2015, status:"Denied"},
    {name: "Damien Jones", email:"thisisanemail@hotmail.com", age:20, batch:2019, status:"Denied"},
    {name: "Lewis hamilton", email:"thisisanemail@gmail.com", age:24, batch:2015, status:"Denied"},
    {name: "Max Verstappen", email:"thisisanemail@hotmail.com", age:20, batch:2019, status:"Denied"},
    {name: "Luka Ghiotto", email:"thisisanemail@gmail.com", age:24, batch:2015, status:"Denied"},
    {name: "Stoffel Vandorne", email:"thisisanemail@hotmail.com", age:20, batch:2019, status:"Denied"},

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

