var initlist = [
    {ename: "Alumi Meet up 2021", venue: "Microsoft Teams", brief:"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultricies sem quis nisl auctor ornare. Morbi et porttitor nulla, lacinia bibendum felis. Aenean quam velit, ultrices nec placerat nec, fringilla ac leo. Praesent euismod non turpis eget posuere. Fusce elementum.", date:"12-02-2021"},
    {ename: "Networking event 2021", venue: "Faculty of Computer Science and Information Technology", brief:"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultricies sem quis nisl auctor ornare. Morbi et porttitor nulla, lacinia bibendum felis. Aenean quam velit, ultrices nec placerat nec, fringilla ac leo. Praesent euismod non turpis eget posuere. Fusce elementum.", date:"30-03-2021"}
    
]


function buildtable(data){
    var table = document.getElementById("myTable")

    for(var i = 0; i< data.length; i++){
        var row =   `<tr>
                        <td>${i+1}</td>
                        <td>${data[i].ename}</td>
                        <td>${data[i].venue}</td>
                        <td>${data[i].brief}</td>
                        <td class="text-center">${data[i].date}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="statuschanger">
                            <button type="button" class="btn btn-info" id="editbtn">Edit</button>
                            <button type="button" class="btn btn-danger" id="deletebtn">Delete</button>
                        </div>
                        </td>
                    </tr>`
            table.innerHTML += row
    }
}

buildtable(initlist)