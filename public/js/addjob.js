let inputNames = ['title', 'contract', 'more', 'location', 'salary'];
let companyId;

window.addEventListener('DOMContentLoaded', async (e) => {

  if (userId == null)
    return;

// get compoanyId
//   const response = await fetch(`http://localhost:8000/api/user/${userId}`);
//   companyId = await response.json();
});

async function postJob() {
    
    let data = {};

    for (let input of inputNames) {
        let tmp = document.getElementById(input).value;
        if (tmp == "") {
            alert("Please fill all the informations.")
            return;
        }
        if (input == "salary") {
            tmp = document.getElementById("salary").value + "-" + document.getElementById("salary2").value;
            document.getElementById("salary2").value = "";
        }
        document.getElementById(input).value = "";
        data[input] = tmp;
    }

  let jsonData = JSON.stringify(data);

  if (confirm("Are you sure about the informations about your ad ?")) {
    try {
      await fetch(`http://localhost:8000/api/newjob/add`, {
        headers: { 'Content-Type': 'application/json', },
        method: "POST",
        body: jsonData
      });
      alert("Job posted.");
    } catch (e) {
      alert("Cannot post job.");
    }
  }
}

//prevent from submit form if all input are not fill. for user too.