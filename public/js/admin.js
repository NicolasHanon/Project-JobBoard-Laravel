let main_MaxSize = document.querySelector('main').offsetHeight;

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

  thead.appendChild(tr);
  table.appendChild(thead);

  let tbody = document.createElement("tbody");

  // Iterate through data and create rows and cells
  tableData.data.forEach(row => {
    let tr = document.createElement("tr");

    tableData.columns.forEach(columnName => {
      let td = document.createElement("td");
      let input = document.createElement("input");
      input.value = row[columnName];
      td.appendChild(input);
      tr.appendChild(td);
    });

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
