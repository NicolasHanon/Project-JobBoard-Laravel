let inputNames = ['title', 'contract', 'more', 'location', 'salary'];
let companyId;

window.addEventListener('DOMContentLoaded', async (e) => {

  if (userId == null)
    return;

  const response = await fetch(`http://localhost:8000/api/user/getCompanyId/${userId}`);
  data = await response.json();
  companyId = data[0]['id'];
});

async function postJob() {
    
    let data = {};

    data['companies_id'] = companyId;
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