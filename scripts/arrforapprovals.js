var initlist = [
    {name: "Farhan Sadiq", faculty: "Computer Science and Information Technology", email:"thisisanemail@gmail.com", age:19, batch:2023, status:"Pending"},
    {name: "Xavier Emiliano", faculty: "Science",email:"thisisanemail@yahoo.com", age:27, batch:2012, status:"Pending"},
    {name: "Roderick", faculty: "Education", email:"thisisanemail@hotmail.com", age:32, batch:2002, status:"Pending"},
    {name: "Kyson", faculty: "Science", email:"thisisanemail@outlook.com", age:50, batch:2000, status:"Pending"},
    {name: "Chris Martin", faculty: "Education", email:"thisisanemail@gmail.com", age:19, batch:2023, status:"Pending"},
    {name: "Bryan", faculty: "Business and Accountancy", email:"thisisanemail@yahoo.com", age:27, batch:2012, status:"Pending"},
    {name: "Michael Jordan", faculty: "Business and Accountancy", email:"thisisanemail@hotmail.com", age:32, batch:2002, status:"Pending"},
    {name: "Yurem", faculty: "Business and Accountancy", email:"thisisanemail@outlook.com", age:50, batch:2000, status:"Pending"},
    {name: "Sayed", faculty: "Science", email:"thisisanemail@live.com", age:19, batch:2024, status:"Approved"},
    {name: "Arjun Rajesh", faculty: "Education", email:"thisisanemail@yahoo.com", age:19, batch:2025, status:"Approved"},
    {name: "Sayed Farhan", faculty: "Business and Accountancy", email:"thisisanemail@live.com", age:19, batch:2024, status:"Approved"},
    {name: "Hasanul Alam", faculty: "Education", email:"thisisanemail@yahoo.com", age:19, batch:2025, status:"Approved"},
    {name: "Jaden Smith", faculty: "Science", email:"thisisanemail@live.com", age:19, batch:2024, status:"Approved"},
    {name: "Sebastian Vettel", faculty: "Computer Science and Information Technology", email:"thisisanemail@yahoo.com", age:19, batch:2025, status:"Approved"},
    {name: "Tony Xavier", faculty: "Education", email:"thisisanemail@gmail.com", age:24, batch:2015, status:"Denied"},
    {name: "Damien Jones", faculty: "Dentistry", email:"thisisanemail@hotmail.com", age:20, batch:2019, status:"Denied"},
    {name: "Lewis hamilton", faculty: "Education", email:"thisisanemail@gmail.com", age:24, batch:2015, status:"Denied"},
    {name: "Max Verstappen", faculty: "Business and Accountancy", email:"thisisanemail@hotmail.com", age:20, batch:2019, status:"Denied"},
    {name: "Luka Ghiotto", faculty: "Science", email:"thisisanemail@gmail.com", age:24, batch:2015, status:"Denied"},
    {name: "Stoffel Vandorne", faculty: "Science", email:"thisisanemail@hotmail.com", age:20, batch:2019, status:"Denied"},

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
                        <td>${data[i].faculty}</td>
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

$("body").on("click", ".btn-danger", function(){
    $(this).parents("tr").remove();
});

$("body").on("click", ".btn-success", function(){
    $(this).parents("tr").remove();
});