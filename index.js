let edit = document.getElementsByClassName("edit");
let i = 0;
while (i<edit.length){
    edit[i].addEventListener('click', function(e){
       let tr =e.target.parentNode.parentNode;
       let title = tr.getElementsByTagName('td')[0].innerHTML;
       let description = tr.getElementsByTagName('td')[1].innerHTML;
       let id = tr.getElementsByTagName('td')[3].innerHTML;
       let inputid = document.getElementById('id').value = id;
       let inputtitle = document.getElementById('titleedit').value = title;
       let inputdes = document.getElementById('descriptionedit').value = description;
    });
    i++;
};
let deleted = document.getElementsByClassName("deleted");
let j = 0;
while (j<deleted.length){
    deleted[j].addEventListener('click', function(e){
       let tr =e.target.parentNode.parentNode;
       let id = tr.getElementsByTagName('td')[3].innerHTML;
       if(confirm('Are you sure')){
        window.location = `/crud/noteapp.php?deleted=${id}`   ;
       }
       
    });
    j++;
};
console.log(deleted);
