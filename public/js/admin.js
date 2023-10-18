let main_MaxSize = document.querySelector('main').offsetHeight;
let columnsLength = 0;
let rowLength = 0;
let lastId = 0;

window.addEventListener('DOMContentLoaded', async (e) => {
  
  await initData();
  eventTables();

  function adjustMargin() {
    if (main_MaxSize < document.querySelector('main').offsetHeight && window.innerWidth < 850 || main_MaxSize < document.querySelector('main').offsetHeight && window.innerWidth > 850)
      main_MaxSize = document.querySelector('main').offsetHeight;

    document.querySelector('main').style.margin = (window.innerHeight - document.querySelector('.nav').offsetHeight > main_MaxSize) ? 'auto' : '20px';
    document.querySelector('.content').style.margin = (window.innerHeight - 100 < document.querySelector('.content').offsetHeight) ? window.innerWidth < 850 ? '80px 0 20px 0' : '20px' : 'auto';
    document.querySelector('.nav').style.height = window.innerWidth > window.innerHeight && window.innerWidth < 850 ? "12%" : "8%";
  }
  
  adjustMargin();
  window.addEventListener('resize', adjustMargin);
});

function eventTables() {
  let tables = document.querySelectorAll(".table");
  for (const table of tables) {
    table.addEventListener("click", async (e) => {
      const response = await fetch(`http://localhost:8000/api/admin/getTableData/${table.textContent}`);
      const data = await response.json();
      setData(data);

      document.querySelector('.content').style.margin = (window.innerHeight - 100 < document.querySelector('.content').offsetHeight) ? window.innerWidth < 850 ? '80px 0 20px 0' : '20px' : 'auto';

      if (window.innerWidth < 850)
        document.body.classList.toggle('content-is-toggled');
    });
  }
}

async function initData() {
  const response = await fetch(`http://localhost:8000/api/admin/initTable`);
  const data = await response.json();

  const main = document.querySelector("main");

  data.tablesnames.forEach(tableName => {
    let tableNameTag = document.createElement('p')
    tableNameTag.classList.add("table");
    tableNameTag.innerHTML = tableName;
    let sep = document.createElement("div")
    sep.classList.add("separator");

    main.appendChild(tableNameTag);
    main.appendChild(sep);
  });

  setData(data);
}

function setData(tableData) {
  rowLength = tableData.data.length;
  columnsLength = tableData.columns.length;
  hasId = tableData.columns[0] == "id" ? true : false;

  document.getElementById("tableName").innerHTML = tableData.name + ' table';

  let table = document.getElementById("table");
  table.innerHTML = "";

  let thead = document.createElement("thead");
  let tr = document.createElement("tr");

  // Iterate through columns and create th elements
  tableData.columns.forEach(columnName => {
    let th = document.createElement("th");
    th.textContent = columnName;
    tr.appendChild(th);
  });
  let th = document.createElement("th");
  th.textContent = "Remove row";
  tr.appendChild(th);
  
  thead.appendChild(tr);
  table.appendChild(thead);

  let tbody = document.createElement("tbody");

  // Iterate through data and create rows and cells
  tableData.data.forEach((row, rowIndex) => {
    let tr = document.createElement("tr");

    tableData.columns.forEach(columnName => {
      let td = document.createElement("td");
      let input = document.createElement("input");
      input.value = row[columnName];
      td.appendChild(input);
      tr.appendChild(td);
    });
    let td = document.createElement("td");
    td.classList.add("removeBtn");
    let removeRowImg = document.createElement("img");
    removeRowImg.src = "../svg/removing.svg";
    removeRowImg.style.marginTop = "5px";

    lastId = tableData.data[rowIndex].id;
    td.setAttribute('data-id' , `${lastId}`);
    removeRowImg.setAttribute('data-id' , `${lastId}`);

    addRemoveEvent(td);

    td.appendChild(removeRowImg);
    tr.appendChild(td);

    tbody.appendChild(tr);
  });

  table.appendChild(tbody);
}

document.querySelector(".rightarrow").addEventListener("click", (e) => {
  if (window.innerWidth < 850) {
    document.body.classList.toggle('content-is-toggled');
    setTimeout(() => {
      document.querySelector('.content').style.margin = "20px";
    }, 300);
  }
});

function showNav() {
  document.body.classList.toggle('burger-is-toggled');
}

function addRow() {
  let tbody = document.querySelector("tbody");
  let tr = document.createElement("tr");
  
  for (let i = 0; i < columnsLength; i++) {
    let td = document.createElement("td");
    let input = document.createElement("input");

    input.value = i == 0 ? lastId + 1 : "";

    td.appendChild(input);
    tr.appendChild(td);
  }
  let td = document.createElement("td");
  td.classList.add("removeBtn");
  let removeRowImg = document.createElement("img");
  removeRowImg.src = "../svg/removing.svg";
  removeRowImg.style.marginTop = "5px";

  lastId += 1;
  td.setAttribute('data-id' , `${lastId}`);
  removeRowImg.setAttribute('data-id' , `${lastId}`);
  
  addRemoveEvent(td);

  td.appendChild(removeRowImg);
  tr.appendChild(td);

  tbody.appendChild(tr);
  table.appendChild(tbody);
}

function addRemoveEvent(removeRow) {
  removeRow.addEventListener("click", async (e) => {
    if (confirm("Are you sure to delete this record ? This action isn't reversible.")) {
      try {
        const table = document.getElementById("tableName").textContent.split(" ")[0];
        const response = await fetch(`http://localhost:8000/api/admin/deleteTable/${e.srcElement.dataset.id}/${table}`);
        const responseTable = await fetch(`http://localhost:8000/api/admin/getTableData/${table}`);
        const dataTable = await responseTable.json();
        setData(dataTable);
        alert("Record removed.");
      } catch (e) {
        const responseTable = await fetch(`http://localhost:8000/api/admin/getTableData/${table}`);
        const dataTable = await responseTable.json();
        setData(dataTable);
        alert("Cannot delete record.");
      }
    }
  })
}