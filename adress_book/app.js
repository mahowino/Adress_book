document.getElementById('edit_btn').addEventListener('click',function(){
    document.querySelector('.bg_modal').style.display='flex';
});

document.querySelector('.close').addEventListener('click',function(){
    document.querySelector('.bg_modal').style.display='none';
});

function open_layout_edit_text(){
    document.querySelector('.bg_modal').style.display='flex';
}
const createClickHandler = (row) => {
    return () => {
      const [cell] = row.getElementsByTagName("td");
      const id = cell.innerHTML;
      console.log(id);
      document.querySelector('.bg_modal').style.display='flex';
    };
  };
  
  const table = document.querySelector("contactList");
  for (const currentRow of table.rows) {
    currentRow.onclick = createClickHandler(currentRow);
  }
