function edit_row(no){
    document.getElementById("edit_btn"+no).style.display="none";
    document.getElementById("save_btn"+no).style.display="block";

    var des = document.getElementById("desc"+no);
    var y = document.getElementById("year"+no);
   

    var des_data = des.innerHTML;
    var y_data = y.innerHTML;
   

    des.innerHTML = des.innerHTML="<input type='text' id='desc_text"+no+"' value='"+des_data+"'>";
    y.innerHTML = y.innerHTML="<input type='text' id='year_text"+no+"' value='"+y_data+"'>";
   
    
}

function edit_r(no){
    document.getElementById("edit_btn"+no).style.display="none";
    document.getElementById("save_btn"+no).style.display="block";

    var pro = document.getElementById("project_name"+no);
    var date = document.getElementById("date"+no);
    
    var pro_data = pro.innerHTML;
    var date_data = date.innerHTML;
    
    pro.innerHTML = pro.innerHTML="<input type='text' id='pro_text"+no+"' value='"+pro_data+"'>";
    date.innerHTML = date.innerHTML="<input type='text' id='date_text"+no+"' value='"+date_data+"'>";



}

function save_row(no){
    var desc_val = document.getElementById("desc_text"+no).value;
    var y_val = document.getElementById("year_text"+no).value;
   
    
    document.getElementById("desc"+no).innerHTML=desc_val;
    document.getElementById("year"+no).innerHTML=y_val;
   

    document.getElementById("edit_btn"+no).style.display="block";
    document.getElementById("save_btn"+no).style.display="none";
}

function save_r(no){
    var pro_val = document.getElementById("pro_text"+no).value;
    var date_val = document.getElementById("date_text"+no).value;
    
    
    document.getElementById("project_name"+no).innerHTML=pro_val;
    document.getElementById("date"+no).innerHTML=date_val;
    
    document.getElementById("edit_btn"+no).style.display="block";
    document.getElementById("save_btn"+no).style.display="none";
}



function delete_row(no){
    document.getElementById("row"+no).outerHTML="";
}

function delete_r(no){
    document.getElementById("r"+no).outerHTML="";
}

function add_row(no){
    var new_desc = document.getElementById("new_desc").value="";
    var new_year = document.getElementById("new_year").value = "";
    

    var table = document.getElementById("data_table1");
    var table_len = (table.rows.length)-1;
    var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='desc"+table_len+"'>"+new_desc+"</td><td id='year"+table_len+"'>"+new_year+"</td><td><input type='button' id='edit_btn"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_btn"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";
   

    document.getElementById("new_desc").value="";
    document.getElementById("new_year").value="";



}

function add_r(no){
    var new_pro = document.getElementById("new_pro").value = "";
    var new_date = document.getElementById("new_date").value = "";

    var table = document.getElementById("data_table");
    var table_len = (table.rows.length)-1;
    var row = table.insertRow(table_len).outerHTML="<tr id='r"+table_len+"'><td id='project_name"+table_len+"'>"+new_pro+"</td><td id='date"+table_len+"'>"+new_date+"</td><td><input type='button' id='edit_btn"+table_len+"' value='Edit' class='edit' onclick='edit_r("+table_len+")'> <input type='button' id='save_btn"+table_len+"' value='Save' class='save' onclick='save_r("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_r("+table_len+")'></td></tr>";
    
    document.getElementById("new_pro").value="";
    document.getElementById("new_date").value="";


}

